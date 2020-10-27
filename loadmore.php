<?php 
require_once("./autoload.php");
$input = json_decode(file_get_contents('php://input'),true);
$page = $input['page'];
$orderBy = $input['orderBy'];
if ($orderBy == "DESC") {
    $userModel = new UserModel();
    $user = $userModel->loadmore($page,"DESC");
}elseif($orderBy == "ASC"){
    $userModel = new UserModel();
    $user = $userModel->loadmore($page,"ASC");
}else{
    $userModel = new UserModel();
    $user = $userModel->loadmore($page,"None");
}

echo json_encode($user);