<?php

class Template {

    private $src = '';

    private $langnames;

    public function __construct() {
        $this->src = dirname(__FILE__).'/../src/dokuwiki';

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

            echo '<li><label class="checkbox"><input type="checkbox" name="langs[]" value="'.$lang.'" checked="checked" /> '.$lang.$name.'</label></li>';
        }
    }

    public function version($name) {
        $dir     = $this->src."/$name/";
        $version = false;

        if(@file_exists($dir.'VERSION')) {
            //official release
            $version = trim(file_get_contents($dir.'VERSION'));
        } elseif(is_dir($dir.'.git')) {
            $inventory = $dir.'.git/logs/HEAD';
            if(is_file($inventory)) {
                $sz   = filesize($inventory);
                $seek = max(0, $sz - 2000); // read from back of the file
                $fh   = fopen($inventory, 'rb');
                fseek($fh, $seek);
                $chunk = fread($fh, 2000);
                fclose($fh);
                $chunk = trim($chunk);
                $chunk = @array_pop(explode("\n", $chunk)); //last log line
                $chunk = @array_shift(explode("\t", $chunk)); //strip commit msg
                $chunk = explode(" ", $chunk);
                array_pop($chunk); //strip timezone
                $date = date('Y-m-d', array_pop($chunk));
                if($date) $version = "$date \"snapshot\"";
            }
        }

        if($version) $version = htmlspecialchars($version);
        return $version;
    }

    public function allrealversions() {
        $out      = array();
        $versions = glob($this->src.'/dokuwiki-*', GLOB_ONLYDIR);
        foreach($versions as $version) {
            $version = basename($version);

            $out[$version] = $this->version($version);
        }

        arsort($out);
        return $out;
    }

    public function versionselect($release) {
        $target = '';
        if(is_link($this->src.'/'.$release)) {
            $target = basename(readlink($this->src.'/'.$release));
        }

        foreach($this->allrealversions() as $key => $value) {
            if($key == $target) {
                $sel = 'selected="selected"';
            } else {
                $sel = '';
            }
            echo '<option value="'.htmlspecialchars($key).'" '.$sel.'>';
            echo $value;
            echo '</option>';
        }
    }

    public function archivelist() {
        $files = glob($this->src.'/dokuwiki-*.tgz');
        usort($files, array($this, 'versionsort'));

        echo '<ul>';
        foreach($files as $file) {
            $file = basename($file);

            if(!preg_match('/dokuwiki-(rc)?(\d\d\d\d-\d\d-\d\d)([a-z])?\.tgz/', $file, $m)) continue;

            $name = '<b>'.$m[2].'</b>';
            if($m[1]) {
                $name .= ' release candidate';
            } elseif($m[3]) {
                $name .= ' hotfix '.$m[3];
            } else {
                $name .= ' stable release';
            }

            echo '<li>';
            echo '<a href="src/dokuwiki/'.$file.'">'.$name.'</a>';
            echo '</li>';
        }
        echo '</ul>';

    }

    private function versionsort($a, $b) {
        if(preg_match('/(\d\d\d\d-\d\d-\d\d[a-z]?)/', $a, $m)) {
            $av = $m[1];
        } else {
            $av = 0;
        }
        if(preg_match('/(\d\d\d\d-\d\d-\d\d[a-z]?)/', $b, $m)) {
            $bv = $m[1];
        } else {
            $bv = 0;
        }
        return strcmp($av, $bv) * -1;
    }

    public function globalheader() {
        $inc = dirname(__FILE__).'/../../../wiki/htdocs/lib/tpl/dokuwiki/dwtb.html';
        if(file_exists($inc)) include($inc);
    }
}
