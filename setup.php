<?php
//automatically configure db
  try {
    $conn = new PDO("mysql:host=localhost", "root", "123456");
    $conn->setAttribute(PDO::ERRMODE_EXCEPTION);
  }

  catch(PDOException $error) {
    echo 'Connection Failed: ' . $error->getMessage();
  }

  $conn->exec("CREATE DATABASE camagru");
  $conn->exec("USE camagru");
  $conn->exec("CREATE TABLE users (
          id INT PRIMARY KEY AUTO_INCREMENT,
          username VARCHAR(225) UNIQUE,
          email VARCHAR(255) UNIQUE,
          password VARCHAR(255) UNIQUE,
          code INT,
          reg_date TIMESTAMP NOT NULL,
          isVerified INT(1) DEFAULT 0)"
  );
  $conn->exec("CREATE TABLE images (
          id INT(255) PRIMARY KEY AUTO_INCREMENT,
          username VARCHAR(255) NOT NULL,
          picProfile VARCHAR(255) NOT NULL,
          likes INT DEFAULT 0)"
  );

  header('Location: login.php');
?>

