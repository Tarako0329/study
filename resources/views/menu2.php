<?php

// 設定ファイルインクルード【開発中】

require "functions.php";
?>
<head>
    <!--<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">-->
    <META http-equiv='Content-Type' content='text/html; charset=UTF-8'>
    <TITLE>Cafe Presentsメニュー</TITLE>
    <link rel="stylesheet" href="css/style2.css" >
</head>
<script>
window.onload = function() {

     // オブジェクトと変数の準備
     
     //合計金額を保持
     var kaikei_disp = document.getElementById("kaikei");
     var total_pay = 0;
     
     //PHPで繰り返し表示。メニューボタン数に応じて準備する
<?php     
	$mysqli = new mysqli(sv, user, pass, dbname);
	//商品M取得
	$sql = "select * from ShouhinMS";
	$result = $mysqli->query( $sql );
	$row_cnt = $result->num_rows;
    while($row = $result->fetch_assoc()){
        echo "\n";
        echo "  var suryou_".$row["shouhinCD"]."  = document.getElementById('suryou_".$row["shouhinCD"]."');\n" ;         //001ボタンの注文数
        echo "  var btn_menu_".$row["shouhinCD"]." = document.getElementById('btn_menu_".$row["shouhinCD"]."');\n";       //001ボタンのオブジェクト
        echo "  var cnt_suryou_".$row["shouhinCD"]." = 0;\n";                                                             //001ボタンのカウンタ
        echo "\n";
        echo "    btn_menu_".$row["shouhinCD"].".onclick = function (){\n";
        echo "        cnt_suryou_".$row["shouhinCD"]." += 1;\n";
        echo "        total_pay += ".$row["tanka"].";\n";
        echo "        suryou_".$row["shouhinCD"].".value = cnt_suryou_".$row["shouhinCD"].";\n";
        echo "        kaikei_disp.innerHTML = total_pay;\n";
        echo "    };\n";
        echo "\n";
    }
?>
    // メニューボタンクリック処理
    btn_menu_2.onclick = function (){
        cnt_suryou_2 += 1;
        total_pay += 230;
        suryou_2.value = cnt_suryou_2;
        kaikei_disp.innerHTML = total_pay;
    };


     var reset_btn = document.getElementById("btn_reset");
     // リセットボタンのクリック処理
     reset_btn.onclick = function (){
          cnt_suryou_001 = 0; count_disp.innerHTML = cnt_suryou_001;
     }
};    
</script>


<header><h1>Cafe Presents</h1></header>

<body>
    <div class="main">
        <div class="contentA">
            <div class="menu">
                
<?php
    $result->data_seek(0);
	$result2 = $mysqli->query( $sql );
	$row_cnt2 = $result->num_rows;
	
	$i = 1;     //改行カウンタ
	$j = 1;     //レコードカウンタ
    //echo $row_cnt;

	while($j <= $row_cnt){
	    //改行リセット
	    $i = 1;

	    //商品パネルセット
	    while($i <= 4  ){
	        $row = $result->fetch_assoc();
            if(isset($row)){
                echo "  <div class ='items'>\n";
                echo "      <button type='button' class='btn btn--orange' id='btn_menu_".$row["shouhinCD"]."'>".mb_convert_encoding($row["shouhinNM"], "utf-8", "sjis-win")."\n";
                echo "      <input type='hidden' name ='hinmei_".$row["shouhinCD"]."' value = '".$row["shouhinNM"]."' id='hinmei".$row["shouhinCD"]."'>\n";
                echo "      </button>\n";
                echo "  </div>\n";
            } else {
                echo "  <div class ='items' style = 'background-color: #fff'>\n";
                echo "  </div>\n";
            }
            $i = $i + 1;
	    }
	    
	    //改行リセット
	    $i = 1;
	    
	    //値段・数量パネルセット
	    while($i <= 4){
            $row2 = $result2->fetch_assoc();
            if(isset($row2)){
                echo "  <div class ='ordered' style='display: inline'>\n";
                echo "      ￥<input type='number' readonly='readonly' id='nedan_".$row2["shouhinCD"]."' class=tanka value=".$row2["tanka"]." name='nedan_".$row2["shouhinCD"]."'> \n";
                echo "      × <input type = 'number' readonly='readonly' name ='su_".$row2["shouhinCD"]."' id='suryou_".$row2["shouhinCD"]."' class='su' value = 0> \n";
                echo "  </div>\n";
                $j = $j + 1;
            }else{
                echo "  <div class ='items' style = 'background-color: #fff'>\n";
                echo "  </div>\n";
            }
            $i = $i + 1;
	    }
	}
?> 
<!--
                <div class ='items'>
                    <button type="button" class="btn btn--orange" id="btn_menu_001">プレーン
                        <input type = "hidden" name ="hinmei" value = "プレーン" id="hinmei">
                    </button>
                </div>
                <div class ="items"><a href="" class="btn btn--orange" id="">クッキー</a></div>
                <div class ="items"><a href="" class="btn btn--orange" id="">クッキー</a></div>
                <div class ="items"><a href="" class="btn btn--orange" id="">クッキー</a></div>
                
                <div class ="ordered" style="display: inline">
                    ￥<input type="number" readonly="readonly" id="nedan" class=tanka value=230 > × <input type = "number" readonly="readonly" name ="su" id="suryou_001" class="su" value = 0> 
                </div>
                <div class ="ordered" style="display: inline">￥<span id="nedan">230</span> × <input type = "number" value = 0 name ="su" id="suryou" class="su"> </div>
                <div class ="ordered" style="display: inline">￥<span id="nedan">230</span> × <input type = "number" value = 0 name ="su" id="suryou" class="su"> </div>
                <div class ="ordered" style="display: inline">￥<span id="nedan">230</span> × <input type = "number" value = 0 name ="su" id="suryou" class="su"> </div>

                <div class ="items"><a href="" class="btn btn--orange" id="">クッキー１</a></div>
                <div class ="items"><a href="" class="btn btn--orange" id="">クッキー</a></div>
                <div class ="items"><a href="" class="btn btn--orange" id="">クッキー</a></div>
                <div class ="items"><a href="" class="btn btn--orange" id="">クッキー</a></div>
                <div class ="items"><a href="" class="btn btn--orange" id="">クッキー</a></div>
                <div class ="items"><a href="" class="btn btn--orange" id="">クッキー</a></div>
                <div class ="items"><a href="" class="btn btn--orange" id="">クッキー</a></div>
                <div class ="items"><a href="" class="btn btn--orange" id="">クッキー</a></div>
                <div class ="items"><a href="" class="btn btn--orange" id="">クッキー</a></div>
-->                
            </div>
        </div>
        <div class="contentB">
            ORDER LIST
            
        </div>
    </div>
</body>

<footer><h2 class="kaikei">お会計　￥<span id="kaikei">0</span>円</h2></footer>

