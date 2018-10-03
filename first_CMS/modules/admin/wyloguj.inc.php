<?php

if(!defined('SCRIPT_CHECK')) die('No-Hack here buddy.. ;)');

$oUsers -> LogOut();

header('Location: ./index.php');
die;
?>