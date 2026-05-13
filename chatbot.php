<?php

header("Content-Type: application/json");

$data = json_decode(file_get_contents("php://input"), true);

$message = $data["message"] ?? "";

if(trim($message) === ""){
    echo json_encode([
        "reply" => "Empty message."
    ]);
    exit;
}

$payload = [
    "model" => "llama3",
    "prompt" => $message,
    "stream" => false
];

$ch = curl_init("http://localhost:11434/api/generate");

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Content-Type: application/json"
]);

curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));

$response = curl_exec($ch);

if(curl_errno($ch)){
    echo json_encode([
        "reply" => "Curl Error: " . curl_error($ch)
    ]);
    exit;
}

curl_close($ch);

$result = json_decode($response, true);

echo json_encode([
    "reply" => $result["response"] ?? "No response from AI"
]);

?>