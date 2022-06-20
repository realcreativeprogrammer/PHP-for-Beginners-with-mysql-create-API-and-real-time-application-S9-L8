<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type:application/json; charset=UTF-8');
include './conn.php';

$sql='SELECT `id`, `email`, `password`, `date` FROM `user`';
$exc=$pdo->prepare($sql);
$exc->execute(array());
$res=array();
$res['data']=array();

while($row =$exc->fetch()){
    $single_row=array('id'=>$row['id'],'useremail'=>$row['email'],'password'=>$row['password'],'date'=>$row['date']);
    array_push($res['data'],$single_row);
}
$res['message']=array('msg'=>'successfuly return date');

http_response_code(200);
echo json_encode($res);

?>