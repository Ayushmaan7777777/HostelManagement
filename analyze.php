<?php

header("Content-Type: application/json");

$data = json_decode(file_get_contents("php://input"), true);

if (!$data || !isset($data["description"])) {
    echo json_encode([
        "success" => false,
        "error" => "No description received"
    ]);
    exit;
}

$description = $data["description"];

$prompt = "
You are an AI hostel complaint analyzer.

Analyze the complaint and return ONLY valid JSON.

Complaint:
$description

Required JSON format:

{
  \"category\": \"Safety\",
  \"priority\": \"Critical\",
  \"reason\": \"Short explanation\"
}

Rules:
- Output ONLY JSON
- No markdown
- No notes
- No explanation
- No extra text
";

$postData = [
    "model" => "llama3",
    "prompt" => $prompt,
    "stream" => false
];

$ch = curl_init("http://localhost:11434/api/generate");

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));

curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Content-Type: application/json"
]);

$response = curl_exec($ch);

if (curl_errno($ch)) {

    echo json_encode([
        "success" => false,
        "error" => curl_error($ch)
    ]);

    exit;
}

curl_close($ch);

$result = json_decode($response, true);

if (!isset($result["response"])) {

    echo json_encode([
        "success" => false,
        "error" => "No AI response"
    ]);

    exit;
}

$aiText = trim($result["response"]);

preg_match('/\{.*\}/s', $aiText, $matches);

if (!isset($matches[0])) {

    echo json_encode([
        "success" => false,
        "error" => "AI did not return valid JSON",
        "raw" => $aiText
    ]);

    exit;
}

$json = json_decode($matches[0], true);

if (!$json) {

    echo json_encode([
        "success" => false,
        "error" => "JSON parsing failed",
        "raw" => $aiText
    ]);

    exit;
}

echo json_encode([
    "success" => true,
    "category" => $json["category"] ?? "General",
    "priority" => $json["priority"] ?? "Medium",
    "reason" => $json["reason"] ?? "No reason"
]);

?>