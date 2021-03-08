<?php
class Shoutcast {
    public function __construct($server, $port){
        error_reporting(0);
        global $config;
        $config['tmpStr']=null;
        $fSock=@fsockopen($server, $port, $errno, $errstr, 5);
        if ($fSock):
            @fwrite($fSock, "GET /7.html HTTP/1.0\r\nUser-Agent: XML Getter (Mozilla Compatible)\r\n\r\n");
            while(!feof($fSock)):$config['tmpStr'].=fgets($fSock,1024);endwhile;
        endif;
        @fclose($fSock);
    }
    public function stats($x){
        global $config;
        $config['strSCR']    =  null;
        $config['blnStats']  =  false;
        $config['stats']     =  array();
        $config['strSCR']    =  $config['tmpStr'];
        if (stristr($config['strSCR'],"HTTP/1.0 200 OK")==FALSE):
            $config['blnStats'] = false;
        else:
            $config['blnStats'] = true;
            preg_match("/(\d+),(\d+),(\d+),(\d+),(\d+),(\d+),(.*)/", $config['strSCR'], $config['stats']);
            array_shift($config['stats']);
        endif;
            return $config['stats'][$x];
    }
    public function listeners(){return $this->stats(0);}
    public function connected(){
        if ($this->stats(1)): return true;
        else: return false;
        endif;
    }
    public function peaklisteners(){return $this->stats(2);}
    public function maxlisteners(){return $this->stats(3);}
    public function uniquelisteners(){return $this->stats(4);}
    public function kpbs(){return $this->stats(5);}
    public function song(){return $this->stats(6);}
}
