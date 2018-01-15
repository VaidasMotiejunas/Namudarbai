<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="UTF-8">
    <title>Namu darbas nr. 14</title>
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

// Jei paspaudziama taisyti, issiunciama uzklausa i DB, kad gautume pasirinkto iraso duomenis
$row = [];
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

//Susiejame radars ir drivers lenteles DB pagal driverId
if (isset($_POST['susieti'])) {
    $plateNumber = $_POST['plateNumber'];
    $driverName = $_POST['driver'];
    //Surandam vairuotojui priskirta id
    $sql = "SELECT driverId FROM drivers WHERE name = '$driverName'";
    $result = $conn->query($sql);
    $driverId = $result->fetch_assoc();
    $driverIdResult = (int)$driverId['driverId'];
    //Vairuotojo id priskiriame irasui radaru lenteleje
    $sql = ("UPDATE radars SET driverId = $driverIdResult WHERE number = '$plateNumber' ");
    $conn->query($sql);
}

//Ivedami nauji irasai i drivers lentele
if (isset($_POST['saveDriver'])) {
    if ($_POST['driverName'] == "" || $_POST['cityName'] == "" ) {
        echo "Norint ivesti nauja vairuotoja butina uzpildyti abu laukelius";
    } else {
    $driverName = $_POST['driverName'];
    $cityName = $_POST['cityName'];
    $sql = $conn->prepare("INSERT INTO drivers (name, city) VALUES (?, ?)");
    $sql->bind_param('ss', $driverName, $cityName);
    $sql->execute();
    }
}

?>
<!-- Forma duomenu ivedimui ir redagavimui -->
<div class="ivedimasRadars">
<form method = 'post'>
Radaro duomenu ivedimas <br>
<input type = 'hidden' name = 'id' required value = "<?= isset($row['id']) ? $row['id'] : 0 ?>">
Data: <input type = 'text' name = 'date' placeholder ="MMMM-mm-dd hh:mm:ss" required value = "<?= isset($row['date']) ? $row['date'] : "" ?>"> <br>
Numeris: <input type = 'text' name = 'number' placeholder='XXX000' required value = "<?= isset($row['number']) ? $row['number'] : "" ?>"> <br>
Atstumas: <input type = 'number' name = 'distance' placeholder="Atstumas metrais" required value = "<?= isset($row['distance']) ? $row['distance'] : "" ?>"> <br>
laikas: <input type = 'number' name = 'time' placeholder="Laikas sekundemis" required value = "<?= isset($row['time']) ? $row['time'] : "" ?>"> <br>
<button name="save" type="submit">Issaugoti</button>
</form>
</div>

<!-- Forma duomenu rusiavimui pagal data ir visu auto isvedimui -->
<div class="rusiavimas">
<form method = 'post'>
Duomenu rusiavimas <br>
Data: <input type = 'text' name = 'dateForSorting' placeholder = "MMMM-mm" > <br>
<button name = "metaiForSorting" type = "submit">Metai</button>
<button name = "menuoForSorting" type = "submit">Menuo</button>
<button name="automobiliai" type="submit">Automobiliai</button>
</form>
</div>

<!-- Forma duomenu ivedimui ir redagavimui -->
<div class="ivedimasDrivers">
<form method = 'post'>
Vairuotojo duomenu ivedimas <br>
Vardas Pavarde: <input type = 'text' name = 'driverName' placeholder ="Vardenis Pavardenis"> <br>
Miestas: <input type = 'text' name = 'cityName' placeholder='Miesto pavadinimas'> <br>
<button name="saveDriver" type="submit">Issaugoti</button>
</form>
</div>

<!-- Forma duomenim susieti -->
<?php
// Uzklausos drop down meniu
$sqlRadarEvents = "SELECT DISTINCT number FROM radars ORDER BY number ASC";
$resultRadarEvents = $conn->query($sqlRadarEvents);
$sqlDrivers = "SELECT DISTINCT name FROM drivers ORDER BY name ASC";
$resultDrivers = $conn->query($sqlDrivers);
?>
<div class="susiejimas">
<form method = 'post'>
Duomenu susiejimas <br>
<select name = 'plateNumber'> <br>
    <?php
    if ($resultRadarEvents->num_rows > 0){
        while ($row = $resultRadarEvents->fetch_assoc()){
    ?>
    <option value = "<?=$row['number']?>"><?=$row['number']?></option>
        <?php }} ?>
</select>
<select name = 'driver'> <br>
<?php
    if ($resultDrivers->num_rows > 0){
        while ($row = $resultDrivers->fetch_assoc()){
    ?>
    <option value = "<?=$row['name']?>"><?=$row['name']?></option>
        <?php }} ?>
</select>
<button name="susieti" type="submit">Susieti duomenis</button>
</form>
</div>

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
    $sql = "SELECT COUNT(*) AS kiekis, YEAR(date) AS metai, id, date, number, distance, time, distance/time*3.6 AS speed, MIN(distance/time*3.6) AS minspeed, MAX(distance/time*3.6) AS maxspeed, AVG(distance/time*3.6) AS vidspeed, name, city
     FROM radars r LEFT JOIN drivers d ON r.driverId = d.driverId GROUP BY id HAVING metai = $metai";
} elseif ((isset($_POST['menuoForSorting'])) && ($_POST['dateForSorting'] != "")) {
    $menuo = $rez[0][0];
    $sql = "SELECT COUNT(*) AS kiekis, MONTH(date) AS menuo, id, date, number, distance, time, distance/time*3.6 AS speed, MIN(distance/time*3.6) AS minspeed, MAX(distance/time*3.6) AS maxspeed, AVG(distance/time*3.6) AS vidspeed, name, city 
    FROM radars r LEFT JOIN drivers d ON r.driverId = d.driverId GROUP BY id HAVING menuo = $menuo";
} else
    $sql = "SELECT id, date, number, distance, time, distance/time*3.6 AS speed, name, city
    FROM radars r LEFT JOIN drivers d ON r.driverId = d.driverId ORDER BY date, speed DESC LIMIT 15 OFFSET  $offset";
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
        <th>Vardas, pavarde</th>
        <th>miestas</th>
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
                <a class="mygtukas2" href="?edit=<?= $row['id'] ?>"> Taisyti</a>
                <a class="mygtukas2" href="?delete=<?= $row['id'] ?>"> Trinti</a>
                </td>
                <td><?= $row['name'] ?></td>
                <td><?= $row['city'] ?></td>
            </tr>
         <?php endwhile;?>
</table>
<!-- Mygtukai pgr. lentelei puslapiuoti -->
<a class="mygtukas" href="?offset=<?= $offset == (0) ? 0 : $offset - 15 ?>" class="previous">&laquo; Atgal</a>
<a class="mygtukas" href="?offset=<?= $offset + 15 ?>" class="next">Pirmyn &raquo;</a> <!-- Prideti if. jei nere rezultatu nevaizduoti mygtuko. reik sagot sesijoj kokie  metai paduoti  -->
<?php 
} else {echo "Nera duomenu <br>";
?>
<a class="mygtukas" href="?offset=<?= $offset == (0) ? 0 : $offset - 15 ?>" class="previous">&laquo; Atgal</a>
<?php } if (((isset($_POST['metaiForSorting'])) && ($_POST['dateForSorting'] != "")) ||
                ((isset($_POST['menuoForSorting'])) && ($_POST['dateForSorting'] != ""))) :?>
<!-- Jei ijungtas rusiavimas isvedama lentele su rezultatu statistika -->
<table id="autoStatistika">
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
    $minspeed = 1000000; //greitas sprendimas, kad min speed nebutu 0
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
<?php $conn->close(); ?>
</body>
</html>