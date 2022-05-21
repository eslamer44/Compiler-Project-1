<?php
include ("compiler.php");
include ("Array.php");
class FileHandling{
   private $scanTokens;
   public $fileContent ;

    private function readFile ($filePass){
        $str = "";
        //  echo $filePass;
        if ( isset($filePass)){
          $myfile = fopen($filePass, "r") or die("Unable to open file!");
          while(!feof($myfile)) {
            $str .= fgets($myfile);
            $str =  Stringhandle :: strReplace( $str , "\r" , ' ');
          }
          fclose($myfile);
        }
        
        return $str;
    }

    public function getScannerForFile($filePass){
        $output = "";
        $this->fileContent = $this->readFile ($filePass);
        $scanTokens = new Scanner($this->fileContent);
        $tokens = $scanTokens->ScanAllToken();
        $output .= $this->CheckIncludingFiles($tokens);
        $output .= "###".$filePass."###\n";
        $output .=$this->frontEnd($tokens);
        return $output;

    }
    

    private function frontEnd($tokens){
        $str = "" ;
        for ( $i = 0 ; $i < Arrays :: arraySize($tokens) ; $i++ ){
          $str .=$tokens[$i][2].":    "; 
          $str .="Token: \"".$tokens[$i][0]."\"            ";
          $str .="Token Type: ".$tokens[$i][1];
          $str .="\n";

        }
        return $str;
    }

    private function CheckIncludingFiles ($tokens){
      $output = "";
      for ($i = 0 ; $i <  Arrays :: arraySize($tokens) ; $i++ ){
        if ( $tokens[$i][1] == "file"){
          $output .= $this->getSCannerForFile($tokens[1][0]);
        }
      }
      return $output;
    }

    

}

// $file = new FileHandling();
// $file->getScannerForFile("testFile.txt");



?>
<!--  -->