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
        ?>
    <center>
        <form name="frm" method="post">
            <h2>
                New Cab Entry
            </h2>
            <?php
            if(isset($_POST['submit']))
            {
                $name=$_POST['name'];
                $detail=$_POST['detail'];
                $ob=new MyCon();
                $sql="insert into cab_category (name,detail) values('$name','$detail')";
                $result=$ob->runQuery($sql);
                if($result==TRUE)
                {
                    echo "save successfully";
                }
            }
            ?>
            <table style="line-height: 50px">
                <tr><td>Cab Name</td><td><input type="text" name="name"/></td></tr>
                <tr><td>Cab Detail</td><td><textarea name="detail" style="width: 200px; height: 100px"></textarea></td></tr>
                <tr><td></td><td><input type="submit" name="submit" value="submit"/></td></tr>
            </table>
        </form>
    </center>
    </body>
</html>
