<?php
    session_start();
    $host = 'localhost';
    $username = 'root';
    $password = 'qwerty1234';
    $db = 'db_camagru';
    $dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";
    $db_options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
    try {
        $conn = new PDO($dsn, $username, $password, $db_options);
    }
    catch(PDOException $error) {
        echo "Connection Failure: ".$error->getMessage();
        return (-1);
    }
    if (empty($_POST['web_cap'])) {
        $file = file_get_contents($_FILES['insert']['tmp_name']);
        $bfile = base64_encode($file);
        $need = 'data:image/png;base64,';
        $final = $need.$bfile;
    }
    else {
        $final = $_POST['web_cap'];
    }
    $username = $_SESSION['username'];   
    $sql = "INSERT INTO pictures (username, picture, Likes) VALUES ('$username', '$final', '0')";
    echo $sql;
    try {
        $conn->exec($sql);
    }
    catch (PDOException $e) {
        echo "Error: ".$e->getMessage();
    }
    $conn = null;
    return (1);  
    
    //echo $stmt;
    //$stmt->execute(['file'=>$final]);
?>
