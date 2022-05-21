<?php declare(strict_types=1);
include("StringHandling.php");
include("TransitionTable.php");

class Scanner{
    
    private $tokenType = array (
        "Else"=>"condition",
        "If"=>"condition",
        "Iow"=>"Integer",
        "Iowf"=>"Float",
        "SIowf"=>"SFloat",
        "Chlo"=>"Character",
        "SIow"=>"SInteger",
        "Chain"=>"String",
        "Worthless"=>"Void",
        "Loopwhen"=>"Loop",
        "Iteratewhen"=>"Loop",
        "Turnback"=>"Return",
        "Loli"=>"Struct",
        "Stop"=>"Break",
        "Include"=>"Inclusion",
        "+" =>"Arithmetic Operation",
        "-" =>"Arithmetic Operation",
        "*" =>"Arithmetic Operation",
        "/"=>"Arithmetic Operation",
        "&&" =>"Logic operators",
        "||" =>"Logic operators",
        "~" =>"Logic operators",
        "=="=> "relational operators",
        "<"=> "relational operators",
        ">"=> "relational operators",
        "!="=> "relational operators",
        "<="=> "relational operators",
        ">=" => "relational operators",
        "="=>"Assignment operator",
        "->"=>"Access Operator",
        "{" => "Braces",
        "}" => "Braces",
        "[" => "Braces",
        "]" => "Braces",
        ")" => "Braces",
        "(" => "Braces",
        "'"=>"Quotation Mark",
        "\""=>"Quotation Mark",
        "$$$"=>"Single Line Comment",
        "/$" => "Multi Line Comment",

    );
    private $scanPointer;
    private $sourceCode;
    private $transitionTable;
    private $lineNumber;
    public function __construct( $sourceCode ){
        $this->scanPointer = 0;
        $this->lineNumber = 1;
        $this->sourceCode = $sourceCode;
        $this->transitionTable = new TransitionTable();
    }



    public function ScanAllToken(){
        $tokenDefinition = array();
        $tokenDefinitionPointer = 0;
        $this->sourceCode .= " ";
        while( $this->scanPointer < StringHandle :: strLength($this->sourceCode) ) {
             $tokenDefinition[$tokenDefinitionPointer++] = $this->scanOneToken();
             $this->voidComment($tokenDefinition[$tokenDefinitionPointer-1][1]);
        }
        return $tokenDefinition;
    }

    private function scanOneToken(){
        $state = 1;
        $token = "";
        $newState = 0;
        $ch = $this->sourceCode[$this->scanPointer];
        while ( $state != 0 &&  ! $this->transitionTable->isAcceptState( $state ) && 
        $this->scanPointer < StringHandle :: strLength($this->sourceCode) ){
            $ch = $this->sourceCode[$this->scanPointer];
            $newState = (int) $this->transitionTable->getNextState( $ch , $state );
            $token .= $this->getNextCharacter( $state  );
            $state = $newState;
        }
        return $this->getTokenType($state , $token);
    }
    
    private function getNextCharacter( $state ){
        $nextCharacter = '';
        $this->checkNewLine();
        if ( $this->isVoidDelimiter ($state) ){
                $this->scanPointer++;
        }else if  (  ! $this->transitionTable->isAcceptState($state)  ){
                $nextCharacter = $this->sourceCode[$this->scanPointer];
                $this->scanPointer++;
        }
        return $nextCharacter; 
    } 

    private function getTokenType ($state  , $token){
        if ( $state == 0 ){ // if state beccame = 0 in any case that mean error state 
                $token = $this->getErrorToken ($token);
                return array ($token,"error","Line: ".$this->lineNumber);
        }
        else if($state == 93 ){
            $token = StringHandle :: deleteLastChar($token);
            return array ($token,"identifier","Line: ".$this->lineNumber);
        }
        else if($state == 95 ){
            $token = StringHandle :: deleteLastChar($token);
            return array ($token,"Constant","Line: ".$this->lineNumber);
        }
        else if($state == 100 ){
            $token = StringHandle :: deleteLastChar($token);
            return array($token,"file","Line: ".$this->lineNumber);
        }
        else if( $state == 1 ){
            return array ("End","End","Line: ".$this->lineNumber);
        }
        else{ // if state not equel 0 that mean accept state
                $token = StringHandle :: deleteLastChar($token);
                return array ($token,$this->tokenType[$token],"Line: ".$this->lineNumber);
        }
    }

    private function getErrorToken ($token){
        /* this function get the rest of the letters becaue token break from loop with correct
        character sequence only
        */
        // take charaters until reach delimiter 
        while( !$this->transitionTable->isDelimiter($this->sourceCode[$this->scanPointer]) ){ 
            $token .= $this->sourceCode[$this->scanPointer];
            $this->scanPointer++;
        }
        $this->scanPointer++;
        return $token;
    }

    private Function checkNewLine(){
        if ($this->sourceCode[$this->scanPointer] == "\n"){
            $this->lineNumber++;
        }
    }

    private function isVoidDelimiter ($state){
        return ($state == 1 &&  
                $this->transitionTable->isDelimiter($this->sourceCode[$this->scanPointer])) ;
    }

    private function voidComment($commentType){
        if($commentType == "Single Line Comment"){
            while ($this->sourceCode[$this->scanPointer] != "\n" ){
                $this->scanPointer++;
            }
            $this->checkNewLine();
            $this->scanPointer++;
        }
        else if ($commentType == "Multi Line Comment") {
            while ( ($this->sourceCode[$this->scanPointer] != "$"
                    && $this->sourceCode[$this->scanPointer+1] != "/" )  ){
                $this->scanPointer++;
                $this->checkNewLine();
            }
            $this->scanPointer += 2;
        }
    }

    

    

    
    // private function IsAcceptState($state){
    //     return $this->transitionTable[ "Accept" ][ $state - 1 ] == 'y';
    // }



    // private function IsDelimiter( $ch ){
    //     return $ch == ' ' || $ch == "\n" || $ch == ';' || $ch == "\t" ;
    // }

   
}


// $test = new Scanner();
// $test->getCh();
// $tokens = $test->ScanAllToken("Lowf fow Low Lowf fow Lowf ");
// $test->getCh(2,"t");
// for ( $i = 0 ; $i < 6 ; $i++ ){
//     echo $tokens[$i][0];
//     echo "---->";
//     echo $tokens[$i][1];
//     echo "<br>";
// }


?>