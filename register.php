<?php
session_start();
require_once 'MyCon.php';
         $ob=new MyCon();
        ?>
<?php
if(isset($_POST['submit']))
{
    $userid=$_POST['userid'];
    $password=$_POST['password'];
    $name=$_POST['name'];
    $mobile=$_POST['mobile'];
    $email=$_POST['email'];
    $address=$_POST['address'];
    $city=$_POST['city'];
    $state=$_POST['state'];
    $country=$_POST['country'];
    $sql="insert into customer(userid,password,name,email,mobile,address,city,state,country) values('$userid','$password','$name','$email','$mobile','$address','$city','$state','$country')";
    $result=$ob->runQuery($sql);
    if($result==TRUE)
    {
        $_SESSION['userid']=$userid;
        header("location:payment.php");
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
                    <h2>New User Register </h2>

                    <form name="frm" method="post">
                    <table style="line-height: 40px">
                        <tr><td>Userid</td><td><input type="text" name="userid"/></td></tr>
                         <tr><td>Password</td><td><input type="password" name="password"/></td></tr>
                         <tr><td>Name</td><td><input type="text" name="name"/></td></tr>
                         <tr><td>mobile</td><td><input type="text" name="mobile"/></td></tr>
                         <tr><td>Email</td><td><input type="text" name="email"/></td></tr>
                         <tr><td>Address</td><td><input type="text" name="address"/></td></tr>
                         <tr><td>City</td><td><input type="text" name="city"/></td></tr>
                         <tr><td>State</td><td><input type="text" name="state"/></td></tr>
                         <tr><td>Country</td><td><input type="text" name="country"/></td></tr>

                         <tr><td></td><td><input type="submit" name="submit" value="Register"/></td></tr>
                    </table>
                        Click here for <a href="register.php">Register new user</a>
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
