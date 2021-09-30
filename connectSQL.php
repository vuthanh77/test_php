<?php
    $servername="localhost";
        $username="root";
        $password="";
        $dbname="qlsv_ht11";
        $con=mysqli_connect($servername,$username,$password,$dbname);
  
    function thucthi($sql){
        global $con;
        mysqli_query($con,$sql);
        mysqli_close($con);
    }   
    function hienthi($sql){
        global $con;
        $result=mysqli_query($con,$sql);
        $list=[];
        while($row=mysqli_fetch_array($result,1)){
                $list[]=$row;
        }
        return($list);
        mysqli_close($con);
    }

?>   