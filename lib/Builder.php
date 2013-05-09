<?php
require("Tar.class.php");


class Builder {

    private $files;

    public function __construct() {
        $this->files = array();
    }

    /**
     * Controller
     *
     * Handles input, builds tar, redirects
     */
    public function process() {
        $hash = md5(print_r($_REQUEST, true));
        $tmp  = md5(time().rand());
        $temp = "out/$tmp-dokuwiki-$hash.tgz";
        $file = "out/dokuwiki-$hash.tgz";

        if(!file_exists($file)){
            // add dokuwiki itself
            $version = (string) $_REQUEST['version'];
            $version = $this->dirclean($version);
            $src = realpath("src/dokuwiki/$version");
            if(!is_dir($src)) die('something went wrong');
            $this->addFolder($src);

            // add plugins
            foreach((array) $_REQUEST['plugins'] as $plugin){
                $plugin = $this->dirclean($plugin);
                $src = realpath("src/plugins/$plugin");
                if(!is_dir($src)) continue;
                $this->addFolder($src, '', "lib/plugins/$plugin");
                //FIXME add plugin.data file?
            }

            // remove unwanted languages
            $langs = $_REQUEST['langs'];
            $langs = array_map(array($this, 'dirclean'), $langs);
            $langs[] = 'en';
            $langs = array_unique($langs);
            $langs = array_filter($langs);
            $this->stripLanguages($langs);

            // remove unwanted dirs
            $this->stripUnwanted();

            // on update only, remove same files
            if(!empty($_REQUEST['updateonly'])){
                $this->diffTo(realpath('src/dokuwiki/oldstable'));
            }

            // move into a sub directory
            $this->moveBase('dokuwiki');

            // add USB-Stick Support
            if(!empty($_REQUEST['onastick'])){
                foreach((array) $_REQUEST['onastick'] as $server){
                    $server = $this->dirclean($server);
                    $src = realpath("src/usbstick/$server");
                    if(!is_dir($src)) continue;
                    $this->addFolder($src);
                }

                // make sure we have a single top directory
                $this->moveBase('DokuWikiStick');
            }

            $this->buildTar($temp);
            rename($temp, $file);
        }

        header('Location: index.php?do=get&id='.$hash);
    }

    public function printList() {
        echo '<pre>';
        print_r($this->files);
        echo '</pre>';
    }

    public function dirclean($name){
        return preg_replace('/[^a-z0-9_\-]+/', '', $name);
    }

    /**
     * Add the given Folder
     */
    public function addFolder($base, $dir = '', $prefix='') {
        $dh = opendir("$base/$dir");
        if(!$dh) return;

        while(($file = readdir($dh)) !== false) {
            if($file == '.' || $file == '..') continue;

            if(is_dir("$base/$dir/$file")) {
                $this->addFolder($base, "$dir/$file", $prefix);
            } else {
                $path = str_replace('//', '/', "$base/$dir/$file");
                $as   = ltrim(str_replace('//', '/', "$prefix/$dir/$file"), '/');

                $this->files[$as] = $path;
            }
        }
        closedir($dh);
    }

    /**
     * removes unwanted files
     *
     * like .git and _test dirs
     */
    public function stripUnwanted(){
        $re = '/(^|\/)(\.git|_test|_cs)(\/|$)/';
        $stripfile = preg_grep($re, array_keys($this->files));
        foreach($stripfile as $file) {
            unset($this->files[$file]);
        }
    }

    /**
     * Remove all language files that are not part of the given languages
     */
    public function stripLanguages($langs) {
        $re = '('.join('|', $langs).')';

        $langfiles = preg_grep('#/lang/#', array_keys($this->files));
        $stripfile = preg_grep("#/lang/$re/#", $langfiles, PREG_GREP_INVERT);

        foreach($stripfile as $file) {
            unset($this->files[$file]);
        }
    }

    /**
     * Remove all files that are the same as in the given folder
     */
    public function diffTo($folder) {
        $files = array_keys($this->files);

        foreach($files as $file) {
            if(!$this->isdifferent($this->files[$file], "$folder/$file")) {
                unset($this->files[$file]);
            }
        }
    }

    /**
     * Moves all files into the given subdirectory
     *
     * Need for the Stick version
     */
    public function moveBase($prefix) {
        $new = array();
        foreach($this->files as $key => $val) {
            $new["$prefix/$key"] = $val;
        }
        $this->files = $new;
    }

    /**
     * Create the actual tar file
     *
     * @param $output
     */
    public function buildTar($output) {
        ksort($this->files);
        $tar = new Tar();
        $tar->create($output);
        foreach($this->files as $as => $file) {
            echo $tar->addFile($file, $as);
        }
        $tar->close();
    }

    /**
     * Check if two files are the same
     */
    private function isdifferent($file1, $file2) {
        if(!file_exists($file2)) return true;
        if(filesize($file1) != filesize($file2)) return true;
        if(md5(file_get_contents($file1)) != md5(file_get_contents($file2))) return true;
        return false;
    }
}
