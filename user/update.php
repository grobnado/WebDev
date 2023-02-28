<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");



include_once '../src/database.php';
include_once '../models/user.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

$data = json_decode(file_get_contents("php://input"));

$user->id = $data->id;

$user->name = $data->name;
$user->username = $data->username;
$user->idCity = $data->idCity;


    if ($user->update()) {

        http_response_code(201);
        echo json_encode(array("message" => "Пользователь был обновлен."));
    } else {
        http_response_code(503);

        echo json_encode(["message" => "Невозможно обновить пользователя."]);
    }
