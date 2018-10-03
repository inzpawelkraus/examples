<?php

require_once ROOT_PATH . '/includes/newsletter.class.php';

$oNewsletter = new Newsletter($root);

$uid = isset($_GET['params'][0]) ? $_GET['params'][0] : '';

if (!empty($uid)) {
    $oNewsletter->_countOdebrano($uid);
} else {
    $oNewsletter->_countClik($_GET['id']);
    header('Location: ' . BASE_URL . '/main.html');
}
?>