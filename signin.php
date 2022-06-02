<?php
require 'app.php';

if (IS_LOGGED) {
	require 'components/dashboardComponent.php';
}else{
	require 'components/signinComponent.php';
}