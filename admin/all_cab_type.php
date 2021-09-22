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
    <center>
        <?php
        require_once './menubar.php';
        require_once '../MyCon.php';
        ?>
        <h2>All Cab  Type list</h2>
        <table style="width: 60%" border="1px solid">
            <tr><th>id</th><th>Name</th><th>Detail</th></tr>
        <?php
        $sql="select * from cab_category";
        $ob=new MyCon();
        $result=$ob->runQuery($sql);
        while($row=  mysqli_fetch_array($result))
        {
            echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td></tr>";
        }
        ?>
        </table>
    </center>
    </body>
</html>
