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
    </head>
    <body>

        <?php
        require_once './menubar.php';
        require_once '../MyCon.php';
        $ob = new MyCon();
        ?>
    <center>
        <h1>New Cab Detail</h1>
        <?php
        if(isset($_POST['submit']))
        {
            $cat=$_POST['cab_category'];
            $name=$_POST['name'];
            $noofseat=$_POST['noofseat'];
            $minamount=$_POST['minamount'];
            $rate=$_POST['rate'];
            
             $x = $_FILES['t3']['tmp_name'];

    $fp = fopen($x, 'r');
    $y = fread($fp, filesize($x));
    $y = addslashes($y);
    fclose($fp);

    $con = new mysqli("localhost", "root", "", "onlinecab");
            $sql="insert into cab_detail (cab_cat,name,noofseat,minamount,rate,imag) values ('$cat','$name','$noofseat','$minamount','$rate','$y')";
            $re=$con->query($sql);
            if($re==TRUE)
            {
                echo 'Save successfully';
            }
        }
        ?>
        <form name="frm" method="post" enctype="multipart/form-data">
            <table style=" width: 60%; line-height: 50px">
                <tr><td> Select cab type </td>
                    <td>
                        <select name="cab_category" style="width: 200px; height: 30px">
                            <?php
                            $sql = "select id,name from cab_category order by name";
                            $result = $ob->runQuery($sql);
                            while ($row = mysqli_fetch_array($result)) {
                                echo "<option value='$row[0]'>$row[1]</option>";
                            }
                            ?>
                        </select>  

                    </td>
                </tr>
                <tr><td>Name</td><td><input type="text" name="name" style="width: 200px; height: 30px"/></td></tr>
                <tr><td>No of Seat</td><td><input type="text" name="noofseat" style="width: 200px; height: 30px"/></td></tr>
                <tr><td>Minimum Amount</td><td><input type="text" name="minamount" style="width: 200px; height: 30px"/></td></tr>
                <tr><td>Rate (Rs./Km)</td><td><input type="text" name="rate" style="width: 200px; height: 30px"/></td></tr>
                <tr><td>Image</td><td><input type="file" name="t3" style="width: 200px; height: 30px"/></td></tr>
                <tr><td></td><td><input type="submit" name="submit" value="Save" style="width: 200px; height: 30px"/></td></tr>
            </table>
        </form>
    </center>
</body>
</html>
