<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET");

include("connect.php");

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'POST':
        handlePost($pdo);
        break;
    default:
        echo json_encode(['message' => 'Invalid request method']);
        break;
}

function handlePost($pdo)
{
    $input = json_decode(file_get_contents("php://input"), true);
    if (!isset($input['categoryID'])) {
        echo json_encode(['message' => 'categoryID is required']);
        return;
    }

    $categoryID = $input['categoryID'];

    $stmt = $pdo->prepare("SELECT * FROM products WHERE category_id = :categoryID");
    $stmt->execute(['categoryID' => $categoryID]);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($result);
}
?>
