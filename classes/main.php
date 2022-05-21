<?php
include ("FileHandling.php");
class Main {
    private $file;
    private $scanner;
    public function mianConnection( $textArea  , $file ){
        $output = "";
        $this->file = new FileHandling();
        // echo StringHandle :: strLength($textArea);
        //   echo $textArea;
        //   $this->test($textArea);
        if ( StringHandle :: strLength ($textArea) < 2 ){
            $output = $this->connectionWithFile($file);
        }
        else {
            $output = $this->connectionWithTextArea($textArea);
        }
        return $output;
    }
    private function connectionWithFile ($filePass){
        return $this->file->getScannerForFile($filePass);
    }
    private function connectionWithTextArea($str){
        $this->scanner = new Scanner($str);
        $tokens = $this->scanner->ScanAllToken();
        return $this->frontEnd($tokens);
    }
    
    private function frontEnd($tokens){
        $str = "" ;
        for ( $i = 0 ; $i < sizeof($tokens) ; $i++ ){
          $str .=$tokens[$i][2].":  "; 
          $str .="Token: \"".$tokens[$i][0]."\"        ";
          $str .="Token Type: ".$tokens[$i][1];
          $str .="\n";

        }
        //echo $str;
        return $str;
    }
}

?>