<?php

$dsn = "mysql:host=localhost;dbname=netland";
$user = "root";
$passwd = "";

$pdo = new PDO($dsn, $user, $passwd);
if(isset($_POST['title'])) {
    $awards = boolval($_POST['has_won_awards']);
    $updating_series = $pdo->prepare("INSERT INTO series (title, rating, description, has_won_awards, seasons, country, language) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $updating_series->execute(
        [$_POST['title'], 
        $_POST['rating'], 
        $_POST['description'], 
        $awards, 
        $_POST['seasons'], 
        $_POST['country'], 
        $_POST['language']]
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
textarea[name=description] {
    resize: none;
}
</style>
</head>
<body>
    <main>
        <h1>Welkom op het netland beheerderspaneel</h1>
        <h2>Hier kunt u de data van een nieuwe serie toevoegen:</h2>
        <form method="post">
            <div class='sort'>
                <h2>Titel</h2>
                <input type="text" name="title" placeholder="Titel hier">
            </div>
            <div class='sort'>
                <h2>Rating</h2>
                <input type="text" name="rating" placeholder="Rating hier">
            </div>
            <div class='sort'>
                <h2>Description</h2>
                <textarea rows="15" cols="40"type="text" name="description" placeholder="Beschrijving hier"></textarea>
            </div>
            <div class='sort'>
                <h2>Amount of Awards</h2>
                <input type="number" name="has_won_awards" placeholder="Aantal prijzen hier">
            </div>
            <div class='sort'>
                <h2>Seasons</h2>
                <input type="number" name="seasons" placeholder="Hoeveelheid seizoenen hier">
            </div>
            <div class='sort'>
                <h2>Country of Origin</h2>
                <input type="text" name="country" placeholder="Land van afkomst hier">
            </div>
            <div class='sort'>
                <h2>Language</h2>
                <input type="text" name="language" placeholder="Gesproken taal in serie hier">
            </div>
            <input type="submit" name='submit' value='Add'>
        </form>
    </main>
</body>
</html>