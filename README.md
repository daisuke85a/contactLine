## 初期設定
- `cd {レポジトリのルートディレクトリ}`
- `docker-compose build`
- `docker-compose up -d`
- `docker exec -it cl-app composer install`
- `docker exec -it cl-app cp .env.example .env`
- `docker exec -it cl-app php artisan key:generate`