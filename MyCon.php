<?php

class MyCon{
    function runQuery($sql)
    {
        $con=new mysqli("localhost","root","","onlinecab");
        $result=$con->query($sql);
        return $result;
    }
     function lastvalue($sql)
    {
        $con=new mysqli("localhost","root","","onlinecab");
        $result=$con->query($sql);
        $x="";
        while($row=  mysqli_fetch_array($result))
        {
           $x=$row[0];
        }
        return $x;
    }
}
