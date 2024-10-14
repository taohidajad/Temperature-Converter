<?php
header('Content-Type: application/json'); // Ensure that the response is JSON

// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$response = array(); // Initialize response array

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['temperature']) && isset($_POST['unit'])) {
        $temperature = $_POST['temperature'];
        $unit = $_POST['unit'];
        
        if (is_numeric($temperature)) {
            if ($unit == 'celsius') {
                $converted = ($temperature * 9/5) + 32; // Celsius to Fahrenheit
                $response = array("result" => $temperature . "°C is equal to " . $converted . "°F");
            } elseif ($unit == 'fahrenheit') {
                $converted = ($temperature - 32) * 5/9; // Fahrenheit to Celsius
                $response = array("result" => $temperature . "°F is equal to " . $converted . "°C");
            } else {
                $response = array("error" => "Invalid unit selected.");
            }
        } else {
            $response = array("error" => "Temperature must be a number.");
        }
    } else {
        $response = array("error" => "Temperature or unit is missing.");
    }
} else {
    $response = array("error" => "Invalid request method.");
}

echo json_encode($response); // Return the response as JSON
?>
