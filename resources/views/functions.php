<?php
session_start();

// =========================================================
// オンラインリンク　設定ファイル
// =========================================================
//データベース設定

define("sv", "localhost");
define("user", "ifduktdo_CafePresent");
define("pass", "H1mur0Ky0u2uke");

define("key","bonBer");


//=========================================================
//  本番・テストのデータベースの切り替えはここで行います。
//  有効にしたいコードをコメントから外してください。
//=========================================================
//データベース切り替え
/*
if(__FILE__=="/home/ifduktdo/public_html/training_test/config.php"){
	//echo "test";
	define("dbname", "ifduktdo_MASSURU_test");
}else if(__FILE__=="/home/ifduktdo/public_html/training/config.php"){
	//echo "本番";
	define("dbname", "ifduktdo_MASSURU");
}else{
	echo "ERROR<BR>";
	exit();
}
*/
define("dbname", "ifduktdo_CafePresent");
$mysqli = new mysqli(sv, user, pass, dbname);

// =========================================================
// MySQLエラーレポート用共通宣言
// =========================================================
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);





// =========================================================
// アクセスログ記録
// =========================================================

//未実装

// =========================================================
// 自動ログインチェック
// =========================================================




?>

