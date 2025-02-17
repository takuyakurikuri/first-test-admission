お問い合わせフォーム
環境構築

Dockerビルド
1. git clone git@github.com:takuyakurikuri/first-test-admission.git
2. docker-compose up -d --build
＊MySQLは、OSによって起動しない場合があるのでそれぞれのPCに合わせて docker-compose.ymlファイルを編集して下さい。

Laravel環境構築
1. docker-compose exec php bash
2. composer install
3. .env.exampleファイルから.envを作成し、環境変数を変更
4. php artisan key:generate
5. php artisan migrate
6. php artisan db:seed

使用技術  
PHP7.4.9  
laravel8.0  
mysql8.0  
Bootstrap5.3  

URL
開発環境：http://localhost/
phpMyAdmin：http://localhost:8080/

ER図
![Image](https://github.com/user-attachments/assets/f7fc5a03-ea47-46fa-829b-be69fc8a77dd)
