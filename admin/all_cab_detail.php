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
            <tr><th>id</th><th>Cab Category</th><th>Name</th><th>No of Seat</th><th>Minimum amount</th><th>Rate</th><th>Image</th></tr>
        <?php
        $sql="select * from cab_detail";
        $ob=new MyCon();
        $result=$ob->runQuery($sql);
        while($row=  mysqli_fetch_array($result))
        {
            echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td><td>";
                    echo "<img src='showimage1.php?id=$row[0]' width='100' height='100'  /></td></tr>";
        }
        ?>
        </table>
    </center>
    </body>
</html>
