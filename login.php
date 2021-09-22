<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="css/style.css"/>
        <script  type="text/javascript" src="slider/jquery.min.js"></script>
        <script type="text/javascript" src="slider/jssor.slider.mini.js"></script>
        <script>
            jQuery(document).ready(function($) {
                var options = {$AutoPlay: true};
                var jssor_slider1 = new $JssorSlider$
                        ('slider1_container', options);
            });
        </script>
    </head>
    <body>
        <?php require_once 'MyCon.php';
         $ob=new MyCon();
        ?>
        <div class="header">
            <div id="slider1_container" style="position: relative;
                         width: 1000px; height: 200px;">
                        <div u="slides" style="cursor: move; position: absolute;
                             overflow: hidden; width: 1000px;
                             height: 200px;">
                            <div><img u="image" src="slider/h01.jpg" /></div>
                            <div><img u="image" src="slider/traveller.jpg" /></div>
                            <div><img u="image" src="slider/swift.jpg" /></div>

                        </div>
                    </div>

        </div>
        <div class="menu"></div>
        <div class="container">
            <div class="conleft">
                <h1> Cab Category</h1>
                <ul>
                    <?php

                    $sql="select * from cab_category order by name";
                    $result=$ob->runQuery($sql);
                    while($row=  mysqli_fetch_array($result))
                    {
                    ?>
                    <li>
                        <a href="index.php?cat=<?php echo $row[0];?>"><?php echo $row[1];?></a>
                    </li>
                    <?php
                    }
                    ?>

                </ul>

            </div>
            <div class="conright">
                <center>
                    <h2>Login (if already registered)</h2>
                    <form name="frm" method="post">
                    <table style="line-height: 40px">
                        <tr><td>Userid</td><td><input type="text" name="userid"/></td></tr>
                         <tr><td>Password</td><td><input type="password" name="password"/></td></tr>
                          <tr><td></td><td><input type="submit" name="submit" value="Login"/></td></tr>
                    </table>
                        Click here for <a href="register.php">Register new user</a>
                    </form>
                </center>

            </div>

        </div>
        <div class="footer">
    </body>
</html>
