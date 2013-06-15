<?php
error_reporting(E_ALL & ~E_NOTICE);

switch($_REQUEST['do']){
    case 'symlink':
        require('../lib/Admin.php');
        $adm = new Admin();
        $adm->dosymlinks();
        break;
    case 'upload':
        require('../lib/Admin.php');
        $adm = new Admin();
        $adm->doupload();
        break;
}


require('../lib/Template.php');
$TPL = new Template();
include('../views/admin.php');