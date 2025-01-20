# もぎたて
## 環境構築
### Dockerビルド
1. git clone git@github.com:coachtech-material/laravel-docker-template.git
2. docker-compose up -d --build
### Laravel環境構築
1. docker-compose exec php bash
2. comporser install
3. .env.exampleファイルから.envを作成し、環境変数を変更
4. php artisan key:generate
5. php artisan migrate
6. php artisan db:seed
