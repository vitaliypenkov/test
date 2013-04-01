<!DOCTYPE html>

<html>

    <head>

        <link href="css/bootstrap.css" rel="stylesheet"/>
        <link href="css/bootstrap-responsive.css" rel="stylesheet"/>
        <link href="css/styles.css" rel="stylesheet"/>

        <?php if (isset($title)): ?>
            <title>CV Maker: <?= htmlspecialchars($title) ?></title>
        <?php else: ?>
            <title>CV Maker</title>
        <?php endif ?>

        <script src="js/jquery-1.8.2.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/scripts.js"></script>

    </head>

    <body>

        <div class="container-fluid">

            <div id="top">
            <?php
            if (!empty($_SESSION["id"]))
            { 
            ?>
            Welcome back,
                <?php
                 $id =  $_SESSION["id"]; 
                 $rows = query("SELECT username from users where id = ?" , $id);                 
                 $name = $rows[0]["username"];
                 echo $name;                 
                ?>  !<br/>
                 <?php } ?>
               
                <a href="/"><img alt="CV Maker src="img/logo.png"/></a>
            </div>

            <div id="middle">

