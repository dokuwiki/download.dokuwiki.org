<?php

class Template {

    private $src = 'src/dokuwiki';

    private $langnames;

    public function __construct() {
        /* load language names */
        $lines = file(dirname(__FILE__).'/langnames.txt');
        foreach($lines as $line) {
            $line = preg_replace('/#.*$/', '', $line);
            $line = trim($line);
            if($line == '') continue;

            list($code, $name) = preg_split('/\s+/', $line, 2);
            $this->langnames[$code] = $name;
            ksort($this->langnames);
        }
    }

    public function langlist() {
        $dirs = glob($this->src.'/stable/inc/lang/*');
        foreach($dirs as $dir) {
            if(!is_dir($dir)) continue;
            $lang = basename($dir);
            if($lang == 'en') continue; // we add this ourselves

            $name = '';
            if(isset($this->langnames[$lang])) $name = ' - '.$this->langnames[$lang];

            echo '<li><label class="checkbox"><input type="checkbox" name="langs[]" value="'.$lang.'" checked="checked">'.$lang.$name.'</label></li>';
        }
    }

    public function version($name){
        if(file_exists($this->src."/$name/VERSION")) return htmlspecialchars(file_get_contents($this->src."/$name/VERSION"));
        return false;
    }
}