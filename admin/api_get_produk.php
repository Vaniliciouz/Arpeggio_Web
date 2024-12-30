<?php
include '../config/db.php';
include '../admin/method.php';

$request_method = $_SERVER["REQUEST_METHOD"];

$api = new RESTAPI();

switch ($request_method) {
    case 'GET':
        try {
            if (!empty($_GET["id"])) {
                $id = intval($_GET["id"]);
                $api->getProdukGitarAsJSON($id); // Pastikan metode ini mengembalikan JSON
            } else {
                $api->getProdukGitarAsJSON(); // Panggil tanpa ID untuk semua data
            }
        } catch (Exception $e) {
            echo json_encode(["status" => 0, "message" => $e->getMessage()]);
        }
        break;

    case 'POST':
        try {
            $api->insertProdukGitar();
        } catch (Exception $e) {
            echo json_encode(["status" => 0, "message" => $e->getMessage()]);
        }
        break;

    case 'PUT':
        $data = json_decode(file_get_contents("php://input"), true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            echo json_encode(["status" => 0, "message" => "Invalid JSON"]);
            break;
        }
        try {
            $api->updateProdukGitar($data);
        } catch (Exception $e) {
            echo json_encode(["status" => 0, "message" => $e->getMessage()]);
        }
        break;

    case 'DELETE':
        if (!empty($_GET["id"])) {
            $id = intval($_GET["id"]);
            $api->deleteProdukGitar($id);
        } else {
            echo json_encode(["status" => 0, "message" => "ID is required"]);
        }
        break;

    default:
        header("HTTP/1.0 405 Method Not Allowed");
        echo json_encode(["status" => 0, "message" => "Method Not Allowed"]);
        break;
}
