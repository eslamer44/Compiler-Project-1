<?php
class Arrays{

    public static function arraySize ($arr){
        $i = 0;
        while ( isset($arr[$i]) ){
            $i++;
        }
        return $i;
    }
}
?>
