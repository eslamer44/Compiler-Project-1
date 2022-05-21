<?php
include ("Stack.php");
include("StringHandling.php");
include ("Array.php");
class parser {
    public $parsingTable  = array (
        "program" => array("SIow"=>"declaration-list" , "Iow"=>"declaration-list" , "Iowf"=>"declaration-list" , "SIowf"=>"declaration-list" , "Chain"=>"declaration-list" , "Chlo"=>"declaration-list" , "Worthless"=>"declaration-list" , "Include"=>"include_command" , "/$"=>"comment" , "$$$"=>"comment" , "*"=>"" , "/"=>"" , "+"=>"" , "-"=>"" , "str"=>"" , "=="=>""  , "!="=>"" , "<"=>"" , ">"=>"" , "<="=>"" , ">="=>"" , ";"=>"" , "," => "" , ")"=>"" , "("=>""  , "Loopwhen"=>"" , "Iteratewhen"=>"" , "Stop"=>"" , "Turnback"=>"" , "If"=>"" , "||" =>"" , "Int_NUM"=> "" , "Float_NUM"=>"" , "{"=>"" , "identifier"=> "" , "&&" => "" , "$" => "" , "else"=>"" , "=" => ""),
        "declaration-list" => array( "SIow"=>"declaration declaration-list_1" , "Iow"=>"declaration declaration-list_1" , "Iowf"=>"declaration declaration-list_1" , "SIowf"=>"declaration declaration-list_1" , "Chain"=>"declaration declaration-list_1" , "Chlo"=>"declaration declaration-list_1" , "Worthless"=>"declaration declaration-list_1" , "Include"=>"" , "/$"=>"" , "$$$"=>"" , "*"=>"" , "/"=>"" , "+"=>"" , "-"=>"" , "str"=>"" , "=="=>""  , "!="=>"" , "<"=>"" , ">"=>"" , "<="=>"" , ">="=>"" , ";"=>"" , "," => "" , ")"=>"" , "("=>""  , "Loopwhen"=>"" , "Iteratewhen"=>"" , "Stop"=>"" , "Turnback"=>"" , "If"=>"" , "||" =>"" , "Int_NUM"=> "" , "Float_NUM"=>"" , "{"=>"" , "identifier"=> "" , "&&" => "" , "$" => "" ,"else"=>"" , "=" => ""),
        "declaration-list_1" => array( "SIow"=>"declaration declaration-list_1" , "Iow"=>"declaration declaration-list_1" , "Iowf"=>"declaration declaration-list_1" , "SIowf"=>"declaration declaration-list_1" , "Chain"=>"declaration declaration-list_1" , "Chlo"=>"declaration declaration-list_1" , "Worthless"=>"declaration declaration-list_1" , "Include"=>"" , "/$"=>"" , "$$$"=>"" , "*"=>"" , "/"=>"" , "+"=>"" , "-"=>"" , "str"=>"" , "=="=>""  , "!="=>"" , "<"=>"" , ">"=>"" , "<="=>"" , ">="=>"" , ";"=>"" , "," => "" , ")"=>"" , "("=>""  , "Loopwhen"=>"" , "Iteratewhen"=>"" , "Stop"=>"" , "Turnback"=>"" , "If"=>"" , "||" =>"" , "Int_NUM"=> "" , "Float_NUM"=>"" , "{"=>"" , "identifier"=> "" , "&&" => "" , "$" => "0" ,"else"=>"" , "=" => ""),                    
        "declaration" => array( "SIow"=>"fun-declaration" , "Iow"=>"fun-declaration" , "Iowf"=>"fun-declaration" , "SIowf"=>"fun-declaration" , "Chain"=>"fun-declaration" , "Chlo"=>"fun-declaration" , "Worthless"=>"fun-declaration" , "Include"=>"" , "/$"=>"" , "$$$"=>"" , "*"=>"" , "/"=>"" , "+"=>"" , "-"=>"" , "str"=>"" , "=="=>""  , "!="=>"" , "<"=>"" , ">"=>"" , "<="=>"" , ">="=>"" , ";"=>"" , "," => "" , ")"=>"" , "("=>""  , "Loopwhen"=>"" , "Iteratewhen"=>"" , "Stop"=>"" , "Turnback"=>"" , "If"=>"" , "||" =>"" , "Int_NUM"=> "" , "Float_NUM"=>"" , "{"=>"" , "identifier"=> "" , "&&" => "" , "$" => "" , "else" => "" , "="=>""),
        "var-declaration" => array( "SIow"=>"type-specifier identifier ;" , "Iow"=>"type-specifier identifier ;" , "Iowf"=>"type-specifier identifier ;" , "SIowf"=>"type-specifier identifier ;" , "Chain"=>"type-specifier identifier ;" , "Chlo"=>"type-specifier identifier ;" , "Worthless"=>"type-specifier identifier;" , "Include"=>"" , "/$"=>"" , "$$$"=>"" , "*"=>"" , "/"=>"" , "+"=>"" , "-"=>"" , "str"=>"" , "=="=>""  , "!="=>"" , "<"=>"" , ">"=>"" , "<="=>"" , ">="=>"" , ";"=>"" , "," => "" , ")"=>"" , "("=>""  , "Loopwhen"=>"" , "Iteratewhen"=>"" , "Stop"=>"" , "Turnback"=>"" , "If"=>"" , "||" =>"" , "Int_NUM"=> "" , "Float_NUM"=>"" , "{"=>"" , "identifier"=> "" , "&&" => "" , "$" => "" ,"else"=>"" , "=" => ""),
        "type-specifier" => array( "SIow"=>"SIow" , "Iow"=>"Iow" , "Iowf"=>"Iowf" , "SIowf"=>"SIowf" , "Chain"=>"Chain" , "Chlo"=>"Chlo" , "Worthless"=>"Worthless" , "Include"=>"" , "/$"=>"" , "$$$"=>"" , "*"=>"" , "/"=>"" , "+"=>"" , "-"=>"" , "str"=>"" , "=="=>""  , "!="=>"" , "<"=>"" , ">"=>"" , "<="=>"" , ">="=>"" , ";"=>"" , "," => "" , ")"=>"" , "("=>""  , "Loopwhen"=>"" , "Iteratewhen"=>"" , "Stop"=>"" , "Turnback"=>"" , "If"=>"" , "||" =>"" , "Int_NUM"=> "" , "Float_NUM"=>"" , "{"=>"" , "identifier"=> "" , "&&" => "" , "$" => "", "else" => "", "="=>""),
        "fun-declaration" => array( "SIow"=>"type-specifier identifier ( params ) compound-stmt" , "Iow"=>"type-specifier identifier ( params ) compound-stmt" , "Iowf"=>"type-specifier identifier ( params ) compound-stmt" , "SIowf"=>"type-specifier identifier ( params ) compound-stmt" , "Chain"=>"type-specifier identifier ( params ) compound-stmt" , "Chlo"=>"type-specifier identifier ( params ) compound-stmt" , "Worthless"=>"type-specifier identifier ( params ) compound-stmt" , "Include"=>"" , "/$"=>"" , "$$$"=>"" , "*"=>"" , "/"=>"" , "+"=>"" , "-"=>"" , "str"=>"" , "=="=>""  , "!="=>"" , "<"=>"" , ">"=>"" , "<="=>"" , ">="=>"" , ";"=>"" , "," => "" , ")"=>"" , "("=>""  , "Loopwhen"=>"" , "Iteratewhen"=>"" , "Stop"=>"" , "Turnback"=>"" , "If"=>"" , "||" =>"" , "Int_NUM"=> "" , "Float_NUM"=>"" , "{"=>"" , "identifier"=> "" , "&&" => "" , "$" => "","else"=>"" , "=" => ""),
        "params" => array( "SIow"=>"param-list" , "Iow"=>"param-list" , "Iowf"=>"param-list" , "SIowf"=>"param-list" , "Chain"=>"param-list" , "Chlo"=>"param-list" , "Worthless"=>"Worthless" , "Include"=>"" , "/$"=>"" , "$$$"=>"" , "*"=>"" , "/"=>"" , "+"=>"" , "-"=>"" , "str"=>"" , "=="=>""  , "!="=>"" , "<"=>"" , ">"=>"" , "<="=>"" , ">="=>"" , ";"=>"" , "," => "" , ")"=>"0" , "("=>""  , "Loopwhen"=>"" , "Iteratewhen"=>"" , "Stop"=>"" , "Turnback"=>"" , "If"=>"" , "||" =>"" , "Int_NUM"=> "" , "Float_NUM"=>"" , "{"=>"" , "identifier"=> "" , "&&" => "" , "$" => "0","else"=>"" , "=" => ""),
        "param-list" => array( "SIow"=>"param param-list_1" , "Iow"=>"param param-list_1" , "Iowf"=>"param param-list_1" , "SIowf"=>"param param-list_1" , "Chain"=>"param param-list_1" , "Chlo"=>"param param-list_1" , "Worthless"=>"param param-list_1" , "Include"=>"" , "/$"=>"" , "$$$"=>"" , "*"=>"" , "/"=>"" , "+"=>"" , "-"=>"" , "str"=>"" , "=="=>""  , "!="=>"" , "<"=>"" , ">"=>"" , "<="=>"" , ">="=>"" , ";"=>"" , "," => "" , ")"=>"" , "("=>""  , "Loopwhen"=>"" , "Iteratewhen"=>"" , "Stop"=>"" , "Turnback"=>"" , "If"=>"" , "||" =>"" , "Int_NUM"=> "" , "Float_NUM"=>"" , "{"=>"" , "identifier"=> "" , "&&" => "" , "$" => "" ,"else"=>"" , "=" => ""),
        "param-list_1" => array( "SIow"=>"" , "Iow"=>"" , "Iowf"=>"" , "SIowf"=>"" , "Chain"=>"" , "Chlo"=>"" , "Worthless"=>"" , "Include"=>"" , "/$"=>"" , "$$$"=>"" , "*"=>"" , "/"=>"" , "+"=>"" , "-"=>"" , "str"=>"" , "=="=>""  , "!="=>"" , "<"=>"" , ">"=>"" , "<="=>"" , ">="=>"" , ";"=>"" , "," => ", param paramlist_1" , ")"=>"" , "("=>""  , "Loopwhen"=>"" , "Iteratewhen"=>"" , "Stop"=>"" , "Turnback"=>"" , "If"=>"" , "||" =>"" , "Int_NUM"=> "" , "Float_NUM"=>"" , "{"=>"" , "identifier"=> "" , "&&" => "" , "$" => "0","else"=>"" , "=" => ""),
        "param" => array( "SIow"=>"type-specifier identifier" , "Iow"=>"type-specifier identifier" , "Iowf"=>"type-specifier identifier" , "SIowf"=>"type-specifier identifier" , "Chain"=>"type-specifier identifier" , "Chlo"=>"type-specifier identifier" , "Worthless"=>"type-specifier identifier" , "Include"=>"" , "/$"=>"" , "$$$"=>"" , "*"=>"" , "/"=>"" , "+"=>"" , "-"=>"" , "str"=>"" , "=="=>""  , "!="=>"" , "<"=>"" , ">"=>"" , "<="=>"" , ">="=>"" , ";"=>"" , "," => "" , ")"=>"" , "("=>""  , "Loopwhen"=>"" , "Iteratewhen"=>"" , "Stop"=>"" , "Turnback"=>"" , "If"=>"" , "||" =>"" , "Int_NUM"=> "" , "Float_NUM"=>"" , "{"=>"" , "identifier"=> "" , "&&" => "" , "$" => "","else"=>"" , "=" => ""),
        "compound-stmt" => array( "SIow"=>"" , "Iow"=>"" , "Iowf"=>"" , "SIowf"=>"" , "Chain"=>"" , "Chlo"=>"" , "Worthless"=>"" , "Include"=>"" , "/$"=>"" , "$$$"=>"" , "*"=>"" , "/"=>"" , "+"=>"" , "-"=>"" , "str"=>"" , "=="=>""  , "!="=>"" , "<"=>"" , ">"=>"" , "<="=>"" , ">="=>"" , ";"=>"" , "," => "" , ")"=>"" , "("=>""  , "Loopwhen"=>"" , "Iteratewhen"=>"" , "Stop"=>"" , "Turnback"=>"" , "If"=>"" , "||" =>"" , "Int_NUM"=> "" , "Float_NUM"=>"" , "{"=>"{ compound-stmt_1 }" , "identifier"=> "" , "&&" => "" , "$" => "","else"=>"" , "=" => ""),
        "compound-stmt_1" => array( "SIow"=>"local-declarations statement-list" , "Iow"=>"local-declarations statement-list" , "Iowf"=>"local-declarations statement-list" , "SIowf"=>"local-declarations statement-list" , "Chain"=>"local-declarations statement-list" , "Chlo"=>"local-declarations statement-list" , "Worthless"=>"local-declarations statement-list" , "Include"=>"" , "/$"=>"comment local-declarations statement-list" , "$$$"=>"comment local-declarations statement-list" , "*"=>"" , "/"=>"" , "+"=>"" , "-"=>"" , "str"=>"" , "=="=>""  , "!="=>"" , "<"=>"" , ">"=>"" , "<="=>"" , ">="=>"" , ";"=>"" , "," => "" , ")"=>"" , "("=>""  , "Loopwhen"=>"" , "Iteratewhen"=>"" , "Stop"=>"" , "Turnback"=>"" , "If"=>"" , "||" =>"" , "Int_NUM"=> "" , "Float_NUM"=>"" , "{"=>"compound-stmt_1" , "identifier"=> "" , "&&" => "" , "$" => "","else"=>"" , "=" => ""),          
        "local-declarations" => array( "SIow"=>"local-declarations_1" , "Iow"=>"local-declarations_1" , "Iowf"=>"local-declarations_1" , "SIowf"=>"local-declarations_1" , "Chain"=>"local-declarations_1" , "Chlo"=>"local-declarations_1" , "Worthless"=>"local-declarations_1" , "Include"=>"" , "/$"=>"" , "$$$"=>"" , "*"=>"" , "/"=>"" , "+"=>"" , "-"=>"" , "str"=>"" , "=="=>""  , "!="=>"" , "<"=>"" , ">"=>"" , "<="=>"" , ">="=>"" , ";"=>"" , "," => "" , ")"=>"" , "("=>""  , "Loopwhen"=>"" , "Iteratewhen"=>"" , "Stop"=>"" , "Turnback"=>"" , "If"=>"" , "||" =>"" , "Int_NUM"=> "" , "Float_NUM"=>"" , "{"=>"" , "identifier"=> "" , "&&" => "" , "$" => "","else"=>"" , "=" => ""),
        "local-declarations_1" => array( "SIow"=>"var-declaration local-declarations_1" , "Iow"=>"var-declaration local-declarations_1" , "Iowf"=>"var-declaration local-declarations_1" , "SIowf"=>"var-declaration local-declarations_1" , "Chain"=>"var-declaration local-declarations_1" , "Chlo"=>"var-declaration local-declarations_1" , "Worthless"=>"var-declaration local-declarations_1" , "Include"=>"" , "/$"=>"" , "$$$"=>"" , "*"=>"" , "/"=>"" , "+"=>"" , "-"=>"" , "str"=>"" , "=="=>""  , "!="=>"" , "<"=>"" , ">"=>"" , "<="=>"" , ">="=>"" , ";"=>"0" , "," => "" , ")"=>"" , "("=>""  , "Loopwhen"=>"" , "Iteratewhen"=>"" , "Stop"=>"" , "Turnback"=>"" , "If"=>"" , "||" =>"" , "Int_NUM"=> "" , "Float_NUM"=>"" , "{"=>"" , "identifier"=> "" , "&&" => "" , "$" => "0","else"=>"" , "=" => ""),
        "statement-list" => array( "SIow"=>"" , "Iow"=>"" , "Iowf"=>"" , "SIowf"=>"" , "Chain"=>"" , "Chlo"=>"" , "Worthless"=>"" , "Include"=>"" , "/$"=>"" , "$$$"=>"" , "*"=>"" , "/"=>"" , "+"=>"" , "-"=>"" , "str"=>"" , "=="=>""  , "!="=>"" , "<"=>"" , ">"=>"" , "<="=>"" , ">="=>"" , ";"=>"statement-list_1" , "," => "" , ")"=>"" , "("=>""  , "Loopwhen"=>"statement-list_1" , "Iteratewhen"=>"statement-list_1" , "Stop"=>"statement-list_1" , "Turnback"=>"statement-list_1" , "If"=>"statement-list_1" , "||" =>"" , "Int_NUM"=> "" , "Float_NUM"=>"" , "{"=>"statement-list_1" , "identifier"=> "statement-list_1" , "&&" => "" , "$" => "","else"=>"" , "=" => ""),
        "statement-list_1" => array( "SIow"=>"" , "Iow"=>"" , "Iowf"=>"" , "SIowf"=>"" , "Chain"=>"" , "Chlo"=>"" , "Worthless"=>"" , "Include"=>"" , "/$"=>"" , "$$$"=>"" , "*"=>"" , "/"=>"" , "+"=>"" , "-"=>"" , "str"=>"" , "=="=>""  , "!="=>"" , "<"=>"" , ">"=>"" , "<="=>"" , ">="=>"" , ";"=>"statement statement-list_1" , "," => "" , ")"=>"" , "("=>""  , "Loopwhen"=>"statement statement-list_1" , "Iteratewhen"=>"statement statement-list_1" , "Stop"=>"statement statement-list_1" , "Turnback"=>"statement statement-list_1" , "If"=>"statement statement-list_1" , "||" =>"" , "Int_NUM"=> "" , "Float_NUM"=>"" , "{"=>"statement statement-list_1" , "identifier"=> "statement statement-list_1" , "&&" => "" , "$" => "0","else"=>"" , "=" => "","}"=>"0"),
        "statement" => array( "SIow"=>"" , "Iow"=>"" , "Iowf"=>"" , "SIowf"=>"" , "Chain"=>"" , "Chlo"=>"" , "Worthless"=>"" , "Include"=>"" , "/$"=>"" , "$$$"=>"" , "*"=>"" , "/"=>"" , "+"=>"" , "-"=>"" , "str"=>"" , "=="=>""  , "!="=>"" , "<"=>"" , ">"=>"" , "<="=>"" , ">="=>"" , ";"=>"expression-stmt" , "," => "" , ")"=>"" , "("=>""  , "Loopwhen"=>"iteration-stmt" , "Iteratewhen"=>"iteration-stmt" , "Stop"=>"jump-stmt" , "Turnback"=>"jump-stmt" , "If"=>"selection-stmt" , "||" =>"" , "Int_NUM"=> "" , "Float_NUM"=>"" , "{"=>"compound-stmt" , "identifier"=> "expression-stmt" , "&&" => "" , "$" => "","else"=>"" , "=" => ""),
        "expression-stmt" => array( "SIow"=>"" , "Iow"=>"" , "Iowf"=>"" , "SIowf"=>"" , "Chain"=>"" , "Chlo"=>"" , "Worthless"=>"" , "Include"=>"" , "/$"=>"" , "$$$"=>"" , "*"=>"" , "/"=>"" , "+"=>"" , "-"=>"" , "str"=>"" , "=="=>""  , "!="=>"" , "<"=>"" , ">"=>"" , "<="=>"" , ">="=>"" , ";"=>";" , "," => "" , ")"=>"" , "("=>""  , "Loopwhen"=>"" , "Iteratewhen"=>"" , "Stop"=>"" , "Turnback"=>"" , "If"=>"" , "||" =>"" , "Int_NUM"=> "" , "Float_NUM"=>"" , "{"=>"" , "identifier"=> "expression ;" , "&&" => "" , "$" => "","else"=>"" , "=" => ""),
        "selection-stmt" => array( "SIow"=>"" , "Iow"=>"" , "Iowf"=>"" , "SIowf"=>"" , "Chain"=>"" , "Chlo"=>"" , "Worthless"=>"" , "Include"=>"" , "/$"=>"" , "$$$"=>"" , "*"=>"" , "/"=>"" , "+"=>"" , "-"=>"" , "str"=>"" , "=="=>""  , "!="=>"" , "<"=>"" , ">"=>"" , "<="=>"" , ">="=>"" , ";"=>"" , "," => "" , ")"=>"" , "("=>""  , "Loopwhen"=>"" , "Iteratewhen"=>"" , "Stop"=>"" , "Turnback"=>"" , "If"=>"If ( expression ) statement selection-stmt_1" , "||" =>"" , "Int_NUM"=> "" , "Float_NUM"=>"" , "{"=>"" , "identifier"=> "" , "&&" => "" , "$" => "","else"=>"" , "=" => ""),
        "selection-stmt_1" => array( "SIow"=>"" , "Iow"=>"" , "Iowf"=>"" , "SIowf"=>"" , "Chain"=>"" , "Chlo"=>"" , "Worthless"=>"" , "Include"=>"" , "/$"=>"" , "$$$"=>"" , "*"=>"" , "/"=>"" , "+"=>"" , "-"=>"" , "str"=>"" , "=="=>""  , "!="=>"" , "<"=>"" , ">"=>"" , "<="=>"" , ">="=>"" , ";"=>"0" , "," => "" , ")"=>"" , "("=>""  , "Loopwhen"=>"" , "Iteratewhen"=>"" , "Stop"=>"" , "Turnback"=>"" , "If"=>"" , "||" =>"" , "Int_NUM"=> "" , "Float_NUM"=>"" , "{"=>"" , "identifier"=> "" , "&&" => "" , "$" => "0" , "else" => "else statement", "=" => "","}"=>"0"),
        "iteration-stmt" => array( "SIow"=>"" , "Iow"=>"" , "Iowf"=>"" , "SIowf"=>"" , "Chain"=>"" , "Chlo"=>"" , "Worthless"=>"" , "Include"=>"" , "/$"=>"" , "$$$"=>"" , "*"=>"" , "/"=>"" , "+"=>"" , "-"=>"" , "str"=>"" , "=="=>""  , "!="=>"" , "<"=>"" , ">"=>"" , "<="=>"" , ">="=>"" , ";"=>"" , "," => "" , ")"=>"" , "("=>""  , "Loopwhen"=>"Loop-statement" , "Iteratewhen"=>"Iterate-statement" , "Stop"=>"" , "Turnback"=>"" , "If"=>"" , "||" =>"" , "Int_NUM"=> "" , "Float_NUM"=>"" , "{"=>"" , "identifier"=> "" , "&&" => "" , "$" => "" , "else" => "","=" => "" ),
        "Loop-statement" => array( "SIow"=>"" , "Iow"=>"" , "Iowf"=>"" , "SIowf"=>"" , "Chain"=>"" , "Chlo"=>"" , "Worthless"=>"" , "Include"=>"" , "/$"=>"" , "$$$"=>"" , "*"=>"" , "/"=>"" , "+"=>"" , "-"=>"" , "str"=>"" , "=="=>""  , "!="=>"" , "<"=>"" , ">"=>"" , "<="=>"" , ">="=>"" , ";"=>"" , "," => "" , ")"=>"" , "("=>""  , "Loopwhen"=>"Loopwhen (expression) statement" , "Iteratewhen"=>"" , "Stop"=>"" , "Turnback"=>"" , "If"=>"" , "||" =>"" , "Int_NUM"=> "" , "Float_NUM"=>"" , "{"=>"" , "identifier"=> "" , "&&" => "" , "$" => "", "else" => "" ,  "=" => ""),                    
        "Iterate-statement" => array( "SIow"=>"" , "Iow"=>"" , "Iowf"=>"" , "SIowf"=>"" , "Chain"=>"" , "Chlo"=>"" , "Worthless"=>"" , "Include"=>"" , "/$"=>"" , "$$$"=>"" , "*"=>"" , "/"=>"" , "+"=>"" , "-"=>"" , "str"=>"" , "=="=>""  , "!="=>"" , "<"=>"" , ">"=>"" , "<="=>"" , ">="=>"" , ";"=>"" , "," => "" , ")"=>"" , "("=>""  , "Loopwhen"=>"" , "Iteratewhen"=>"Iteratewhen (expression ; expression ; expression )" , "Stop"=>"" , "Turnback"=>"" , "If"=>"" , "||" =>"" , "Int_NUM"=> "" , "Float_NUM"=>"" , "{"=>"" , "identifier"=> "" , "&&" => "" , "$" => "" , "else" => ""  , "=" => ""),
        "jump-statement" => array( "SIow"=>"" , "Iow"=>"" , "Iowf"=>"" , "SIowf"=>"" , "Chain"=>"" , "Chlo"=>"" , "Worthless"=>"" , "Include"=>"" , "/$"=>"" , "$$$"=>"" , "*"=>"" , "/"=>"" , "+"=>"" , "-"=>"" , "str"=>"" , "=="=>""  , "!="=>"" , "<"=>"" , ">"=>"" , "<="=>"" , ">="=>"" , ";"=>"" , "," => "" , ")"=>"" , "("=>""  , "Loopwhen"=>"" , "Iteratewhen"=>"" , "Stop"=>"Stop ;" , "Turnback"=>"Turnback expression ;" , "If"=>"" , "||" =>"" , "Int_NUM"=> "" , "Float_NUM"=>"" , "{"=>"" , "identifier"=> "" , "&&" => "" , "$" => "" ,"=" => ""),
        "expression" => array( "SIow"=>"" , "Iow"=>"" , "Iowf"=>"" , "SIowf"=>"" , "Chain"=>"" , "Chlo"=>"" , "Worthless"=>"" , "Include"=>"" , "/$"=>"" , "$$$"=>"" , "*"=>"" , "/"=>"" , "+"=>"simple-expression" , "-"=>"simple-expression" , "str"=>"" , "=="=>""  , "!="=>"" , "<"=>"" , ">"=>"" , "<="=>"" , ">="=>"" , ";"=>"" , "," => "" , ")"=>"" , "("=>"simple-expression"  , "Loopwhen"=>"" , "Iteratewhen"=>"" , "Stop"=>"" , "Turnback"=>"" , "If"=>"" , "||" =>"" , "Int_NUM"=> "simple-expression" , "Float_NUM"=>"simple-expression" , "{"=>"" , "identifier"=> "id-assign expression_1" , "&&" => "" , "$" => "","else"=>"" , "=" => ""),
        "expression_1" => array( "SIow"=>"" , "Iow"=>"" , "Iowf"=>"" , "SIowf"=>"" , "Chain"=>"" , "Chlo"=>"" , "Worthless"=>"" , "Include"=>"" , "/$"=>"" , "$$$"=>"" , "*"=>"" , "/"=>"" , "+"=>"" , "-"=>"" , "str"=>"" , "=="=>""  , "!="=>"" , "<"=>"" , ">"=>"" , "<="=>"" , ">="=>"" , ";"=>"0" , "," => "" , ")"=>"" , "("=>""  , "Loopwhen"=>"" , "Iteratewhen"=>"" , "Stop"=>"" , "Turnback"=>"" , "If"=>"" , "||" =>"" , "Int_NUM"=> "" , "Float_NUM"=>"" , "{"=>"" , "identifier"=> "" , "&&" => "" , "$" => "0" , "else"=>"" , "=" => "= expression","}"=>"0"),
        "id-assign" => array( "SIow"=>"" , "Iow"=>"" , "Iowf"=>"" , "SIowf"=>"" , "Chain"=>"" , "Chlo"=>"" , "Worthless"=>"" , "Include"=>"" , "/$"=>"" , "$$$"=>"" , "*"=>"" , "/"=>"" , "+"=>"" , "-"=>"" , "str"=>"" , "=="=>""  , "!="=>"" , "<"=>"" , ">"=>"" , "<="=>"" , ">="=>"" , ";"=>"" , "," => "" , ")"=>"" , "("=>""  , "Loopwhen"=>"" , "Iteratewhen"=>"" , "Stop"=>"" , "Turnback"=>"" , "If"=>"" , "||" =>"" , "Int_NUM"=> "" , "Float_NUM"=>"" , "{"=>"" , "identifier"=> "identifier" , "&&" => "" , "$" => "","else"=>"" , "=" => ""),
        "simple-expression" => array( "SIow"=>"" , "Iow"=>"" , "Iowf"=>"" , "SIowf"=>"" , "Chain"=>"" , "Chlo"=>"" , "Worthless"=>"" , "Include"=>"" , "/$"=>"" , "$$$"=>"" , "*"=>"" , "/"=>"" , "+"=>"additive-expression simple-expression_1" , "-"=>"additive-expression simple-expression_1" , "str"=>"" , "=="=>""  , "!="=>"" , "<"=>"" , ">"=>"" , "<="=>"" , ">="=>"" , ";"=>"" , "," => "" , ")"=>"" , "("=>"additive-expression simple-expression_1"  , "Loopwhen"=>"" , "Iteratewhen"=>"" , "Stop"=>"" , "Turnback"=>"" , "If"=>"" , "||" =>"" , "Int_NUM"=> "additive-expression simple-expression_1" , "Float_NUM"=>"additive-expression simple-expression_1" , "{"=>"" , "identifier"=> "" , "&&" => "" , "$" => "","else"=>"" , "=" => ""),
        "simple-expression_1" => array( "SIow"=>"" , "Iow"=>"" , "Iowf"=>"" , "SIowf"=>"" , "Chain"=>"" , "Chlo"=>"" , "Worthless"=>"" , "Include"=>"" , "/$"=>"" , "$$$"=>"" , "*"=>"" , "/"=>"" , "+"=>"" , "-"=>"" , "str"=>"" , "=="=>"relop additive-expression"  , "!="=>"relop additive-expression" , "<"=>"relop additive-expression" , ">"=>"relop additive-expression" , "<="=>"relop additive-expression" , ">="=>"relop additive-expression" , ";"=>"0" , "," => "" , ")"=>"" , "("=>""  , "Loopwhen"=>"" , "Iteratewhen"=>"" , "Stop"=>"" , "Turnback"=>"" , "If"=>"" , "||" =>"relop additive-expression" , "Int_NUM"=> "" , "Float_NUM"=>"" , "{"=>"" , "identifier"=> "" , "&&" => "relop additive-expression" , "$" => "0","else"=>"" , "=" => "","}"=>"0"),
        "relop" => array( "SIow"=>"" , "Iow"=>"" , "Iowf"=>"" , "SIowf"=>"" , "Chain"=>"" , "Chlo"=>"" , "Worthless"=>"" , "Include"=>"" , "/$"=>"" , "$$$"=>"" , "*"=>"" , "/"=>"" , "+"=>"" , "-"=>"" , "str"=>"" , "=="=>"=="  , "!="=>"!=" , "<"=>"<" , ">"=>">" , "<="=>"<=" , ">="=>">=" , ";"=>"" , "," => "" , ")"=>"" , "("=>""  , "Loopwhen"=>"" , "Iteratewhen"=>"" , "Stop"=>"" , "Turnback"=>"" , "If"=>"" , "||" =>"||" , "Int_NUM"=> "" , "Float_NUM"=>"" , "{"=>"" , "identifier"=> "" , "&&" => "&&" , "$" => "","else"=>"" , "=" => ""),
        "additive-expression" => array( "SIow"=>"" , "Iow"=>"" , "Iowf"=>"" , "SIowf"=>"" , "Chain"=>"" , "Chlo"=>"" , "Worthless"=>"" , "Include"=>"" , "/$"=>"" , "$$$"=>"" , "*"=>"" , "/"=>"" , "+"=>"term additive-expression_1" , "-"=>"term additive-expression_1" , "str"=>"" , "=="=>""  , "!="=>"" , "<"=>"" , ">"=>"" , "<="=>"" , ">="=>"" , ";"=>"" , "," => "" , ")"=>"" , "("=>""  , "Loopwhen"=>"" , "Iteratewhen"=>"" , "Stop"=>"" , "Turnback"=>"" , "If"=>"" , "||" =>"" , "Int_NUM"=> "term additive-expression_1" , "Float_NUM"=>"term additive-expression_1" , "{"=>"" , "identifier"=> "term additive-expression_1" , "&&" => "" , "$" => "","else"=>"" , "=" => ""),
        "additive-expression_1" => array( "SIow"=>"" , "Iow"=>"" , "Iowf"=>"" , "SIowf"=>"" , "Chain"=>"" , "Chlo"=>"" , "Worthless"=>"" , "Include"=>"" , "/$"=>"" , "$$$"=>"" , "*"=>"" , "/"=>"" , "+"=>"addop term additive-expression_1" , "-"=>"addop term additive-expression_1" , "str"=>"" , "=="=>""  , "!="=>"" , "<"=>"" , ">"=>"" , "<="=>"" , ">="=>"" , ";"=>"0" , "," => "" , ")"=>"" , "("=>""  , "Loopwhen"=>"" , "Iteratewhen"=>"" , "Stop"=>"" , "Turnback"=>"" , "If"=>"" , "||" =>"" , "Int_NUM"=> "" , "Float_NUM"=>"" , "{"=>"" , "identifier"=> "" , "&&" => "" , "$" => "0","else"=>"" , "=" => "" , "}" => "0"),                    
        "addop" => array( "SIow"=>"" , "Iow"=>"" , "Iowf"=>"" , "SIowf"=>"" , "Chain"=>"" , "Chlo"=>"" , "Worthless"=>"" , "Include"=>"" , "/$"=>"" , "$$$"=>"" , "*"=>"" , "/"=>"" , "+"=>"+" , "-"=>"-" , "str"=>"" , "=="=>""  , "!="=>"" , "<"=>"" , ">"=>"" , "<="=>"" , ">="=>"" , ";"=>"" , "," => "" , ")"=>"" , "("=>""  , "Loopwhen"=>"" , "Iteratewhen"=>"" , "Stop"=>"" , "Turnback"=>"" , "If"=>"" , "||" =>"" , "Int_NUM"=> "" , "Float_NUM"=>"" , "{"=>"" , "identifier"=> "" , "&&" => "" , "$" => "","else"=>"" , "=" => ""),
        "term" => array( "SIow"=>"" , "Iow"=>"" , "Iowf"=>"" , "SIowf"=>"" , "Chain"=>"" , "Chlo"=>"" , "Worthless"=>"" , "Include"=>"" , "/$"=>"" , "$$$"=>"" , "*"=>"" , "/"=>"" , "+"=>"factor term_1" , "-"=>"factor term_1" , "str"=>"" , "=="=>""  , "!="=>"" , "<"=>"" , ">"=>"" , "<="=>"" , ">="=>"" , ";"=>"" , "," => "" , ")"=>"" , "("=>""  , "Loopwhen"=>"" , "Iteratewhen"=>"" , "Stop"=>"" , "Turnback"=>"" , "If"=>"" , "||" =>"" , "Int_NUM"=> "factor term_1" , "Float_NUM"=>"factor term_1" , "{"=>"" , "identifier"=> "factor term_1" , "&&" => "" , "$" => "","else"=>"" , "=" => ""),
        "term_1" => array( "SIow"=>"" , "Iow"=>"" , "Iowf"=>"" , "SIowf"=>"" , "Chain"=>"" , "Chlo"=>"" , "Worthless"=>"" , "Include"=>"" , "/$"=>"" , "$$$"=>"" , "*"=>"mulop factor term_1" , "/"=>"mulop factor term_1" , "+"=>"" , "-"=>"" , "str"=>"" , "=="=>""  , "!="=>"" , "<"=>"" , ">"=>"" , "<="=>"" , ">="=>"" , ";"=>"0" , "," => "" , ")"=>"" , "("=>""  , "Loopwhen"=>"" , "Iteratewhen"=>"" , "Stop"=>"" , "Turnback"=>"" , "If"=>"" , "||" =>"" , "Int_NUM"=> "" , "Float_NUM"=>"" , "{"=>"" , "identifier"=> "" , "&&" => "" , "$" => "0","else"=>"" , "=" => "" , "}" => "0"),
        "factor" => array( "SIow"=>"" , "Iow"=>"" , "Iowf"=>"" , "SIowf"=>"" , "Chain"=>"" , "Chlo"=>"" , "Worthless"=>"" , "Include"=>"" , "/$"=>"" , "$$$"=>"" , "*"=>"" , "/"=>"" , "+"=>"num" , "-"=>"num" , "str"=>"" , "=="=>""  , "!="=>"" , "<"=>"" , ">"=>"" , "<="=>"" , ">="=>"" , ";"=>"" , "," => "" , ")"=>"" , "("=>""  , "Loopwhen"=>"" , "Iteratewhen"=>"" , "Stop"=>"" , "Turnback"=>"" , "If"=>"" , "||" =>"" , "Int_NUM"=> "num" , "Float_NUM"=>"num" , "{"=>"" , "identifier"=> "id-assign" , "&&" => "" , "$" => "","else"=>"" , "=" => ""),
        "mulop" => array( "SIow"=>"" , "Iow"=>"" , "Iowf"=>"" , "SIowf"=>"" , "Chain"=>"" , "Chlo"=>"" , "Worthless"=>"" , "Include"=>"" , "/$"=>"" , "$$$"=>"" , "*"=>"*" , "/"=>"/" , "+"=>"" , "-"=>"" , "str"=>"" , "=="=>""  , "!="=>"" , "<"=>"" , ">"=>"" , "<="=>"" , ">="=>"" , ";"=>"" , "," => "" , ")"=>"" , "("=>""  , "Loopwhen"=>"" , "Iteratewhen"=>"" , "Stop"=>"" , "Turnback"=>"" , "If"=>"" , "||" =>"" , "Int_NUM"=> "" , "Float_NUM"=>"" , "{"=>"" , "identifier"=> "" , "&&" => "" , "$" => "","else"=>"" , "=" => ""),
        "args" => array( "SIow"=>"" , "Iow"=>"" , "Iowf"=>"" , "SIowf"=>"" , "Chain"=>"" , "Chlo"=>"" , "Worthless"=>"" , "Include"=>"" , "/$"=>"" , "$$$"=>"" , "*"=>"" , "/"=>"" , "+"=>"" , "-"=>"" , "str"=>"" , "=="=>""  , "!="=>"" , "<"=>"" , ">"=>"" , "<="=>"" , ">="=>"" , ";"=>"" , "," => "" , ")"=>"arg-list" , "("=>""  , "Loopwhen"=>"" , "Iteratewhen"=>"" , "Stop"=>"" , "Turnback"=>"" , "If"=>"" , "||" =>"" , "Int_NUM"=> "" , "Float_NUM"=>"" , "{"=>"" , "identifier"=> "arg-list" , "&&" => "" , "$" => "0","else"=>"" , "=" => ""),
        "arg-list" => array( "SIow"=>"" , "Iow"=>"" , "Iowf"=>"" , "SIowf"=>"" , "Chain"=>"" , "Chlo"=>"" , "Worthless"=>"" , "Include"=>"" , "/$"=>"" , "$$$"=>"" , "*"=>"" , "/"=>"" , "+"=>"" , "-"=>"" , "str"=>"" , "=="=>""  , "!="=>"" , "<"=>"" , ">"=>"" , "<="=>"" , ">="=>"" , ";"=>"" , "," => "" , ")"=>"" , "("=>""  , "Loopwhen"=>"" , "Iteratewhen"=>"" , "Stop"=>"" , "Turnback"=>"" , "If"=>"" , "||" =>"" , "Int_NUM"=> "" , "Float_NUM"=>"" , "{"=>"" , "identifier"=> "expression arg-list_1" , "&&" => "" , "$" => "","else"=>"" , "=" => ""),
        "arg-list_1" => array( "SIow"=>"" , "Iow"=>"" , "Iowf"=>"" , "SIowf"=>"" , "Chain"=>"" , "Chlo"=>"" , "Worthless"=>"" , "Include"=>"" , "/$"=>"" , "$$$"=>"" , "*"=>"" , "/"=>"" , "+"=>"" , "-"=>"" , "str"=>"" , "=="=>""  , "!="=>"" , "<"=>"" , ">"=>"" , "<="=>"" , ">="=>"" , ";"=>"0" , "," => ", expression arg-list_1" , ")"=>", expression arg-list_1" , "("=>""  , "Loopwhen"=>"" , "Iteratewhen"=>"" , "Stop"=>"" , "Turnback"=>"" , "If"=>"" , "||" =>"" , "Int_NUM"=> "" , "Float_NUM"=>"" , "{"=>"" , "identifier"=> "" , "&&" => "" , "$" => "0","else"=>"" , "=" => "", "}" => "0"),
        "num" => array( "SIow"=>"" , "Iow"=>"" , "Iowf"=>"" , "SIowf"=>"" , "Chain"=>"" , "Chlo"=>"" , "Worthless"=>"" , "Include"=>"" , "/$"=>"" , "$$$"=>"" , "*"=>"" , "/"=>"" , "+"=>"signednum" , "-"=>"signednum" , "str"=>"" , "=="=>""  , "!="=>"" , "<"=>"" , ">"=>"" , "<="=>"" , ">="=>"" , ";"=>"" , "," => "" , ")"=>"" , "("=>""  , "Loopwhen"=>"" , "Iteratewhen"=>"" , "Stop"=>"" , "Turnback"=>"" , "If"=>"" , "||" =>"" , "Int_NUM"=> "unsignednum" , "Float_NUM"=>"unsignednum" , "{"=>"" , "identifier"=> "" , "&&" => "" , "$" => "","else"=>"" , "=" => ""),
        "signednum" => array( "SIow"=>"" , "Iow"=>"" , "Iowf"=>"" , "SIowf"=>"" , "Chain"=>"" , "Chlo"=>"" , "Worthless"=>"" , "Include"=>"" , "/$"=>"" , "$$$"=>"" , "*"=>"" , "/"=>"" , "+"=>"pos-num" , "-"=>"neg-num" , "str"=>"" , "=="=>""  , "!="=>"" , "<"=>"" , ">"=>"" , "<="=>"" , ">="=>"" , ";"=>"" , "," => "" , ")"=>"" , "("=>""  , "Loopwhen"=>"" , "Iteratewhen"=>"" , "Stop"=>"" , "Turnback"=>"" , "If"=>"" , "||" =>"" , "Int_NUM"=> "" , "Float_NUM"=>"" , "{"=>"" , "identifier"=> "" , "&&" => "" , "$" => "","else"=>"" , "=" => ""),
        "unsignednum" => array( "SIow"=>"" , "Iow"=>"" , "Iowf"=>"" , "SIowf"=>"" , "Chain"=>"" , "Chlo"=>"" , "Worthless"=>"" , "Include"=>"" , "/$"=>"" , "$$$"=>"" , "*"=>"" , "/"=>"" , "+"=>"" , "-"=>"" , "str"=>"" , "=="=>""  , "!="=>"" , "<"=>"" , ">"=>"" , "<="=>"" , ">="=>"" , ";"=>"" , "," => "" , ")"=>"" , "("=>""  , "Loopwhen"=>"" , "Iteratewhen"=>"" , "Stop"=>"" , "Turnback"=>"" , "If"=>"" , "||" =>"" , "Int_NUM"=> "value" , "Float_NUM"=>"value" , "{"=>"" , "identifier"=> "" , "&&" => "" , "$" => "","else"=>"" , "=" => ""),
        "pos-num" => array( "SIow"=>"" , "Iow"=>"" , "Iowf"=>"" , "SIowf"=>"" , "Chain"=>"" , "Chlo"=>"" , "Worthless"=>"" , "Include"=>"" , "/$"=>"" , "$$$"=>"" , "*"=>"" , "/"=>"" , "+"=>"+ value" , "-"=>"" , "str"=>"" , "=="=>""  , "!="=>"" , "<"=>"" , ">"=>"" , "<="=>"" , ">="=>"" , ";"=>"" , "," => "" , ")"=>"" , "("=>""  , "Loopwhen"=>"" , "Iteratewhen"=>"" , "Stop"=>"" , "Turnback"=>"" , "If"=>"" , "||" =>"" , "Int_NUM"=> "" , "Float_NUM"=>"" , "{"=>"" , "identifier"=> "" , "&&" => "" , "$" => "","else"=>"" , "=" => ""),
        "neg-num" => array( "SIow"=>"" , "Iow"=>"" , "Iowf"=>"" , "SIowf"=>"" , "Chain"=>"" , "Chlo"=>"" , "Worthless"=>"" , "Include"=>"" , "/$"=>"" , "$$$"=>"" , "*"=>"" , "/"=>"" , "+"=>"" , "-"=>"- value" , "str"=>"" , "=="=>""  , "!="=>"" , "<"=>"" , ">"=>"" , "<="=>"" , ">="=>"" , ";"=>"" , "," => "" , ")"=>"" , "("=>""  , "Loopwhen"=>"" , "Iteratewhen"=>"" , "Stop"=>"" , "Turnback"=>"" , "If"=>"" , "||" =>"" , "Int_NUM"=> "INT_NUM" , "Float_NUM"=>"Float_NUM" , "{"=>"" , "identifier"=> "" , "&&" => "" , "$" => "","else"=>"" , "=" => ""),
        "value" => array( "SIow"=>"" , "Iow"=>"" , "Iowf"=>"" , "SIowf"=>"" , "Chain"=>"" , "Chlo"=>"" , "Worthless"=>"" , "Include"=>"" , "/$"=>"" , "$$$"=>"" , "*"=>"" , "/"=>"" , "+"=>"" , "-"=>"" , "str"=>"" , "=="=>""  , "!="=>"" , "<"=>"" , ">"=>"" , "<="=>"" , ">="=>"" , ";"=>"" , "," => "" , ")"=>"" , "("=>""  , "Loopwhen"=>"" , "Iteratewhen"=>"" , "Stop"=>"" , "Turnback"=>"" , "If"=>"" , "||" =>"" , "Int_NUM"=> "Int_NUM" , "Float_NUM"=>"Float_NUM" , "{"=>"" , "identifier"=> "" , "&&" => "" , "$" => "","else"=>"" , "=" => ""),
        "comment" => array( "SIow"=>"" , "Iow"=>"" , "Iowf"=>"" , "SIowf"=>"" , "Chain"=>"" , "Chlo"=>"" , "Worthless"=>"" , "Include"=>"" , "/$"=> "/$ str $/" , "$$$"=>"$$$ STR" , "*"=>"" , "/"=>"" , "+"=>"" , "-"=>"" , "str"=>"" , "=="=>""  , "!="=>"" , "<"=>"" , ">"=>"" , "<="=>"" , ">="=>"" , ";"=>"" , "," => "" , ")"=>"" , "("=>""  , "Loopwhen"=>"" , "Iteratewhen"=>"" , "Stop"=>"" , "Turnback"=>"" , "If"=>"" , "||" =>"" , "Int_NUM"=> "" , "Float_NUM"=>"" , "{"=>"" , "identifier"=> "" , "&&" => "" , "$" => "","else"=>"" , "=" => ""),
        "include_command" => array( "SIow"=>"" , "Iow"=>"" , "Iowf"=>"" , "SIowf"=>"" , "Chain"=>"" , "Chlo"=>"" , "Worthless"=>"" , "Include"=>"include ( F_name.txt ) ;" , "/$"=>"" , "$$$"=>"" , "*"=>"" , "/"=>"" , "+"=>"" , "-"=>"" , "str"=>"" , "=="=>""  , "!="=>"" , "<"=>"" , ">"=>"" , "<="=>"" , ">="=>"" , ";"=>"" , "," => "" , ")"=>"" , "("=>""  , "Loopwhen"=>"" , "Iteratewhen"=>"" , "Stop"=>"" , "Turnback"=>"" , "If"=>"" , "||" =>"" , "Int_NUM"=> "" , "Float_NUM"=>"" , "{"=>"" , "identifier"=> "" , "&&" => "" , "$" => "","else"=>"" , "=" => ""),
        "F_name" => array( "SIow"=>"" , "Iow"=>"" , "Iowf"=>"" , "SIowf"=>"" , "Chain"=>"" , "Chlo"=>"" , "Worthless"=>"" , "Include"=>"" , "/$"=>"" , "$$$"=>"" , "*"=>"" , "/"=>"" , "+"=>"" , "-"=>"" , "str"=>"str" , "=="=>""  , "!="=>"" , "<"=>"" , ">"=>"" , "<="=>"" , ">="=>"" , ";"=>"" , "," => "" , ")"=>"" , "("=>""  , "Loopwhen"=>"" , "Iteratewhen"=>"" , "Stop"=>"" , "Turnback"=>"" , "If"=>"" , "||" =>"" , "Int_NUM"=> "" , "Float_NUM"=>"" , "{"=>"" , "identifier"=> "" , "&&" => "" , "$" => "","else"=>"" , "=" => ""),
        // "program" => array( "SIow"=>"" , "Iow"=>"" , "Iowf"=>"" , "SIowf"=>"" , "Chain"=>"" , "Chlo"=>"" , "Worthless"=>"" , "Include"=>"" , "/$"=>"" , "$$$"=>"" , "*"=>"" , "/"=>"" , "+"=>"" , "-"=>"" , "str"=>"" , "=="=>""  , "!="=>"" , "<"=>"" , ">"=>"" , "<="=>"" , ">="=>"" , ";"=>"" , "," => "" , ")"=>"" , "("=>""  , "Loopwhen"=>"" , "Iteratewhen"=>"" , "Stop"=>"" , "Turnback"=>"" , "If"=>"" , "||" =>"" , "Int_NUM"=> "" , "Float_NUM"=>"" , "{"=>"" , "identifier"=> "" , "&&" => "" , "$" => "","else"=>"" , "=" => ""),
                                                          

    );

    private $parsingStack;

    public function parse($scannerOutput) {
        // echo "<pre>".print_r($this->parsingTable)."</pre>";
        // echo $this->parsingTable["addition"];
        $this->startParsingStack();
        $tokenPointer = 0;
        $currentToken = $scannerOutput[$tokenPointer];
        $topStack = $this->parsingStack->topElement();
        while ($topStack != "$" && $tokenPointer < sizeof($scannerOutput) ){
            echo $this->parsingStack->topElement()."---------->".$this->getToken($currentToken);
            echo "<br>beforeCondition-->";
            echo  $this->parsingStack->print();
            echo "<br>";
            // if ($topStack == "0"  && $this->isStatmentEnding($currentToken[0])  ){
            //     $this->parsingStack->pop();
            //     $topStack = $this->parsingStack->topElement();
            //     $currentToken = $scannerOutput[++$tokenPointer];
            //     //echo "ënter";
            // }
            // else if ( $topStack == "0" || $currentToken[0] == ")"){
            //     $this->parsingStack->pop();
            //     $topStack = $this->parsingStack->topElement();
            //     //$currentToken = $scannerOutput[++$tokenPointer];
            // }

            // if ( $this->voidEntry($topStack , $this->getToken($currentToken) )){
            //     $this->parsingStack->pop();
            //     $topStack = $this->parsingStack->topElement();
            // }
            // echo $this->parsingStack->topElement()."---------->".$this->getToken($currentToken);
            // echo "<br>afterCondition-->";
            // echo  $this->parsingStack->print();
            // echo "<br>";
            if ( $topStack == "0" || $this->voidEntry($topStack , $this->getToken($currentToken) ) ){
                $this->parsingStack->pop();
                $topStack = $this->parsingStack->topElement();
            }
            // else if ($this->isStatmentEnding($currentToken[0]) && $this->parsingTable[$topStack]["$"] != "0" ){
            //     $currentToken = $scannerOutput[++$tokenPointer];
            // }
            if ( $this->isTerminal()  ){
                if ( $topStack == $this->getToken($currentToken) ){
                   $this->parsingStack->pop();
                   $currentToken = $scannerOutput[++$tokenPointer];
                   $topStack = $this->parsingStack->topElement(); 
                }
                else{
                    //$this->error();
                    break; // error
                    
                }
            }
            else { // nonterminal
                if ( $this->isErrorEntry($topStack , $currentToken)){
                    // $this->error();
                    break;
                } 
                else{
                    // echo "enter";
                    $this->parsingStack->pop();
                    $this->pushEntryInStack($this->getElement( $topStack , $currentToken ));
                    $topStack = $this->parsingStack->topElement();
                }
            }
        }
        if($topStack != "$" && $currentToken[0] != "$") {
            echo "error";
        }
        else {
            echo "match";
        }
    }

    // create stack and push $ and first symbol of parsing table
    private function startParsingStack(){
        $this->parsingStack = new Stack();
        $this->parsingStack->push("$");
        $this->parsingStack->push("program");
    }

    private function isErrorEntry($top , $token ) {
        return $this->getElement( $top , $token ) == "";
    }

        // get element from parsing table
    private function getElement($top , $token){
        return $this->parsingTable[$top][$this->getToken ($token)];
    }

    

    

    private function pushEntryInStack($str){
        $parseElement = StringHandle :: splitByDelimiter($str);
        for ( $i = Arrays :: arraySize($parseElement) - 1  ; $i >= 0 ; $i-- ){
            $this->parsingStack->push($parseElement[$i]);
        }
    }

    // check if grammer rule is terminal 
    private function isTerminal() { 
        return ! isset($this->parsingTable[$this->parsingStack->topElement()]);
    }

    private function error() {
        echo "error";
        echo "<br>";
    }

    // check empty entry

  
    
    
    private function getToken ($token){
        //echo $token[0];
        if ( $token[1]  == "identifier" ){
            return $token[1];
        }
        else if ($token[1]  == "constant"){
            return "Int_NUM";
        }
        else if ($token[1] == "error"){
            return "error";
        }
        else
            return $token[0];
    }

    

    public function print ($x , $y){
        echo $this->parsingTable [ $x ][$y];
    }

    private function voidEntry($top,$current){
        if ( $top == $current ){
            return false;
        }
        elseif ($this->parsingTable[$top]["$"] == "0" && $this->parsingTable[$top][$current] == "" ){
            return true;
        }
        return false;
    }
    private function isStatmentEnding($ch){
        $endSymbols = array(")",";","}","$");
        for ( $i = 0 ; $i < sizeof($endSymbols) ; $i++ ){
            if ( $ch == $endSymbols[$i] ){
                return true;
            }
        }
        return false;
    }
}

$sample = array (
    array("Worthless" , "int" ),
    array("x" , "identifier" ),
    array("(","Braces"),
    array(")" , "Braces" ),
    array("{","Braces"),
    array("Iow" , "int" ),
    array("num5","identifier"),
    array(";", "ider" ),
    //array("$", "ider" ),
    array("Iow" , "int" ),
    array("num6" , "identifier"),
    array("=" ,"fff"),
    array("6","constant"),
    array(";","jhyu"),
    //array("$", "ider" ),
    array("If","condition"),
    array("(","Braces"),
    array("num5","identifier"),
    array(">","relation operation"),
    array("10","constant"),
    array("{","Braces"),
    array("Turnback","return"),
    array("num5","identifier"),
    array(";","fffff"),
    array("}","Braces"),
    array("Turnback","return"),
    array("0","constant"),
    array(";","fffff"),
    array("}" , "Braces" ),
);
$test = new parser();
$test->parse($sample);




?>