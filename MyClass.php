<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
$conn = new mysqli("localhost", "root", "", "stu");
$result = $conn->query("SELECT name,rno from class;");


$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {$outp .= ",";}


    $outp .= '{"name":"'  . $rs["name"] . '",';
    $outp .='"rno":"'   . $rs["rno"] .'"}';
}
$outp ='{"records":['.$outp.']}';

$conn->close();

echo($outp);
?>
