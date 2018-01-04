<?php
$servername = "localhost";
$username = "Auto";
$password = "LabaiSlaptas123";
$dbname = "nd11";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT date, number, distance/time*3.6 as speed FROM `radars` ORDER BY date, speed, number ASC LIMIT 10, 10";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<style>
    a {
    text-decoration: none;
    display: inline-block;
    padding: 8px 16px;
    }

    a:hover {
        background-color: #ddd;
        color: black;
    }

    .previous {
        background-color: #4CAF50;
        color: white;
    }

    .next {
        background-color: #f1f1f1;
        color: black;
    }
    #radar {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
        }
    
        #radar td, #radar th {
            border: 1px solid #ddd;
            padding: 8px;
        }
    
        #radar tr:nth-child(even){background-color: #f2f2f2;}
    
        #radar tr:hover {background-color: #ddd;}
    
        #radar th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4CAF50;
            color: white;
        }
</style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table id = "radar">
    <thead>
    <tr>
        <td>Date</td>
        <td>Plate Number</td>
        <td>Speed</td>
    </tr>
    </thead>
    <tbody>
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $speed = round($row['speed'], 0);
            echo "<tr>
                <td>{$row['date']}</td>
                <td>{$row['number']}</td>
                <td>$speed</td>
            </tr>";
        }
    } else {
        echo "0 results";
    }
    $conn->close();
    ?>
    </tbody>
    </table>
    <a href="nd11psl1.php" class="previous">&laquo; Atgal</a>
    <a href="#" class="next">Pirmyn &raquo;</a>
</body>
</html>