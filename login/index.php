<?php 

session_start(); 

?>
<html>
 <head>
  <title>PHP Test</title>
 </head>
 <body>
   <form method="post" action="accessor.php">
     Login<br><input name="login"> <br>
     Password<br><input type="password" name="password"> <br>
     <button type="submit">Login</button>
   </form>
 </body>
 
</html>
