# Установка

1. Добавить в `/etc/hosts` строку:

   127.0.0.1 test-project.local

2. В корне проекта выполнить команду:
   ```bash
   cp .env.example .env
   
3. Зайти в контейнер nginx-unit и выполнить миграции с наполнением БД:
      ```bash
   php artisan migrate:fresh --seed
