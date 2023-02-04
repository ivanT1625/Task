<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
<?php

    $data = trim($_GET["date"]);
    $connect = mysqli_connect('localhost','root','','Posts');

    if ($data == ""){
        echo "Введите дату";
    } else{

        $posts = mysqli_query($connect, "SELECT * FROM `poststs` WHERE `data` = '$data' ");
            $postsList = [];

            while($post =  mysqli_fetch_assoc($posts)){
                $postsList[] = $post;
            }
            if (count($postsList) == 0){
                echo "Новости отсутствуют. Введите другую дату";
            } else {

            foreach ($postsList as $post){ ?>
                <div class="post">
                    <h1><?=$post["title"]?></h1>
                    <p><?=$post["text"]?></p>
                    <h4><?=$post["data"]?></h4>
                </div>
            <?php }
        }
    }
?>
</body>
</html>
