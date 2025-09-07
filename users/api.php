<?php

include_once "../Connect.php";
$conect = new Connect;

$request = $_SERVER['REQUEST_METHOD'];

if ($request == 'GET') {
    $users = $conect->select('users');

    if (count($users) > 0) {
        print json_encode($users);
    } else {
        print json_encode(['message' => "error"]);
    }
}


if($request == "POST")
{

    if($conect->isert($_POST,'users')){
         print json_encode(['message' => "user add success"]);
    }else{
         print json_encode(['message' => "error"]);
    }
}

if($request == "DELETE"){
    $data = json_decode(file_get_contents("php://input"), true);
    $id=$data['id'] ?? ($_GET['id'] ?? null);
    // print json_encode(['message' => $id]);
    // exit;
    if($conect->delete('users',$id)){
        print json_encode(['message' => "delete success"]);
    }else{
        print json_encode(['message' => "error"]);
    }

}