<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Namu darbas nr. 12</title>
</head>
<body>
    
<?php

require_once 'db.php';
$conn = connectDB();

if (isset($_GET['delete'])) {
    $sql = "DELETE FROM radars WHERE id = " . intval($_GET['delete']);
    $conn->query($sql);
}

$row = []; // Kodel reik tuscio masyvo cia?
if (isset($_GET['edit'])) {
    $sql = "SELECT * FROM radars WHERE id = " . intval($_GET['edit']);
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    }
}

if (isset($_POST['save'])) {
    $date = $_POST['date'];
    $number = $_POST['number'];
    $distance = $_POST['distance'];
    $time = $_POST['time'];
    $id = $_POST['id'];
    if (intval($_POST['id'] > 0)) {
        $sql = $conn->prepare("UPDATE radars SET date = ?, number = ?, distance = ?, time = ? WHERE id = ?");
        $sql->bind_param('ssddd', $date, $number, $distance, $time, $id);
        $sql->execute();
    } else {
        $sql = $conn->prepare("INSERT INTO radars (date, number, distance, time) VALUES (?, ?, ?, ?)");
        $sql->bind_param('ssdd', $date, $number, $distance, $time);
        $sql->execute();
    }
}

?>
<form method = 'post'>
<input type = 'hidden' name = 'id' required value = "<?= isset($row['id']) ? $row['id'] : 0 ?>">
Data: <input type = 'text' name = 'date' placeholder ="MMMM-mm-dd hh:mm:ss" required value = "<?= isset($row['date']) ? $row['date'] : "" ?>"> <br>
Numeris: <input type = 'text' name = 'number' placeholder='XXX000' required value = "<?= isset($row['number']) ? $row['number'] : "" ?>"> <br>
Atstumas: <input type = 'number' name = 'distance' placeholder="Atstumas metrais" required value = "<?= isset($row['distance']) ? $row['distance'] : "" ?>"> <br>
laikas: <input type = 'number' name = 'time' placeholder="Laikas sekundemis" required value = "<?= isset($row['time']) ? $row['time'] : "" ?>"> <br>
<button name="save" type="submit">Issaugoti</button>
<button name="automobiliai" type="submit">Automobiliai</button>
</form>

<?php
if (isset($_GET['offset'])) {
    $offset = $_GET['offset'];
} else {
    $offset = 0;
}

$sql = "SELECT id, date, number, distance, time, distance/time*3.6 AS speed FROM radars ORDER BY date, speed DESC LIMIT 10 OFFSET  $offset";
$result = $conn->query($sql);
?>
<table>
    <tr>
        <th>Nr.</th>
        <th>Id</th>
        <th>Data</th>
        <th>Valstybinis numeris</th>
        <th>Atstumas, m</th>
        <th>Laikas, s</th>
        <th>Greitis, km/h</th>
        <th>Veiksmai</th>
    </tr>
<?php 
if ($result->num_rows > 0) {
    $eilNr = 1;
    while ($row = $result->fetch_assoc()):
?>
    <tr>
        <td><?= $eilNr++ ?></td> <?php //Kodel <?= , o ne <?php ?>
        <td><?= $row['id'] ?></td>    
        <td><?= $row['date'] ?></td>    
        <td><?= $row['number'] ?></td>    
        <td><?= $row['distance'] ?></td>    
        <td><?= $row['time'] ?></td>    
        <td><?= round($row['speed'], 0); ?></td>    
        <td>
        <a href="?edit=<?= $row['id'] ?>"> Taisyti</a> <!-- Kodel uztenka rasyti ?edit=, kaip sugeneruoja visa linka? -->
        <a href="?delete=<?= $row['id'] ?>"> Trinti</a>
        </td>    
    </tr>
<?php endwhile; ?> 
</table>
<a href="?offset=<?= $offset == (0) ? 0 : $offset - 10 ?>" class="previous">&laquo; Atgal</a>
<a href="?offset=<?= $offset + 10 ?>" class="next">Pirmyn &raquo;</a> <!-- Prideti if. jei nere rezultatu nevaizduoti mygtuko  -->
<?php 
} else echo 'Nera duomenu';
?>
<?php
if (isset($_POST['automobiliai'])):
?>
<table>
    <tr>
        <th>Valstybinis numeris</th>
        <th>Irasu kiekis</th>
        <th>Uzfiksuotas maksimalus greitis</th>
    </tr>
<?php 
$sql2 = "SELECT number, COUNT(*) AS kiekis, MAX(distance/time*3.6) AS maxspeed FROM radars ORDER BY number, maxspeed DESC";
$result2 = $conn->query($sql2);
 
if ($result2->num_rows > 0) {
    while ($row = $result2->fetch_assoc()):
?>
    <tr>
        <td><?= $row['number'] ?></td>    
        <td><?= $row['kiekis'] ?></td>    
        <td><?= $row['maxspeed'] ?></td>       
        <td>
        </td>    
    </tr>
<?php endwhile;} endif; ?> 
</table>
</body>
</html>
