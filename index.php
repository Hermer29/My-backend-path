<?php //second week

if(!empty($_SERVER["HTTPS"]) and $_SERVER["HTTPS"] == "on")
{
  $uri = 'https://';
}
else
{
  $uri = 'http://';
}
$uri .= $_SERVER["HTTP_HOST"];
header("Location: ".$uri.'/login/');
exit();

//it work only in apache, idk how to make it work not in apache like there