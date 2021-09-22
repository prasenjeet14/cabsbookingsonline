<?php
session_start();
require_once 'MyCon.php';
         $ob=new MyCon();
        ?>
<?php
if(isset($_POST['submit']))
{
    $userid=$_SESSION['userid'];
    $amount=$_POST['amount'];
    $orderid=$_SESSION['orderid'];

    $sql="insert into confirm_order(orderid,userid,amount) values('$orderid','$userid','$amount')";
    $result=$ob->runQuery($sql);
    if($result==TRUE)
    {
        header("location:success.php");
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
                    <h2>Payment</h2>
                    <h4>Welcome: <?php
                    echo $_SESSION['userid'];
                    ?>
                        <?php
                        $orderid=$_SESSION['orderid'];
                        $sql="select cd.minamount from cab_detail cd,temp_order tmo where tmo.cab_id=cd.id and tmo.id='$orderid'";
                       $result= $ob->runQuery($sql);
                       $amount=0;
                       if($row=  mysqli_fetch_array($result))
                       {
                           $amount=$row[0];
                           echo "<br>Your pament amount is ".$row[0];
                       }
                        ?>

                    <form name="frm" method="post">
                        <input type="hidden" name="amount" value="<?php echo $amount ?>"/>
                    <table style="line-height: 40px">
                        <tr><td>Card Type</td><td>
                                <select name="cardtype">
                                    <option>Credit Card</option>
                                    <option>Debit Card</option>
                                    <option>Visa Card</option>
                                    <option>Rupay Card</option>
                                </select>


                            </td></tr>
                        <tr><td>Bank Name</td><td>
                                <select name="bank">
                                     <option>State Bank of India</option>
                                      <option>Panjab National Bank</option>
                                       <option>Bank of Baroda</option>
                                </select>



                            </td></tr>
                         <tr><td>Card Holder</td><td><input type="text" name="name"/></td></tr>
                         <tr><td>CVV</td><td><input type="text" name="cvv"/></td></tr>
                         <tr><td>Expiry Date</td><td><input type="text" name="expry" placeholder="mm-yyyy"/></td></tr>
                         <tr><td>Pin</td><td><input type="password" name="pin"/></td></tr>


                         <tr><td></td><td><input type="submit" name="submit" value="pay"/></td></tr>
                    </table>

                    </form>
                </center>

            </div>

        </div>
        <div class="footer">
    </body>
</html>
