# お問い合わせフォーム

## 環境構築
Dockerビルド
1. git clone リンク
2. docker-compose up -d —build

Laravel環境構築
1. docker-compose exec php bash
2. composer install
3. .env.exampleファイルから.envを作成し、環境変数を変更
4. php artisan:key generate
5. php artisan migrate
6. php artisan db:seed

## 使用技術
- PHP 7.4.9
- Laravel Framework 8.83.8
- MySQL  8.0.26

## ER図
![image](https://github.com/nan888999/checktest/assets/167194215/f4783471-6c04-40cb-9490-33fc8783bacd)

## URL
- 開発環境：http://localhost/
- phpMyAdmin : http://localhost:8080/
