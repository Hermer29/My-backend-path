<?php
	if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
		$uri = 'https://';
	} else {
		$uri = 'http://';
	}
	$uri .= $_SERVER['HTTP_HOST'];
	header('Location: '.$uri.'/main/');
	exit;
?>
Something went wrong :/ 

TRY TO RELOAD

//it work only in apache, idk how to make it work not in apache like there