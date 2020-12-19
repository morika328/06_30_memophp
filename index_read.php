<?php

$str = '';
$file = fopen('data/memo.csv', 'r');



flock($file, LOCK_EX);
if ($file) {
    while ($line = fgets($file)) {
        $str .= "<tr><td> {$line} </td></tr>";
        // var_dump($str);
        // exit();
    }
}

// $csv_body = array_splice($line, 1);
// foreach ($csv_body as $row) {
//     $row_array = explode(',', $row);
//     var_dump($row_array);
//     //　処理
// }

flock($file, LOCK_UN);
fclose($file);
?>

<?php
// $csv_file = file_get_contents('data/memo.csv');
// $aryHoge = explode("\n", $csv_file);

$filer = fopen('data/memo.csv', 'r');

$newAry = array();

while ($line = fgetcsv($filer)) {
    $newAry[] = $line;
}

fclose($filer);

// $arycsv = [];

// var_dump($newAry);
// exit();

// foreach($)


?>


<!DOCTYPE html>
<html lang="ja">

<div class="main">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="memo.css">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>商談メモ</title>
    </head>

    <body>


        <form action="index_create.php" method="POST">

            <div class="h1">
                <h1>商談メモ</h1>
            </div>
            <!-- 入力場所 -->

            <dl class="dl1">
                <div class="namearea">
                    <dt><label for="name">医院名</label></dt>
                    <dd></dd>
                    <dd><textarea class="namebox" type="text" name="name"> <?= $newAry[0][0] ?></textarea></dd>
                </div>
                <div class="interestarea">
                    <dt><label for="interest">問合せ内容</label></dt>
                    <dd><textarea class="interestbox" type="text" name="interest"><?= $newAry[0][1] ?></textarea></dd>
                </div>
            </dl>

            <div class="kihon">
                <h2>基本情報</h2>
                <div class="staff">
                    <p>スタッフ</p>
                    <div class="staffkind">
                        <ul>
                            <div class="list">
                                <li class="Dr"> <label for="Dr">Dr</label>
                                    <textarea type="text" name="Dr"><?= $newAry[0][2] ?></textarea>
                                </li>
                                <li class="DH"> <label for="DH">DH</label>
                                    <textarea type="text" name="DH"><?= $newAry[0][3] ?></textarea>
                                </li>
                                <li class="sonota"> <label for="sonota">その他</label>
                                    <textarea type="text" name="sonota"><?= $newAry[0][4] ?></textarea>
                                </li>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="system">
                <h2>使用中システム</h2>
                <ul>
                    <div class="list">
                        <li class="maker"> <label for="maker">メーカー</label>
                            <textarea type="text" name="maker"><?= $newAry[0][5] ?></textarea>
                        </li>
                        <li class="kikan"> <label for="kikan">使用歴</label>
                            <textarea type="text" name="kikan"><?= $newAry[0][6] ?></textarea>
                        </li>
                    </div>
                </ul>
            </div>

            <div class="problem_point">
                <div class="problembox">
                    <h2>問題点</h2>
                    <textarea name="" name="problem" cols="50" rows="5"><?= $newAry[0][7] ?></textarea>
                </div>

                <div class="pointbox">
                    <h2>ポイント</h2>
                    <textarea name="" name="point" cols="50" rows="5"><?= $newAry[0][8] ?></textarea>
                </div>
            </div>
            <a href="index.php">入力画面</a>
</div>
<!-- <td> <?= $str ?> </td> -->



</body>

</html>