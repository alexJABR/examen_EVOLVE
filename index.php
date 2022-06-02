<?php
require 'app.php';
require 'views/header.html';

if (IS_LOGGED) {
	require 'components/dashboardComponent.php';
}else{
	require 'components/loginComponent.php';
}
require 'views/footer.html';