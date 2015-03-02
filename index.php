<?php
/**
 * simple controller for the downloader
 */
error_reporting(E_ALL & ~E_NOTICE);

switch($_REQUEST['do']){
    case 'get':
        require('lib/Template.php');
        $TPL = new Template();
        include('views/get.php');
        break;
    case 'archive':
        require('lib/Template.php');
        $TPL = new Template();
        include('views/archive.php');
        break;
    case 'rss':
        require('lib/Template.php');
        $TPL = new Template();
        include('views/rss.php');
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


