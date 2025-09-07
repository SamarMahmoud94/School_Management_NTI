<?php

include_once "../Connect.php";
$conect = new Connect;

$request = $_SERVER['REQUEST_METHOD'];

if ($request == 'GET') {
    $students = $conect->select('student_info');

    if (count($students) > 0) {
        print json_encode($students);
    } else {
        print json_encode(['message' => "error"]);
    }
}


if($request == "POST")
{

    if($conect->isert($_POST,'student_info')){
         print json_encode(['message' => "student add success"]);
    }else{
         print json_encode(['message' => "error"]);
    }
}

if($request == "DELETE"){
    $data = json_decode(file_get_contents("php://input"), true);
    $id=$data['id'] ?? ($_GET['id'] ?? null);
    // print json_encode(['message' => $id]);
    // exit;
    if($conect->delete('student_info',$id)){
        print json_encode(['message' => "delete success"]);
    }else{
        print json_encode(['message' => "error"]);
    }

}