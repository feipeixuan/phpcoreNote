<?php
/**
 * Created by PhpStorm.
 * User: changba-176
 * Date: 2018/11/26
 * Time: 下午6:54
 */

interface mobile{
    function call();
}

class Iphone implements mobile{

    function call()
    {
       echo "1111";
    }
}

class Mate20 implements mobile{

    function call()
    {
        echo "2222";
    }
}