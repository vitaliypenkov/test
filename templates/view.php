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
        <div class="container-fluid view">
            <div id="middle">
                <div id="view_name">
                    <? if (!empty($info[0]["lname"])) echo $info[0]["lname"] ?>                 
                    <? if (!empty($info[0]["fname"])) echo $info[0]["fname"] ?>  
                    <? if (!empty($info[0]["mname"])) echo $info[0]["mname"] ?> 
                </div>

                <div class="view">
                    <div id="view_left">Contacts</div>
                    <div id="view_right">
                    <a href="mailto:<? if (!empty($info[0]["email"])) echo "E-mail: ", $info[0]["email"] ?>?Subject=<? if (!empty($info[0]["fname"])) echo $info[0]["fname"]?> <? if (!empty($info[0]["lname"])) echo $info[0]["lname"]?>, <?if (!empty($goal[0]["position"])) echo $goal[0]["position"]?>: Interview Request">
                    <? if (!empty($info[0]["email"])) echo $info[0]["email"] ?></a>
                    <br/>
                    <? if (!empty($info[0]["phone1"])) echo "Address: ", $info[0]["phone1"] ?>  
                    <br/>
                    <? if (!empty($info[0]["phone2"])) echo "Phone: ", $info[0]["phone2"] ?>  
                    </div>
                </div>

                <div class="view">                
                <div id="view_left">Desired Position</div>
                <div id="view_right">                                
                <? if (!empty($goal[0]["position"])) echo $goal[0]["position"]?> 
                </div>
                </div>                                                

                <div class="view">                                
                <div id="view_left">Objective</div>                    
                <div id="view_right">                
                <? if (!empty($goal[0]["objective"])) echo $goal[0]["objective"] ?> 
                </div>
                </div>                

                <div class="view">
                <div id="view_left">Summary of Work Experience</div>                    
                    <?php 
                        $count = count($wexps);     
                        for ($i = 0; $i < $count; $i++)                
                        {    
                            echo "<div id=\"view_right\">";                
                            echo "<b>Name of Employer:</b> ", $wexps[$i]["company"] ;
                            echo "<br>";
                            echo "<b>Dates of Employment:</b> ",$wexps[$i]["start_date"], " - ", $wexps[$i]["end_date"];          
                            echo "<br>";
                            echo "<b>Position:</b>", $wexps[$i]["position"];        
                            echo "</div>";
                        }
                    ?>
                </div>
                </div>                

                <div class="view">
                <div id="view_left">Education</div>                                    
                <?php 

                    $count = count($edu);     
                    for ($i = 0; $i < $count; $i++)                
                    {    
                        echo "<div id=\"view_right\">";                
                        echo "<b>Institution:</b> ", $edu[$i]["institution"];   
                        echo "<br>";
                        echo "<b>Qualification:</b> ", $edu[$i]["qualification"] ;
                        echo "<br>";
                        echo "<b>Dates of Studying:</b> ", $edu[$i]["start_date"], " - ", $edu[$i]["end_date"];  
                        echo "</div>";
                     }
                ?> 
                </div>

                
                <div class="view">
                <div id="view_left">Projects</div>                                    
                <?php 

                    $count = count($projects);     
                    for ($i = 0; $i < $count; $i++)                
                    {    
                        echo "<div id=\"view_right\" class=\"a1\">";                
                        echo "<b>Project Name:</b> ", $projects[$i]["project_name"];   
                        echo "<br>";
                        echo "<b>Role:</b> ", $projects[$i]["role"] ;
                        echo "<br>";
                        echo "<b>Project Description:</b>", $projects[$i]["workload"]; 
                        echo "<br>"; 
                        echo "<b>Key Responsibilities:</b>", $projects[$i]["responsibilities"]; 
                        echo "<br>"; 
                        echo "<b>Project Technologies:</b>", $projects[$i]["technologies"];                          
                        echo "</div>";
                     }
                ?> 
                </div>
                </div>                
                                
            </div> 
        </div>
    </body>
</html>
