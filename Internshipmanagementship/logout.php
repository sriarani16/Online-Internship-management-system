<?php

	session_start();
	ob_start();
session_destroy();
Header("Location: index.php");


?>