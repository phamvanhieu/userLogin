<?php 
require_once("./autoload.php");
$input = json_decode(file_get_contents('php://input'),true);
$search_key = $input['search_key'];
$userModel = new UserModel();
$user = $userModel->Search($search_key);
echo json_encode($user);