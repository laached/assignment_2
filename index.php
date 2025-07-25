<?php
$output = "";

if (isset($_GET['a']) && isset($_GET['b']) && isset($_GET['c'])) {
    $a = floatval($_GET['a']);
    $b = floatval($_GET['b']);
    $c = floatval($_GET['c']);

    
    $a_escaped = escapeshellarg($a);
    $b_escaped = escapeshellarg($b);
    $c_escaped = escapeshellarg($c);

    
    $command = "python3 calculate.py $a_escaped $b_escaped $c_escaped";
    $output = shell_exec($command);
}
?>

<!DOCTYPE html>
<html lang="en">>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Python + PHP Calculator</title>
</head>
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
        }
        h1 {
            color: #333;
            text-align: center;
        }
        form {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            width: 300px;
            text-align: center;
        }
        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
            color: #555;
        }
        input[type="number"] {
            width: 90%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            margin-top: 15px;
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .result-box {
            margin-top: 20px;
            background: #fff;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            width: 400px;
            text-align: left;
        }
    </style>
<body>
    <h1>Calculate: b + <span>&#8730;</span><span  style="border-top: 1px solid blue">c<sup>3</sup></span>  / a × 10</h1>

    <form method="get">
        <label for="a">Value of a:</label>
        <input type="number" name="a" id="a" step="any" required><br><br>

        <label for="b">Value of b:</label>
        <input type="number" name="b" id="b" step="any" required><br><br>

        <label for="c">Value of c:</label>
        <input type="number" name="c" id="c" step="any" required><br><br>

        <input type="submit" value="Calculate">
    </form>

    <hr>
    <div>
        <?php echo $output; ?>
    </div>
</body>
</html>
