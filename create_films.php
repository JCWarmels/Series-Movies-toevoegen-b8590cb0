<?php

$dsn = "mysql:host=localhost;dbname=netland";
$user = "root";
$passwd = "";

$pdo = new PDO($dsn, $user, $passwd);
if(isset($_POST['titel'])) {
    $updating_series = $pdo->prepare("INSERT INTO films (titel, duur_in_min, omschrijving, datum_van_uitkomst, land_van_uitkomst, trailer_id_youtube) VALUES (?, ?, ?, ?, ?, ?)");
    $updating_series->execute(
        [$_POST['titel'], 
        $_POST['duur_in_min'], 
        $_POST['omschrijving'], 
        $_POST['datum_van_uitkomst'], 
        $_POST['land_van_uitkomst'], 
        $_POST['trailer_id_youtube']]
    );
}
?>

<!DOCTYPE html>
<html>

<head>
<style>
.sort {
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: space-between;
    width: 30%;
    align-self: center;
}
input:not([name=submit]) {
    text-align: center;
    width: 300px;
}
textarea[name=omschrijving] {
    resize: none;
}
</style>
</head>

<body>
    <main>
        <h1>Welkom op het netland beheerderspaneel</h1>
        <h2>Hier kunt u een nieuwe film toevoegen:</h2>
        <form method="post">
            <div class='sort'>
                <h2>Titel</h2>
                <input type="text" name="titel" placeholder="Titel hier">
            </div>
            <div class='sort'>
                <h2>Duration</h2>
                <input type="number" name="duur_in_min" placeholder="Duur hier">
            </div>
            <div class='sort'>
                <h2>Description</h2>
                <textarea rows="15" cols="40"type="text" name="omschrijving" placeholder="Omschrijving hier"></textarea>
            </div>
            <div class='sort'>
                <h2>Release Date</h2>
                <input type="date" name="datum_van_uitkomst" placeholder="Datum van uitkomst hier">
            </div>
            <div class='sort'>
                <h2>Country of Origin</h2>
                <input type="text" name="land_van_uitkomst" placeholder="Land van afkomst hier">
            </div>
            <div class='sort'>
                <h2>Trailer ID for Youtube</h2>
                <input type="text" name="trailer_id_youtube" placeholder="Id of youtube trailer hier">
            </div>
            <input type="submit" name='submit' value='Add'>
        </form>
    </main>
</body>

</html>