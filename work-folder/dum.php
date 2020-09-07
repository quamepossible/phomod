<?php

// $name = "Kwame";
// $email = "hi@gmail.com";

// $name = str_replace(" ", "", $name);
// $email = str_replace(" ", "", $email);
// $list = [$name, $email];
// $coun = count($list);

// $err = "";
// for($i = 0; $i < $coun; $i++){
//     if(empty($list[$i])){
//         $err .= 'empty';
//     }
// }

// if(!empty($err)){
//     echo "Empty fields";
// }

// else{
//     echo "Valid fields";
// }

//THIS IS THE CLASS THAT CONTAINS THE PRIVATE VARIABLE
class ClassOne{
    private $name = "Kwame";
    public function echoName(){
        $getName = $this->name;
        return $getName;
    }
}

//THIS IS THE CLASS THAT'S ACCESSING THE PRIVATE VARIABLE
class ClassTwo extends ClassOne{
    public function getName(){
        $getClass = $this->echoName();
        return $getClass;
    }
}
class ClassThree{
    public function justMethod(){

    }
}

$classObj = new ClassTwo;
echo $classObj->getName();