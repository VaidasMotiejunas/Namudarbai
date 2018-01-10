<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Namu darbas nr. 13</title>
</head>
<body>
    
<?php
// Jungiames prie DB
require_once 'db.php';
$conn = connectDB();

// Irasu trinimas
if (isset($_GET['delete'])) {
    $sql = "DELETE FROM radars WHERE id = " . intval($_GET['delete']);
    $conn->query($sql);
}

// Jei paspaudziama taisyti, reiksmes yra suvedamos i forma koregavimui
$row = []; // Kodel reik tuscio masyvo cia?
if (isset($_GET['edit'])) {
    $sql = "SELECT * FROM radars WHERE id = " . intval($_GET['edit']);
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    }
}

// Nauju irasu ivedimas, jei nurodytas id tada redagavimas esamo iraso
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

//Sukuriam filtra
$rez = [];
if (isset($_POST['metaiForSorting'])){
    $filter = "/^\d\d\d\d/s";
    preg_match_all($filter, $_POST['dateForSorting'], $rez);
}

if (isset($_POST['menuoForSorting'])){
    $filter = "/\d\d$/s";
    preg_match_all($filter, $_POST['dateForSorting'], $rez);
}

?>
<!-- Forma duomenu ivedimui ir redagavimui -->
<form method = 'post'>
<input type = 'hidden' name = 'id' required value = "<?= isset($row['id']) ? $row['id'] : 0 ?>">
Data: <input type = 'text' name = 'date' placeholder ="MMMM-mm-dd hh:mm:ss" required value = "<?= isset($row['date']) ? $row['date'] : "" ?>"> <br>
Numeris: <input type = 'text' name = 'number' placeholder='XXX000' required value = "<?= isset($row['number']) ? $row['number'] : "" ?>"> <br>
Atstumas: <input type = 'number' name = 'distance' placeholder="Atstumas metrais" required value = "<?= isset($row['distance']) ? $row['distance'] : "" ?>"> <br>
laikas: <input type = 'number' name = 'time' placeholder="Laikas sekundemis" required value = "<?= isset($row['time']) ? $row['time'] : "" ?>"> <br>
<button name="save" type="submit">Issaugoti</button>
</form>
<!-- Forma duomenu rusiavimui pagal data ir visu auto isvedimui -->
<form method = 'post'>
Duomenu rusiavimas <br>
Data: <input type = 'text' name = 'dateForSorting' placeholder = "MMMM-mm" > <br>
<button name = "metaiForSorting" type = "submit">Metai</button>
<button name = "menuoForSorting" type = "submit">Menuo</button>
<button name="automobiliai" type="submit">Automobiliai</button>
</form>

<?php
// Puslapiavimas
if (isset($_GET['offset'])) {
    $offset = $_GET['offset'];
} else {
    $offset = 0;
}
// Duomenu isvedimas
if ((isset($_POST['metaiForSorting'])) && ($_POST['dateForSorting'] != "")){
    $metai = $rez[0][0];
    $sql = "SELECT COUNT(*) AS kiekis, YEAR(date) AS metai, id, date, number, distance, time, distance/time*3.6 AS speed, MIN(distance/time*3.6) AS minspeed, MAX(distance/time*3.6) AS maxspeed, AVG(distance/time*3.6) AS vidspeed FROM radars GROUP BY id HAVING metai = $metai LIMIT 15 OFFSET $offset";
} elseif ((isset($_POST['menuoForSorting'])) && ($_POST['dateForSorting'] != "")) {
    $menuo = $rez[0][0];
    $sql = "SELECT COUNT(*) AS kiekis, MONTH(date) AS menuo, id, date, number, distance, time, distance/time*3.6 AS speed, MIN(distance/time*3.6) AS minspeed, MAX(distance/time*3.6) AS maxspeed, AVG(distance/time*3.6) AS vidspeed FROM radars GROUP BY id HAVING menuo = $menuo LIMIT 15 OFFSET $offset";
} else
    $sql = "SELECT YEAR(date) AS metai, MONTH(date) AS menuo, id, date, number, distance, time, distance/time*3.6 AS speed FROM radars ORDER BY date, speed DESC LIMIT 15 OFFSET  $offset";
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
                <td><?= $eilNr++ ?></td>
                <td><?= $row['id'] ?></td>    
                <td><?= $row['date'] ?></td>    
                <td><?= $row['number'] ?></td>    
                <td><?= $row['distance'] ?></td>    
                <td><?= $row['time'] ?></td>    
                <td><?= round($row['speed'], 0); ?></td>    
                <td>
                <a href="?edit=<?= $row['id'] ?>"> Taisyti</a>
                <a href="?delete=<?= $row['id'] ?>"> Trinti</a>
                </td>    
            </tr>
         <?php endwhile;?>
</table>
<!-- Mygtukai pgr. lentelei puslapiuoti -->
<a href="?offset=<?= $offset == (0) ? 0 : $offset - 15 ?>" class="previous">&laquo; Atgal</a>
<a href="?offset=<?= $offset + 15 ?>" class="next">Pirmyn &raquo;</a> <!-- Prideti if. jei nere rezultatu nevaizduoti mygtuko. reik sagot sesijoj kokie  metai paduoti  -->
<?php 
} else echo 'Nera duomenu';
?>
<?php if (((isset($_POST['metaiForSorting'])) && ($_POST['dateForSorting'] != "")) ||
                ((isset($_POST['menuoForSorting'])) && ($_POST['dateForSorting'] != ""))) :?>
<table>
    <tr>
        <th>Irasu kiekis</th> 
        <th>Maziausias gretis</th> 
        <th>Didziausias greitis</th> 
        <th>Vidutinis greitis</th>
    </tr>
<?php 
$result = $conn->query($sql);
if ($result->num_rows > 0):
    $kiekis = 0;
    $maxspeed = 0;
    $minspeed = 1000; //greitas sprendimas, kad min speed nebutu 0
    $vidspeed = 0;
    while ($row = $result->fetch_assoc()){
        $kiekis += $row['kiekis'];
        if ($maxspeed < $row['speed']){
            $maxspeed = $row['speed'];
        }
        if ($minspeed > $row['speed']){
            $minspeed = $row['speed'];
        }
        $vidspeed += $row['speed'];
    }
        $vidspeed = $vidspeed / $kiekis; ?>
            <tr>
                <td><?= $kiekis ?></td>    
                <td><?= round($minspeed, 0) ?></td>    
                <td><?= round($maxspeed, 0) ?></td>    
                <td><?= round($vidspeed, 0) ?></td>     
            </tr>
<?php endif; endif;?>
</table>
<?php
// Visu auto isvedimas
if (isset($_POST['automobiliai'])):
?>
<table>
    <tr>
        <th>Valstybinis numeris</th>
        <th>Irasu kiekis</th>
        <th>Uzfiksuotas maksimalus greitis</th>
    </tr>
<?php 
$sql2 = "SELECT DISTINCT number, COUNT(number) AS kiekis, MAX(distance/time*3.6) AS maxspeed FROM radars GROUP BY number";
$result2 = $conn->query($sql2);
 
if ($result2->num_rows > 0) {
    while ($row = $result2->fetch_assoc()):
?>
    <tr>
        <td><?= $row['number'] ?></td>    
        <td><?= $row['kiekis'] ?></td>    
        <td><?= round($row['maxspeed'], 0) ?></td>         
    </tr>
<?php
endwhile;
} 
endif; ?> 
</table>
</body>
</html>