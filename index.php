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
                             overflow: hidden; width: 1300px;
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
                <?php

                $sql="select id,name from cab_detail ";
                if(isset($_GET['cat']))
                {
                    $cat=$_GET['cat'];
                      $sql.=" where cab_cat=$cat";
                }
                 $result=$ob->runQuery($sql);
                    while($row=  mysqli_fetch_array($result))
                    {
                ?>

                <div style="width: 25%; height: 100px; float: left; margin: 25px 25px 25px 25px">
                    <?php echo $row[1]; ?>
                    <br>
                    <img src="admin/showimage1.php?id=<?php echo $row[0]; ?>" style="width: 80px; height: 80px; "/><br>
                    <a href="detail.php?id=<?php echo $row[0]; ?>"> <input type="button" name="btn" value="Detail"/></a>
                </div>

                <?php
                    }
                ?>




            </div>

        </div>
        <div class="footer">
          <table >
            <tr>
              <td ><img class="about" src ="slider/facebook.jpg"></td>
              <td ><img class="about" src ="slider/twitter.jpg"></td>
              <td ><img class="about" src ="slider/Instagram.jpg"></td>
            </tr>
          </table>
    </body>
</html>
