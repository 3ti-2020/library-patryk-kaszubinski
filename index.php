<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
    <div class="left">
    <form action="insert.php" method="POST">
    <input type="text" name="imie">Imie<br>
    <input type="text" name="nazwisko">Nazwisko<br>
    <input type="text" name="tytul">Tytuł<br>
    <input type="text" name="ISBN">ISBN<br>
    <input type="submit" name="POST" value="INSERT">
    </form>
    </div>
    <div class="mid">
    <?php
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="libr";
    
    $conn= new mysqli($servername, $username, $password, $dbname);
    
    $result= $conn->query("SELECT * FROM krzyz, autorzy, tytuly WHERE krzyz.id_tytul = tytuly.id_tytul AND krzyz.id_autor = autorzy.id_autor;");
    echo("<table class='tabelka'>");
    echo("<tr>
        <td>Imie</td>
        <td>Nazwisko</td>
        <td>Tytuł</td> 
        <td>ISBN</td>
        <td>DELETE Autor</td> 
        <td>DELETE Książka</td>
    </tr>");

    while($wiersz = $result->fetch_assoc()){

        echo("<tr>");
        echo("<td>" .$wiersz['imie']. "</td><td>" .$wiersz['nazwisko']. "</td><td>" .$wiersz['tytul']. "</td><td>" .$wiersz['ISBN']. "</td><td>
        <form action='deleteaut.php' method='POST'>
        <input type='hidden' name='autor' value='".$wiersz['id_autor']."'>
        <input type='submit' name='POST' value='DELETE'>
        </form>
    </td><td>
            <form action='delete.php' method='POST'>
            <input type='hidden' name='tytul' value='".$wiersz['id_tytul']."'>
            <input type='submit' name='POST' value='DELETE'>
            </form>
        </td>");
        echo("</tr>");

    }
    echo("</table>");
    ?>
    </div>
    </div>
</body>
</html>