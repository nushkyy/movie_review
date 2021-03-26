<?php
//Smarty for header
require 'libraries/smarty/Smarty.class.php';

$smarty = new Smarty;

$smarty->assign("title_page", $page_title);

$smarty->display('theme/header.tpl');
?>