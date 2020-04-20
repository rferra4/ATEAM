<!-- load class info called from file contained in lib folder -->
<?php
require_once 'config.php';
function __autoload($class_name){
	require_once '../lib/'.$class_name. '.php';
}
