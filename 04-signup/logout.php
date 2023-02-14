<?php 

// On démarre la session 
session_start();

// On efface les données enregistrées en session
// unset($_SESSION['user']);
$_SESSION['user'] = null;

// Message flash
$_SESSION['flash'] = 'Bye bye';

// On ferme la session
// session_destroy();

// redirection
header('Location: index.php');
exit;