<?php
include ("compiler.php");

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
        // $tokens;
        $this->fileContent = $this->readFile ($filePass);
        $scanTokens = new Scanner($this->fileContent);
        $tokens = $scanTokens->ScanAllToken();
        // $this->CheckIncludingFiles($tokens);
        // echo "###".$filePass."###";
        // echo "<br>";
        // $this->PrintTokens($tokens);
        return $this->frontEnd($tokens);

    }
    public function PrintTokens($tokens){
        for ( $i = 0 ; $i < sizeof($tokens) ; $i++ ){
          echo $tokens[$i][2]."--------->";
          echo "\"".$tokens[$i][0]."\"";
          echo "------------->";
          echo $tokens[$i][1];
          echo "<br>";
        }
    }

    private function frontEnd($tokens){
        $str = "" ;
        for ( $i = 0 ; $i < sizeof($tokens) ; $i++ ){
          $str .=$tokens[$i][2]."--------->"; 
          $str .="\"".$tokens[$i][0]."\"";
          $str .=$tokens[$i][1];
          $str .="\n";

        }
        return $str;
    }

    private function CheckIncludingFiles ($tokens){
      for ($i = 0 ; $i < sizeof($tokens) ; $i += 2 ){
        if ($tokens[$i][0] == "Include" && $tokens[$i+1][1] == "file"){
          $this->getSCannerForFile($tokens[1][0]);
        }
        else{
          break;
        }
      }
    }

    public function print (){
      return "Eslam";
    }
   
    

}

// $file = new FileHandling();
// $file->getScannerForFile("testFile.txt");



?>
<!--  -->