<?php
  require('vars.php');

  function getPasswordByLogin($login)
  {
    $conn = new mysqli($host, $login, $pass, $dbname);
    if ($conn->connect_error)
    {
      // w przypadku problemu z polaczeniem, wyswietl komunikat z bledem mysql
      die("Connection failed: " . $conn->connect_error); 
    }

    $sql = "SELECT password FROM `users` WHERE `login` = '$login'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0)
    {
      $row = $result->fetch_assoc();
      $json = json_encode($row, JSON_PRETTY_PRINT);
      return $json;
    }
    else
    {
      return "Brak wynikow dla zapytania.";
    }

    $conn->close();
  }

  function checkLoginExists($login)
  {
    $conn = new mysqli($db_host, $db_login, $db_pass, $db_name);
    $exists = 0;
    if ($conn->connect_error)
    {
      // w przypadku problemu z polaczeniem, wyswietl komunikat z bledem mysql
      die("Connection failed: " . $conn->connect_error); 
    }

    $sql = "SELECT * FROM `users` WHERE `login` = '$login'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0)
    {
      $exists = 1;
      return $exists;
    }
    else
    {
      return $exists;
    }
    
    $conn->close();
  }

  $login_textbox = $_POST['login'];
  $password_textbox = $_POST['password'];

  if(checkLoginExists($login_textbox) != '')
  {
    $password_db = getPasswordByLogin($login_textbox);

    if ($password_textbox == $password_db)
    {
      echo 'Użytkownik istnieje i został zalogowany.';
    }
    else 
    {
      echo 'Użytkownik istnieje ale hasło jest niepoprawne.';
    }
  }
  else 
  {
    echo 'Użytkownik nie istnieje.';
  }


?>