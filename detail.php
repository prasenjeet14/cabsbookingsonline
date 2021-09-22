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
                $id=$_GET['id'];
                $sql="select * from cab_detail where id=$id";
                $result=$ob->runQuery($sql);
                if($row=  mysqli_fetch_array($result))
                {
                ?>
                <div style="width: 50%; height: 400px; float: left">
                    <img src="admin/showimage1.php?id=<?php echo $id;?>" style="width: 200px; height: 200px"/>

                </div>
                <div style="width: 50%; height: 400px; float: left">
                    <h1>Cab Detail</h1>
                    <ul>
                      <li> Name: <?php echo $row[2]; ?></li>
                        <li>No of Seat: <?php echo $row[3]; ?></li>
                        <li>Minimum Diposit Amount: rs.<?php echo $row[4]; ?></li>
                        <li>Rate: Rs. <?php echo $row[5]; ?> /Km</li>
                        <li><a href="book_detail.php?id=<?php echo $row[0]; ?>"><input type="button" name="btn" value="Book Now"/></a></li>
                    </ul>
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
