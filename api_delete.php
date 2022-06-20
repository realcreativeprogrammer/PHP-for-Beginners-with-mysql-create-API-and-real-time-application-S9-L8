<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type:application/json; charset=UTF-8');
header('Access-Control-Allow-Methods:DELETE');
header('Access-Control-Allow-Header: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods');
function input($value){
    $newvalue=trim($value);
    $newvalue=htmlspecialchars($newvalue);
    $newvalue=stripslashes($newvalue);
    return $newvalue;
}

if($_SERVER['REQUEST_METHOD']== 'DELETE'){
    include './conn.php';
    $data=json_decode(file_get_contents('php://input'),true);
    $id=input($data['id']);
    
    $sql='DELETE FROM `user` WHERE id=?';
    $exc=$pdo->prepare($sql);
    $exc->execute(array($id));
    $res=array();
    $res['message']=array('msg'=>'successfuly delete one  date');
    
    http_response_code(200);
    echo json_encode($res);
}else{

    $res=array();
    $res['message']=array('msg'=>'sorry your can use only delete method');
    
    http_response_code(401);
    echo json_encode($res); 
}


?>