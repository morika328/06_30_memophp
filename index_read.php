<?php

$str = '';
$file = fopen('data/memo.csv', 'r');
flock($file, LOCK_EX);
if ($file) {
    while ($line = fgets($file)) {
        $str .= "<tr><td> {$line} </td></tr>";
        // var_dump($line[1]);
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
                    <dd><?php echo $line; ?></dd>
                    <dd><textarea class="namebox" type="text" name="name"></textarea></dd>
                </div>
                <div class="interestarea">
                    <dt><label for="interest">問合せ内容</label></dt>
                    <dd><input class="interestbox" type="text" name="interest"></dd>
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
                                    <input type="text" name="Dr">
                                </li>
                                <li class="DH"> <label for="DH">DH</label>
                                    <input type="text" name="DH">
                                </li>
                                <li class="sonota"> <label for="sonota">その他</label>
                                    <input type="text" name="sonota">
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
                            <input type="text" name="maker">
                        </li>
                        <li class="kikan"> <label for="kikan">使用歴</label>
                            <input type="text" name="kikan">
                        </li>
                    </div>
                </ul>
            </div>

            <div class="problem_point">
                <div class="problembox">
                    <h2>問題点</h2>
                    <textarea name="" name="problem" cols="50" rows="5"></textarea>
                </div>

                <div class="pointbox">
                    <h2>ポイント</h2>
                    <textarea name="" name="point" cols="50" rows="5"></textarea>
                </div>
            </div>
            <a href="index.php">入力画面</a>
</div>
<td> <?= $str ?> </td>
</body>

</html>