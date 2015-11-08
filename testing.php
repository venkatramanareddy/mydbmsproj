<html>
<head>
	<title>Hello</title>
</head>
<body>
<h1>
	<?php 
          echo "string";
          $db_hostname = 'localhost';
          $db_username = 'root';
          $db_password = '';
          $db_server = mysql_connect($db_hostname,$db_username,$db_password);
          if(!$db_server) die("Unable to connect to SQL server :" .mysql_error()); 
?>
</h1>
</body>
</html>