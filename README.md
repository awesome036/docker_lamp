# docker_lamp  
  
## はじめに  
LAMP環境をdockerで構築出来ます。  
PHPの勉強に必要そうなものもまとめて入れておきました。  
  
## LAMP環境  
- Linux(Debian)  
- Apache  
- Mysql5.7  
- PHP7.2.7  
	- pdo_mysql  
	- mysqli  
	- mbstring  
	- GD  
  
### その他インストール  
- phpmyadmin  
  
## フォルダ構成  
  
    src  
	├── dockerfile_apache  
	├── dockerfile_mysql  
	├── html // http://localhostのドキュメントルート  
	    └── projects // このフォルダの中に実行したいファイルを入れる  
    ├── mysql  
	    └── data // データベースのデータはここに格納される  
	└── phpmyadmin  
	    └── sessions  

## 構築手順  
1. dockerをインストールして起動しておく。(やり方はググって)  
2. ターミナルまたはコマンドプロンプトを起動。  
3. `docker-compose.yml`のディレクトリに移動。  
4. ターミナルまたはコマンドプロンプトで下記コマンドを実行  
  
    	docker-compose build  
  
5. ビルドが終了したら下記コマンドを実行  
  
    	docker-compose up -d  
  
### dockerのコマンド一覧  
#### 起動  
srcディレクトリに移動してから下記コマンドを実行  
  
    docker-compose up  
  
オプションで *-d* をつけるとバックグランドで実行される。  
  
#### コンテナの状態確認  
    docker-compose ps  
  
#### 起動コンテナの停止  
    docker-compose stop  
  
#### コンテナの破棄  
    docker-compose down  
  
#### コンテナの再起動  
    docker-compose restart  
  
#### コンテナ内でbash起動  
    docker exec -it コンテナ名 bash  
  
## 備考  
### ブラウザでの確認  
http://localhost  
＊最初の画面ではドキュメントルート下のフォルダとファイルのリンクが表示されるようになっている。  
  
### phpmyadminを開く  
http://localhost:8080  
  
### phpinfoを開く  
http://localhost/phpinfo.php  
  
### mysqlの初期設定  
- ホストネーム
	- mysql  
- ユーザーネーム
	- root  
- パスワード  
	- root  
