<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../bootstrap-5.0.2/dist/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    require_once "../Web_Quanlytro/mvc/views/blocks/Header.php";
    ?>
    <?php
    require_once "../Web_Quanlytro/mvc/views/page/Admin/" . $data["Page"] . ".php";
    ?>

</body>

</html>