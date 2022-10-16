<?php

use App\Support\DB;


if($_SERVER['REQUEST_METHOD'] == 'GET')
{
    exit(json_encode(['success' => false, 'message' => 'Permission denied']));
}

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    include_once __DIR__ . '/../bootstrap/index.php';

    $params = json_decode(file_get_contents('php://input'));
    if(!$params->role || !preg_match('/^[a-zA-Z]/', $params->role))
    {
        exit(json_encode([
            'success' => false,
            'message' => 'Oops! an error, insert an invalid role value.',
        ]));
    }

    $roles = [
        'administrative' => 'administratives',
        'student' => 'students',
        'teacher' => 'teachers',
    ];

    $conn = DB::connect();
    $stmt = $conn->prepare("SELECT " . reportFields('administrative') . " FROM " . $roles[$params->role]);
    $stmt->execute();

    $response = $stmt->fetchAll(PDO::FETCH_OBJ);
    $response = json_encode($response);
    exit(json_encode([
        'success' => true,
        'message' => 'POST request is ready',
        'role' => $roles[$params->role],
        'users' => $response
    ]));
}
