## Пособие по запуску
1. Настроить конфигурационный файл .env
    - копируем примерочный файл `cp .env.example .env`
    - добавляем коннект к бд
    - добавляем конфигурации к почте, например
    ```
    MAIL_DRIVER=smtp
    MAIL_HOST=smtp.googlemail.com
    MAIL_PORT=465
    MAIL_USERNAME=ENTER_YOUR_EMAIL_ADDRESS(GMAIL)
    MAIL_PASSWORD=ENTER_YOUR_GMAIL_PASSWORD
    MAIL_ENCRYPTION=ssl
   ```
   - добавляем конфигурации к meilisearch
    ```
    SCOUT_DRIVER=meilisearch
    MEILISEARCH_HOST=http://127.0.0.1:7700
    ```
   
2. Делаем все миграции `php artisan migrate --seed`
3. Делаем ссылку на storage `php artisan storage:link`
4. Устанавливаем все пакеты
    - пакеты для композера `composer install`
    - пфкеты для нпм `npn install && npm run dev`
5. Установить драйфер для Laravel Scout MEILISEARCH 
    - сам драйвер `curl -L https://install.meilisearch.com | sh`
    - запуск драйвера `./meilisearch`
    
6. Генерируем ключ `php artisan key:generate` 
