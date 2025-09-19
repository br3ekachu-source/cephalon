# Инструкции по развертыванию на reg.ru с ISPmanager

## 1. Подготовка проекта

### Шаг 1: Создание .env файла
1. Скопируйте `env.production.example` в `.env`
2. Заполните следующие параметры:
   - `APP_URL=https://yourdomain.com` (замените на ваш домен)
   - `APP_KEY=` (будет сгенерирован автоматически)
   - `DB_DATABASE=/path/to/your/database.sqlite` (путь к базе данных)

### Шаг 2: Генерация ключа приложения
```bash
php artisan key:generate
```

### Шаг 3: Оптимизация для продакшена
```bash
# Очистка кэша
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear

# Оптимизация автозагрузки
composer install --optimize-autoloader --no-dev

# Создание оптимизированных файлов конфигурации
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

## 2. Загрузка на хостинг

### Структура файлов для загрузки:
```
public_html/
├── app/
├── bootstrap/
├── config/
├── database/
├── resources/
├── routes/
├── storage/
├── vendor/
├── .env
├── artisan
├── composer.json
├── composer.lock
└── public/
    ├── index.php
    ├── .htaccess
    ├── css/
    ├── js/
    ├── fonts/
    └── storage/ (симлинк на ../storage/app/public)
```

### Важные моменты:
1. **Папка public** - это корневая папка вашего сайта в ISPmanager
2. **Симлинк storage** - создайте символическую ссылку:
   ```bash
   ln -s ../storage/app/public public/storage
   ```

## 3. Настройка в ISPmanager

### Шаг 1: Создание базы данных
1. Зайдите в ISPmanager
2. Создайте SQLite базу данных
3. Укажите путь к базе в .env файле

### Шаг 2: Настройка домена
1. Укажите корневую папку на папку `public`
2. Убедитесь, что mod_rewrite включен

### Шаг 3: Права доступа
```bash
# Установите права на папки
chmod -R 755 storage bootstrap/cache
chmod -R 644 .env
```

## 4. Первоначальная настройка

### Шаг 1: Миграции
```bash
php artisan migrate
```

### Шаг 2: Создание символической ссылки для storage
```bash
php artisan storage:link
```

### Шаг 3: Проверка работы
1. Откройте ваш сайт в браузере
2. Проверьте, что все страницы загружаются корректно
3. Проверьте загрузку изображений

## 5. Возможные проблемы

### Проблема: 500 ошибка
- Проверьте права доступа к папкам
- Проверьте .env файл
- Проверьте логи в storage/logs/

### Проблема: Изображения не загружаются
- Проверьте симлинк storage
- Проверьте права доступа к папке storage/app/public

### Проблема: CSS/JS не загружаются
- Проверьте, что все файлы загружены в папку public
- Проверьте .htaccess файл

## 6. Дополнительные настройки

### Настройка почты (если нужно)
В .env файле укажите настройки SMTP вашего хостинга:
```
MAIL_MAILER=smtp
MAIL_HOST=mail.yourdomain.com
MAIL_PORT=587
MAIL_USERNAME=your-email@yourdomain.com
MAIL_PASSWORD=your-password
MAIL_ENCRYPTION=tls
```

### Настройка SSL
1. Включите SSL в ISPmanager
2. Обновите APP_URL на https://yourdomain.com
3. Добавьте редирект с HTTP на HTTPS в .htaccess
