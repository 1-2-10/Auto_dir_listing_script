<?php
$DocPath = rtrim($_SERVER['PHP_SELF'], basename($_SERVER['PHP_SELF']));
$noDir = "no folder";
include_once $_SERVER['DOCUMENT_ROOT'] . '/index/pg_prts/head.inc.html';
include_once $_SERVER['DOCUMENT_ROOT'] . '/index/scripts/master-dir-ls.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/index/pg_prts/ftr_inc.html';
?>
