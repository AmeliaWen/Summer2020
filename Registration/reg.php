<!DOCTYPE html>
<html>
<body>
<?php
$conn=new mysqli("172.19.3.119", "root", "qiao0423", "testDB");
$conn->set_charset('utf-8');
//if(isset($_POST["Login"])){
    $name=$_POST["username"];
    $password=$_POST["pass"];
    $str="select password from reg where username="."'"."$name"."'";
    $result=mysqli_query($conn, $str);
    $pass=mysqli_fetch_row($result);
    $pa=$pass[0];
    if($pa==$password){
        echo "success";
    }
//}
mysqli_close($conn);
?>
</body>
</html>
