<?php


$servername = "localhost"; 
$username = "phpmyadmin"; 
$password = "RedesInformaticas"; 
$dbname = "Liga_de_villanos"; 


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nombre = $conn->real_escape_string($_POST['nombre']);
    $email = $conn->real_escape_string($_POST['email']);
    
    
    $contraseña = password_hash($_POST['contraseña'], PASSWORD_DEFAULT);

    
    $sql = "INSERT INTO usuarios (nombre, email, contraseña) VALUES ('$nombre', '$email', '$contraseña')";

    if ($conn->query($sql) === TRUE) {
        echo "¡Nueva cuenta creada exitosamente!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


$conn->close();

?>