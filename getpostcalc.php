<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP GET & POST Calculator</title>
    <style>
        body { font-family: sans-serif; max-width: 600px; margin: 40px auto; line-height: 1.6; }
        form { border: 1px solid #ddd; padding: 20px; margin-bottom: 20px; border-radius: 5px; }
        input, select, button { padding: 10px; margin: 5px; font-size: 1em; }
        h2 { color: #333; }
        .result { background-color: #eaf7ea; border: 1px solid #c7e8c7; padding: 15px; border-radius: 5px; margin-top: 20px; }
    </style>
</head>
<body>

    <h2>Calculator using POST Method</h2>
    <p>Data is sent in the HTTP request body (not visible in the URL).</p>
    <form action="getpostcalc.php" method="post">
        <input type="number" name="num1" placeholder="First Number" required>
        <select name="operator">
            <option value="add">+</option>
            <option value="sub">-</option>
            <option value="mul">*</option>
        </select>
        <input type="number" name="num2" placeholder="Second Number" required>
        <button type="submit" name="submit">Calculate</button>
    </form>

    <hr>

    <h2>Calculator using GET Method</h2>
    <p>Data is sent in the URL (visible in the address bar).</p>
    <form action="getpostcalc.php" method="get">
        <input type="number" name="num1" placeholder="First Number" required>
        <select name="operator">
            <option value="add">+</option>
            <option value="sub">-</option>
            <option value="mul">*</option>
        </select>
        <input type="number" name="num2" placeholder="Second Number" required>
        <button type="submit" name="submit">Calculate</button>
    </form>

    <?php
    
    if (isset($_REQUEST['submit'])) {

        
        $method = $_SERVER['REQUEST_METHOD'];

        if ($method == 'POST') {
            $num1 = $_POST['num1'];
            $num2 = $_POST['num2'];
            $operator = $_POST['operator'];
        } else { // The method is GET
            $num1 = $_GET['num1'];
            $num2 = $_GET['num2'];
            $operator = $_GET['operator'];
        }

        $result = '';

        
        if (is_numeric($num1) && is_numeric($num2)) {
            
            switch ($operator) {
                case "add":
                    $result = $num1 + $num2;
                    break;
                case "sub":
                    $result = $num1 - $num2;
                    break;
                case "mul":
                    $result = $num1 * $num2;
                    break;
                default:
                    $result = "ERROR: Invalid operator!";
            }
            
            echo "<div class='result'>";
            echo "<h3>Calculation Result (Using $method)</h3>";
            echo "<p>The result is: <strong>$result</strong></p>";
            echo "</div>";

        } else {
            
            echo "<div class='result' style='background-color:#f8d7da; border-color:#f5c6cb;'>";
            echo "<h3>Error</h3>";
            echo "<p>Please enter valid numbers.</p>";
            echo "</div>";
        }
    }
    ?>

</body>
</html>