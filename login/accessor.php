<!doctype html>
<html>
  <head>
  </head>
  <body>
<?php //Simple login implementation
//I still dont know how to implement it correctly
// commment
if ($_POST["login"] == "admin" && $_POST["password"] == "admin")
{
  echo "access granted";
}
else
{
  echo "access denied";
}
  ?>
  </body>
</html>