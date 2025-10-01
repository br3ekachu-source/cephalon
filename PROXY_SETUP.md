# Настройка проксирования для Tilda сайта

## Описание

Реализовано проксирование для сайта Tilda `https://dabbackwood.tilda.ws/` под адресом `https://store.cephalon.company/dabbackwood`.

## Как это работает

1. **Маршрут**: `/dabbackwood/{path?}` - перехватывает все запросы к пути `/dabbackwood` и его подпутям
2. **Контроллер**: `ProxyController` - обрабатывает проксирование запросов
3. **Замена URL**: Автоматически заменяет все ссылки в HTML контенте на проксированные URL

## Функциональность

- ✅ Проксирование всех HTTP методов (GET, POST, PUT, DELETE и т.д.)
- ✅ Сохранение query параметров
- ✅ Замена абсолютных URL в HTML контенте
- ✅ Замена относительных путей в атрибутах href, src, action
- ✅ Замена URL в CSS (функция url())
- ✅ Копирование важных HTTP заголовков
- ✅ Обработка ошибок с таймаутом 30 секунд

## Примеры использования

- `https://store.cephalon.company/dabbackwood` → `https://dabbackwood.tilda.ws/`
- `https://store.cephalon.company/dabbackwood/page` → `https://dabbackwood.tilda.ws/page`
- `https://store.cephalon.company/dabbackwood/assets/style.css` → `https://dabbackwood.tilda.ws/assets/style.css`

## Технические детали

### Контроллер: `app/Http/Controllers/ProxyController.php`

Основные методы:
- `proxy()` - основной метод проксирования
- `replaceUrlsInContent()` - замена URL в HTML контенте

### Маршрут: `routes/web.php`

```php
Route::any('/dabbackwood/{path?}', [ProxyController::class, 'proxy'])
    ->where('path', '.*')
    ->name('proxy.dabbackwood');
```

## Настройка

Для изменения целевого URL или базового URL прокси, отредактируйте константы в `ProxyController`:

```php
private $targetUrl = 'https://dabbackwood.tilda.ws';
private $proxyBaseUrl = 'https://store.cephalon.company/dabbackwood';
```

## Тестирование

После развертывания проверьте:
1. Открытие главной страницы: `https://store.cephalon.company/dabbackwood`
2. Переходы по внутренним ссылкам
3. Загрузку CSS и JavaScript файлов
4. Работу форм (POST запросы)

## Возможные проблемы

1. **CORS**: Если Tilda блокирует запросы с другого домена
2. **Таймауты**: При медленной загрузке Tilda сайта
3. **Динамический контент**: JavaScript может делать прямые запросы к Tilda

## Альтернативные решения

Если возникнут проблемы с текущим решением, можно рассмотреть:
1. Настройку reverse proxy на уровне веб-сервера (Nginx/Apache)
2. Использование iframe для встраивания сайта
3. Настройку CORS на стороне Tilda (если возможно)

