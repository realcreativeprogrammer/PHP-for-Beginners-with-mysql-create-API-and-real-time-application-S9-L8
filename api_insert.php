<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type:application/json; charset=UTF-8');
header('Access-Control-Allow-Methods:POST');
header('Access-Control-Allow-Header: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods');
function input($value){
    $newvalue=trim($value);
    $newvalue=htmlspecialchars($newvalue);
    $newvalue=stripslashes($newvalue);
    return $newvalue;
}
include './conn.php';
$data=json_decode(file_get_contents('php://input'),true);
$email=input($data['email']);
$password=input($data['password']);

$sql='INSERT INTO `user`(`email`, `password`) VALUES (?,?)';
$exc=$pdo->prepare($sql);
$exc->execute(array($email,$password));
$res=array();
$res['message']=array('msg'=>'successfuly added one  date');

http_response_code(201);
echo json_encode($res);

?>