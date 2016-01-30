<?php
@session_start();

@require_once "../util/Template.class.php";
$tpl = new Template("html/template.html");

$tpl->JQ_VERSION = "-1.11.3.min";
?>