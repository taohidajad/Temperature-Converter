<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Temperature Converter</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Temperature Converter</h1>
        <div class="converter-box">
            <form action="convert.php" method="POST" id="converter-form">
                <input type="number" name="temperature" id="temperature" placeholder="Enter Temperature" required>
                <select name="unit" id="unit">
                    <option value="celsius">Celsius to Fahrenheit</option>
                    <option value="fahrenheit">Fahrenheit to Celsius</option>
                </select>
                <button type="submit">Convert</button>
            </form>
            <div class="result" id="result"></div>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>
