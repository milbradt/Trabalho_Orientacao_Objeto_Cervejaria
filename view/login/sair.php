<!DOCTYPE HTML>
<html>
<?php
    $DIR = $_SERVER['DOCUMENT_ROOT'];
    require_once( $DIR ."/controller/geral/ControllerPage.php");
    $page = new Page;
    $page->newPage("sair");
?>
</html>