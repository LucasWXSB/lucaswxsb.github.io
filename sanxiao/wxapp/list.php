<?php
//分类接口
require_once "db.php";
$conn = new mysqli($servername, $username, $password, $dbname);
$data= "SELECT * FROM `sh_award`";
$result = $conn->query($data);
$arr = array();
if ($result->num_rows > 0) {
    // 输出每行数据
    while($row = $result->fetch_assoc()) {
         $title = $row {"$title"};
         array_push($arr,$row);
    }
} 
 echo json_encode($arr);