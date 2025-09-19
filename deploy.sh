#!/bin/bash

# Скрипт для подготовки Laravel проекта к развертыванию на reg.ru

echo "🚀 Подготовка проекта к развертыванию..."

# Проверяем наличие необходимых файлов
if [ ! -f "composer.json" ]; then
    echo "❌ Ошибка: composer.json не найден"
    exit 1
fi

# Создаем .env файл если его нет
if [ ! -f ".env" ]; then
    echo "📝 Создание .env файла..."
    cp env.production.example .env
    echo "✅ .env файл создан. Не забудьте настроить параметры!"
fi

# Генерируем ключ приложения
echo "🔑 Генерация ключа приложения..."
php artisan key:generate

# Очищаем кэш
echo "🧹 Очистка кэша..."
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear

# Устанавливаем зависимости для продакшена
echo "📦 Установка зависимостей для продакшена..."
composer install --optimize-autoloader --no-dev

# Создаем оптимизированные файлы
echo "⚡ Оптимизация конфигурации..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Создаем символическую ссылку для storage
echo "🔗 Создание символической ссылки для storage..."
php artisan storage:link

# Устанавливаем права доступа
echo "🔒 Установка прав доступа..."
chmod -R 755 storage bootstrap/cache
chmod -R 644 .env

echo "✅ Проект готов к развертыванию!"
echo ""
echo "📋 Следующие шаги:"
echo "1. Загрузите все файлы на хостинг"
echo "2. Укажите корневую папку на папку 'public'"
echo "3. Настройте базу данных в ISPmanager"
echo "4. Обновите APP_URL в .env файле"
echo "5. Запустите миграции: php artisan migrate"
echo ""
echo "📖 Подробные инструкции в файле DEPLOYMENT.md"
