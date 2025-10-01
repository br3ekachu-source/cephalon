<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class ProxyController extends Controller
{
    private $targetUrl = 'https://dabbackwood.tilda.ws/dabbackwood/tee';
    private $proxyBaseUrl = 'https://store.cephalon.company/dabbackwood';

    public function proxy(Request $request)
    {
        // Получаем путь после /dabbackwood
        $path = $request->path();
        $path = Str::after($path, 'dabbackwood');
        
        // Убираем ведущий слеш если есть
        $path = ltrim($path, '/');
        
        // Формируем полный URL для запроса
        $targetUrl = $this->targetUrl;
        if ($path) {
            $targetUrl .= '/' . $path;
        }
        
        // Добавляем query параметры если есть
        if ($request->query()) {
            $targetUrl .= '?' . http_build_query($request->query());
        }

        try {
            // Выполняем запрос к Tilda
            $response = Http::timeout(30)->get($targetUrl);
            
            if (!$response->successful()) {
                return response('Proxy error: ' . $response->status(), $response->status());
            }

            $content = $response->body();
            $contentType = $response->header('Content-Type', 'text/html');

            // Заменяем URL в контенте только для HTML
            if (Str::contains($contentType, 'text/html')) {
                $content = $this->replaceUrlsInContent($content);
            }

            // Создаем ответ с правильными заголовками
            $response = response($content, $response->status());
            
            // Копируем важные заголовки
            $headersToCopy = [
                'Content-Type',
                'Cache-Control',
                'ETag',
                'Last-Modified',
                'Content-Encoding'
            ];

            foreach ($headersToCopy as $header) {
                if ($response->headers->has($header)) {
                    $response->headers->set($header, $response->headers->get($header));
                }
            }

            return $response;

        } catch (\Exception $e) {
            return response('Proxy error: ' . $e->getMessage(), 500);
        }
    }

    private function replaceUrlsInContent($content)
    {
        // Заменяем абсолютные URL на Tilda
        $content = str_replace(
            $this->targetUrl,
            $this->proxyBaseUrl,
            $content
        );

        // Заменяем относительные пути, которые могут указывать на ресурсы Tilda
        $content = preg_replace(
            '/(href|src|action)="\/([^"]*)"/',
            '$1="' . $this->proxyBaseUrl . '/$2"',
            $content
        );

        // Заменяем URL в CSS и JavaScript
        $content = preg_replace_callback(
            '/url\(["\']?([^"\']*)["\']?\)/',
            function($matches) {
                $url = $matches[1];
                if (strpos($url, 'http') === 0) {
                    return 'url("' . str_replace($this->targetUrl, $this->proxyBaseUrl, $url) . '")';
                } elseif (strpos($url, '/') === 0) {
                    return 'url("' . $this->proxyBaseUrl . $url . '")';
                }
                return $matches[0];
            },
            $content
        );

        return $content;
    }
}
