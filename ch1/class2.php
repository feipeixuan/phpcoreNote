<?php
/**
 * Created by IntelliJ IDEA.
 * User: Mario
 * Date: 2018/11/24
 * Time: 22:44
 */

class a{
    function  sayHello(){
        echo "hello a\n";
    }
}

class b extends a {
    function sayHello(){
        parent::sayHello();
        echo "hello b\n";
    }
}

$obj=new b();
$obj->sayHello();