<?php

class Admin {

    private $src = '';
    private $out = '';

    function __construct(){
        $this->src = dirname(__FILE__).'/../src/dokuwiki';
        $this->out = dirname(__FILE__).'/../out';
    }

    function dosymlinks(){
        foreach(array('rc', 'stable', 'oldstable') as $release){
            @unlink($this->src.'/'.$release);
            @unlink($this->src.'/dokuwiki-'.$release.'.tgz');

            if($_REQUEST[$release]){
                $target = $_REQUEST[$release];
                $target = preg_replace('/[^a-z0-9\-]+/','', $target);

                if(preg_match('/^dokuwiki-/', $target)){
                    symlink($target, $this->src.'/'.$release);
                    symlink("$target.tgz", $this->src."/dokuwiki-$release.tgz");
                }

                // clean cache
                $cache = glob($this->out.'/*.tgz');
                foreach($cache as $cf){
                    @unlink($cf);
                }
            }
        }
    }

    function doupload(){
        if(!isset($_FILES['file']) || !$_FILES['file']['name']){
            $this->error('No file given');
            return;
        }

        $file = $_FILES['file'];

        if($file['error']){
            $this->error('Upload error '.$file['error']);
            return;
        }

        if(!preg_match('/^(dokuwiki-([a-z0-9]+)-([0-9]+)-([a-z0-9]+))\.tgz$/', $file['name'], $matches)){
            $this->error('File is not named correctly for a DokuWiki release (dokuwiki-&lt;version&gt;.tgz)');
            return;
        }
        $release = $matches[1];

        if(file_exists($this->src.'/'.$file['name'])){
            $this->error('This file already exists on the server');
            return;
        }

        require_once(dirname(__FILE__).'/Tar.class.php');
        try {
            $tar = new Tar();
            $tar->open($file['tmp_name'], Tar::COMPRESS_GZIP);
            $content = $tar->contents();

            $firstfile = array_shift($content);
            if(!strpos($firstfile['filename'], $release) === 0){
                $this->error('Tar seems not to contain a top directory named '.htmlspecialchars($release));
                return;
            }

            if(!move_uploaded_file($file['tmp_name'], $this->src.'/'.$file['name'])){
                $this->error('Failed to move tar to destination');
                return;
            }

            $tar = new Tar();
            $tar->open($this->src.'/'.$file['name']);
            $tar->extract($this->src.'/');

            $this->success('Release '.htmlspecialchars($release).' successfully uploaded and extracted.');
        } catch (Exception $e){
            $this->error('Had an exception: '.$e->getMessage());
        }
    }

    function success($err){
        echo '<div class="alert alert-success">'.$err.'</div>';
    }

    function error($err){
        echo '<div class="alert alert-error">'.$err.'</div>';
    }
}