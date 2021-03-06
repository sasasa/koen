<!---
```
mysql -u root -p
CREATE DATABASE koen CHARACTER SET utf8;
GRANT ALL PRIVILEGES ON koen.* TO root@localhost IDENTIFIED BY '';

php artisan make:model Park -m
php artisan make:model Photo -m
php artisan make:model Review -m
php artisan make:model Tag -m
php artisan make:model Article -m
php artisan make:model Advertisement -m


php artisan make:controller ParksController
php artisan make:controller PhotosController --resource
php artisan make:controller ReviewsController --resource
php artisan make:controller TagsController --resource
php artisan make:controller Api/SearchParksController
php artisan make:controller ArticlesController --resource
php artisan make:controller RootController
php artisan make:controller SiteMapController
php artisan make:controller AdvertisementsController --resource

php artisan make:seeder ParksTableSeeder
php artisan make:seeder UsersTableSeeder
php artisan make:seeder PhotosTableSeeder
php artisan make:seeder ReviewsTableSeeder
php artisan make:seeder TagsTableSeeder
php artisan make:seeder ArticlesTableSeeder
php artisan db:seed --class=PhotosTableSeeder

php artisan make:command ParkCSVLoader

php artisan park:csv:loader

php artisan make:migration create_park_tag_table


php artisan make:provider CustomServiceProvider

php artisan migrate:refresh
php artisan db:seed
php artisan storage:link
php artisan migrate:refresh --seed
```
-->
# サーバー
[公園マップ](https://kouen-map.com)

# ローカル開発環境

## XAMPかMAMPを入れる

XAMPかMAMPを入れる
PHPバージョンはXserverで動かすために7.3.26 / PHP 7.3.26

- [XAMP](https://www.apachefriends.org/jp/download.html)
- [MAMP](https://www.mamp.info/en/windows/)

PHP確認
```
php -v
```
## macの場合
Homebrewのインストール
https://qiita.com/zaburo/items/29fe23c1ceb6056109fd

## composerをインストールする
- [composer](https://getcomposer.org/download/)

## macの場合
```
brew install composer
```


composer確認
```
composer -v
```



## httpd.confを書き換える

```
DocumentRoot "プロジェクトまでのパス/koen/public"
※例 "C:/Users/saeki/growup/koen/public"

<Directory "プロジェクトまでのパス/koen/public">
```

## コントロールパネルからhttpdを再起動する

## Databaseを用意する
OSのターミナルでMYSQLにアクセスしてdatabaseとユーザーを作成する
```
mysql -u root -p
CREATE DATABASE koen CHARACTER SET utf8;
GRANT ALL PRIVILEGES ON koen.* TO root@localhost IDENTIFIED BY '';
```
Databaseの接続情報
```
cp .env.example .env
```

.env
```
APP_NAME=公園マップ
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack
LOG_LEVEL=debug

GOOGLE_MAP_KEY=grow-upのローカル用のキー

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=koen
DB_USERNAME=root
DB_PASSWORD=

```


コンポーザーでライブラリをインストール
```
$ COMPOSER_MEMORY_LIMIT=-1 composer install
```

テーブルの作成
```
php artisan key:generate
php artisan migrate
```

## データの用意
画像アップロードをできるようにシンボリックリンクを張る
```
php artisan storage:link
```

storage/app/publicに画像を準備
```
cp 公園のデフォルト画像.png storage/app/public/koen.png
cp 画像がない時のデフォルト画像.png storage/app/public/noimage.png
```

シードを読み込む
```
php artisan db:seed
```

## 表示確認
http://localhost/ にアクセスする


## SCSSやjavascriptのビルド
node.jsのインストール
- [node.js](https://nodejs.org/ja/download/)

npmでライブラリをインストール
```
npm install
```
ビルドが成功するかどうか確かめる
```
npm run prod
```

## SCSSの編集方法
変更を待ち受けてビルドするコマンド
```
npm run watch
```

* resources/js/*.js
* resources/sass/*.scss

を編集すると自動でビルドしてくれる


## 本番環境の構築手順
基本的にはローカル開発環境構築と変わらないが
環境変数が異なることを忘れてはいけない。

https://github.com/sasasa/koen/issues/51
