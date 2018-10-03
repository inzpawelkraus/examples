<?php

if (!defined('SCRIPT_CHECK'))
    die('No-Hack here buddy.. ;)');
require_once ROOT_PATH . '/includes/functions.inc.php';


if (NEWSLETTER == 1) {
    require_once ROOT_PATH . '/includes/newsletter.class.php';
    $oNewsletter = new Newsletter($root);

    $oNewsletter->wysliAutomat(10);
}
?>