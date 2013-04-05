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
        
    </head>

    <body>
        <div class="container-fluid">
            <div id="middle">
                <div class="view header-name">
                    <h1>   
                    <? if (!empty($info[0]["fname"])) echo $info[0]["fname"] ?>  
                    <? if (!empty($info[0]["lname"])) echo $info[0]["lname"] ?> 
                    <? if (!empty($info[0]["mname"])) echo $info[0]["mname"] ?> 
                    </h1>
    
                <div>

                <div class="view header-contacts">
                    <a href="mailto:<? if (!empty($info[0]["email"])) echo "E-mail: ", $info[0]["email"] ?>?Subject=<? if (!empty($info[0]["fname"])) echo $info[0]["fname"]?> <? if (!empty($info[0]["lname"])) echo $info[0]["lname"]?>, <?if (!empty($goal[0]["position"])) echo $goal[0]["position"]?>: Interview Request">
                    <? if (!empty($info[0]["email"])) echo $info[0]["email"] ?></a>
                    <p> 
                     <? if (!empty($info[0]["phone1"])) echo "Phone: ", $info[0]["phone1"] ?>  
                    <p> 
                    <? if (!empty($info[0]["phone2"])) echo "Phone: ", $info[0]["phone2"] ?>  
                <div>

                <div class="view objective">
                    <? if (!empty($goal[0]["position"])) echo "<h4>Position:</h4> ", $goal[0]["position"]?> 
                    <? if (!empty($goal[0]["objective"])) echo "<h4>Objective:</h4> ", $goal[0]["objective"] ?> 
                <div>

                <div class="view experience">
                    <h4>Summary of Work Experience</h4>
                    <?php 
                        $count = count($wexps);     
                        for ($i = 0; $i < $count; $i++)                
                        {    
                            echo "<br>";
                            echo "<b>Name of Employer:</b> ", $wexps[$i]["company"] ;
                            echo "<br>";
                            echo "<b>Dates of Employment:</b> ",$wexps[$i]["start_date"], " - ", $wexps[$i]["end_date"];          
                            echo "<br>";
                            echo "<b>Position:</b> ", $wexps[$i]["position"];        
                            echo "<p>";
                            
                         }
                    ?>     
                <div>

                <div class="view education">
                <h4>Education</h4>
                <?php 

                    $count = count($edu);     
                    for ($i = 0; $i < $count; $i++)                
                    {    
                        echo "<br>";
                        echo "<b>Institution:</b> ", $edu[$i]["institution"];   
                        echo "<br>";
                        echo "<b>Qualification:</b> ", $edu[$i]["qualification"] ;
                        echo "<br>";
                        echo "<b>Dates of Studying:</b> ", $edu[$i]["start_date"], " - ", $edu[$i]["end_date"];  
                        echo "<p>";        
                     }
                ?> 
                <div>
            </div> 
        </div>
    </body>
</html>
