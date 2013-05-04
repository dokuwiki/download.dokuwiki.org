<?php
/**
 * simple controller for the downloader
 */

switch($_REQUEST['do']){
    case 'get':
        require('lib/Template.php');
        $TPL = new Template();
        include('views/get.php');
        break;
    case 'download':
        require('lib/Builder.php');
        $builder = new Builder();
        $builder->process();
        break;
    default:
        require('lib/Template.php');
        $TPL = new Template();
        include('views/home.php');
}


