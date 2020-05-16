<?php
$link = mysqli_connect("172.19.3.119", "root", "qiao0423","testDB");//链接数据库
header("Content-type:text/html;charset=utf-8");
//echo "<script type=" . "\"" . "text/javascript" . "\"" . ">" . "window.alert" . "(" . "\"" . "该用户名已被注册" . "\"" . ")" . ";" . "</script>";
if ($link) {
    //echo"链接数据库成功";


        //echo"选择数据库成功！";
        //if (isset($_POST["sub"])) {
            $name = $_POST["username"];
            $password1 = $_POST["pass"];//获取表单数据
            $password2 = $_POST["pass2"];
            if ($password1 == $password2)//确认密码是否正确
            {
                $str ="select password from reg where username="."'"."$name"."'";
                $result = mysqli_query($link, $str);
                $pass = mysqli_fetch_row($result);
                $pa = $pass[0];
                echo "<script type=" . "\"" . "text/javascript" . "\"" . ">" . "window.alert" . "(" . "\"" . "$name"."$password1"."$password2" . "\"" . ")" . ";" . "</script>";
                if ($pa)//判断数据库表中是否已存在该用户名
                {

                    echo "<script type=" . "\"" . "text/javascript" . "\"" . ">" . "window.alert" . "(" . "\"" . "该用户名已被注册" . "\"" . ")" . ";" . "</script>";
                    echo "<script type=" . "\"" . "text/javascript" . "\"" . ">" . "window.location=" . "\"" . "register.html" . "\"" . "</script>";
                    exit;
                }
                //$insert_sql="insert into reg(username,password)values(? , ? )";
                //$stmt=mysqli_prepare($link,$insert_sql);
                //mysqli_stmt_bind_param($stmt,'ss',$name,$password1);
                //$result_insert=mysqli_stmt_execute($stmt);
                echo"$name";


                $sql = "insert into reg(username, password) values('$name','$password1')";//将注册信息插入数据库表中
               // $sql = "insert into reg(username, password) values('+$name+','+$password1+')";//将注册信息插入数据库表中
                //$link.db2_commit();
                echo "<script type=" . "\"" . "text/javascript" . "\"" . ">" . "window.alert" . "(" . "\"" . "$sql" . "\"" . ")" . ";" . "</script>";
                echo"$sql";
                $re=mysqli_query($link, $sql);
                echo"$re";
                echo "<script type=" . "\"" . "text/javascript" . "\"" . ">" . "window.alert" . "(" . "\"" . "$re" . "\"" . ")" . ";" . "</script>";

                $close = mysqli_close($link);
                if ($close) {
                    //echo"数据库关闭";
                    //echo"注册成功！";
                    echo "<script type=" . "\"" . "text/javascript" . "\"" . ">" . "window.location=" . "\"" . "return.html" . "\"" . "</script>";
                }
            } else {
                echo "<script type=" . "\"" . "text/javascript" . "\"" . ">" . "window.alert" . "(" . "\"" . "密码不一致！" . "\"" . ")" . ";" . "</script>";
                echo "<script type=" . "\"" . "text/javascript" . "\"" . ">" . "window.location=" . "\"" . "register.html" . "\"" . "</script>";
            }
       // }
    $close = mysqli_close($link);


}
?>