<!DOCTYPE html>
<html lang="ja" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>Index</title>
		<style type="text/css">
			table,tr,th,td {
				margin: 0;
				padding: 0;
			}
			body {
				background: #222;
			}
			h1 {
				color: #eee;
			}
			a {
				display: inline-block;
				width: 100%;
			}
			table {
				width: 500px;
				border: solid 2px #111;
				border-collapse: collapse;
				margin-bottom: 25px;
			}
			th,td {
				border: solid 1px #222;
				font-size: 1.1em;
			}
			th {
				text-align: left;
				background: #FFA500;
			}
			th a {
				text-decoration: none;
			}
			tr:nth-child(odd) {
				background: #FFFFE0;
			}
			tr:nth-child(even) {
				background: #FFE4B5;
			}
			tr:hover {
				opacity: 0.7;
				cursor: pointer;
			}
			tr:focus-within {
				opacity: 0.7;
			}
		</style>
	</head>
	<body>
		<?php
		// インデックスの場所
		if(!isset($_GET["idx"])){
			$idx = "localhost";
		}else{
			$idx = $_GET["idx"];
		}
		echo "<h1>Index of {$idx}.</h1>\n";

		// 検索するフォルダ
		if(isset($_GET["path"])){
			$dir = $_GET["path"];
		}else{
			$dir = dirname(__FILE__)."/";
		}

		// フォルダ・ファイル一覧出力
		$result = list_files($dir);
		echo "<table>\n";
		if(isset($result)){
			foreach($result as $var){
				echo $var["path"];
			}
		}
		if(isset($result)){
			foreach($result as $var){
				echo $var["file"];
			}
		}
		echo "</table>\n";

		function list_files($dir){
			$list = array();
			$files = scandir($dir);
			$dir_grep = preg_replace("/\//","\/",dirname(__FILE__));
			//print_r($files);
			foreach($files as $file){
				if($file == '.' || $file == '..'){
					continue;
				}elseif(is_file($dir . $file)){
					$path = $dir . $file;
					$path_grep = preg_replace("/$dir_grep/",'',$path);
					$list[]["file"] = "<tr><td><a href='$path_grep'>->".$file."</a></td></tr>\n";
				}elseif( is_dir($dir . $file) ) {
					$path = $dir . $file . "/";
					$list[]["path"] = "<tr><th><a href='./index.php/?path=$path&idx=$file'>$file</a></th></tr>\n";
				}
			}
			return $list;
		}
		?>
	</body>
</html>
