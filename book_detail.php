  <?php
  session_start();
        require_once 'MyCon.php';
        $ob = new MyCon();
        ?>
<?php
                    if(isset($_POST['submit']))
                    {
                        $id=$_POST['id'];
                        $jdate=$_POST['journeydate'];
                         $jtime=$_POST['journeytime'];
                         $esttime=$_POST['esttime'];
                         $arr=$_POST['arrivalplace'];
                         $sql="insert into temp_order (cab_id,jdate,jtime,esttime,arrivalplace) values('$id','$jdate','$jtime','$esttime','$arr')";
                         $result=$ob->runQuery($sql);
                         if($result==TRUE)
                         {

                            $sql="select * from temp_order";
                            $orderid=$ob->lastvalue($sql);
                            $_SESSION['orderid']=$orderid;
                             header("location:login.php");
                         }
                    }
                    ?>
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
                    $sql = "select * from cab_category order by name";
                    $result = $ob->runQuery($sql);
                    while ($row = mysqli_fetch_array($result)) {
                        ?>
                        <li>
                            <a href="index.php?cat=<?php echo $row[0]; ?>"><?php echo $row[1]; ?></a>
                        </li>
                        <?php
                    }
                    ?>

                </ul>

            </div>
            <div class="conright">
                <center>
                <h2>Booking Information</h2>
                <form name="frm" method="post">

                    <input type="hidden" name="id" value="<?php echo $_GET['id'];?>" />
                    <table style="line-height: 40px">
                    <tr><td>Journey Date:</td><td><input type="date" name="journeydate" placeholder="yyyy-mm-dd"/></td></tr>
                    <tr><td>Journey Time:</td><td><input type="time" name="journeytime" placeholder="hh-mm (24 hour format)"/></td></tr>
                    <tr><td>Arrival Place:</td><td><input type="text" name="arrivalplace" /></td></tr>
                    <tr><td>Estimate Time:</td><td><input type="text" name="esttime" /></td></tr>
                    <tr><td></td><td><input type="submit" name="submit" value="submit"/></td></tr>
                </table>
                </form>
                </center>
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
