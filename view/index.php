<?php

@require_once "startTemplate.php";


$tpl->addFile("PAGE_CONTENT", "html/index.html");
$tpl->addFile("SCRIPT", "html/indexScript.html");


$tpl->PAGE_TITLE = "Welcome to ScupTel Calculator";

$tpl->show();
?>
