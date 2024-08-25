 # お問い合わせフォーム

 環境構築

 ## Dockerビルド
1. `git clone https://github.com/hayashiai/test-contact-form.git`
2. `docker-compose up -d --build`

※ MySQLは、OSによっては起動しない場合があるので、それぞれのPCに合わせて`docker-compose.yml`ファイルを編集してください。

## Laravel環境構築
1. `docker-compose exec php bash`
2. `composer install`
3. `.env.example`ファイルから`.env`を作成し、環境変数を設定
4. `php artisan key:generate`
5. `php artisan migrate`
6. `php artisan db:seed`

 ## 使用技術
- PHP 7.4.9
- Laravel 8.83.27
- MySQL 8.0.26

## ER図
![ER図](http://localhost:8000/images/er_diagram.png)


## URL
開発環境：http://localhost/
