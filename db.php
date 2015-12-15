/*Połączenie z bazą danych*/
  $dbhost = 'localhost:8080';     
  $dblogin = 'Adam';
  $dbpass = 'simvetsouany';
  $dbselect = 'sklep';
  mysql_connect($dbhost,$dblogin,$dbpass);
  mysql_select_db($dbselect) or die("Błąd przy wyborze bazy danych");
  mysql_query("SET CHARACTER SET UTF8");