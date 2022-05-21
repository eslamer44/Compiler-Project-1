<?php

Class StringHandle{
    public static function strLength ($str){
        $length = 0;
        while ( isset( $str[ $length ] ) ){
            $length++;
        }
        return $length;
    }

    public static function strReplace( $str ,$find , $replace  ){
        $counter = 0;
        while ( $counter < self :: strLength ( $str ) ){
            if ( $str[ $counter ] == $find ){
                $str[ $counter ] =  $replace;
                break;
            }
            $counter++;
        }
        return $str;
    }

    public static function deleteLastChar ( $str ){
        // this function delete last character from accept token because delimiter get with token
        $newString = "";
        $i = 0;
        while ( $i < self :: strLength( $str ) - 1 ) {
            $newString .= $str[$i];
            $i++;
        }
        return $newString;
    }
    public static function splitByDelimiter($str){
        $strArray = array();
        $strPointer = 0;
        $arrayPointer = 0;
        $element = "" ;
        // echo "rr";
        while ( $strPointer < self :: strLength($str)  ){
            $element = "" ;
            while ( ord($str[$strPointer]) != 32  && $strPointer < self :: strLength($str) ){
                $element .=  $str[$strPointer];
                $strPointer++;
                if ($strPointer == self :: strLength($str) ) break;
                // echo $str[$strPointer]."----------->".ord($str[$strPointer])."<br>";
            }
            // echo "ee";
            $strPointer++;
            $strArray[$arrayPointer++] = $element;
        }
        return $strArray;
    }
    
}

?>