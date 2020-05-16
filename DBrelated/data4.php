<?php
$link = mysqli_connect("127.0.0.1", "root", "qiao0423","testDB");//链接数据库
//$link = mysqli_connect("172.19.3.119", "root", "qiao0423","testDB");//链接数据库
header("Content-type:text/json;charset=utf-8");
$sql="select * from data";
$result=$link->query($sql);
$array=array();
$i=0;
if ($result->num_rows > 0) {
    // 输出数据
    while($row = $result->fetch_assoc()) {
        array_push($array, $row["specdata"]);
        //echo "$row[specdata]";
        //echo "$array[$i]";
        $i++;

    }
} else {
    echo "0 结果";
}
$sql2="select * from pay";
$result2=$link->query($sql2);
if ($result2->num_rows > 0) {
    // 输出数据
    while($row = $result2->fetch_assoc()) {
        array_push($array, $row["specdata"]);
        //echo "$row[specdata]";
        //echo "$array[$i]";
        $i++;

    }
} else {
    echo "0 结果";
}
$sql3="select * from ios";
$result3=$link->query($sql3);
if ($result3->num_rows > 0) {
    // 输出数据
    while($row = $result3->fetch_assoc()) {
        array_push($array, $row["specdata"]);
        //echo "$row[specdata]";
        //echo "$array[$i]";
        $i++;

    }
} else {
    echo "0 结果";
}
$result=json_encode($array);
echo $result;