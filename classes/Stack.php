<?php

class Stack {
    private $stackElements =array ([]);
    private $top = -1;

    public function push ($element){
        $this->stackElements[++$this->top] = $element; 
    }

    public function pop (){
        $this->top--;
    }

    public function topElement (){
        return $this->stackElements[$this->top];
    }

    public function size () {
        return $this->top+1;
    }

    public function clear (){
        $this->top = -1;
    }
    public function print(){
        for ( $i = 0 ; $i <= $this->top ; $i++ ){
            echo $this->stackElements[$i]."-->";
        }
    }

}


?>
