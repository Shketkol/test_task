<?php
require ("ProductController.php");

$test = new ProductController();
var_dump($test->detail(20));
