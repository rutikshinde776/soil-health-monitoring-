<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $message = $_POST['message'] ?? '';
    $temperature = $_POST['temperature'] ?? rand(20, 35);
    $humidity = $_POST['humidity'] ?? rand(30, 90);
    $motor = $_POST['motor'] ?? 'OFF';

    $data = ["status" => $message, "temperature" => $temperature, "humidity" => $humidity, "motor" => $motor];
    file_put_contents("status.json", json_encode($data));
    
    echo "Data Updated Successfully";
    exit;
}

$data = file_exists("status.json") ? file_get_contents("status.json") : json_encode(["status" => "No Data", "temperature" => "--", "humidity" => "--", "motor" => "OFF"]);
header('Content-Type: application/json');
echo $data;
?>
