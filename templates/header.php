<!DOCTYPE html>

<html>

    <head>

        <link href="css/bootstrap.css" rel="stylesheet"/>
        <link href="css/bootstrap-responsive.css" rel="stylesheet"/>
        <link href="css/styles.css" rel="stylesheet"/>

        <?php if (isset($title)): ?>
            <title>C$50 Finance: <?= htmlspecialchars($title) ?></title>
        <?php else: ?>
            <title>C$50 Finance</title>
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
               
                <a href="/"><img alt="C$50 Finance" src="img/logo.gif"/></a>
            </div>

            <div id="middle">

