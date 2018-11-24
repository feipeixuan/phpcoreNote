<?php
/**
 * Created by IntelliJ IDEA.
 * User: Mario
 * Date: 2018/11/24
 * Time: 21:00
 */

class Person{
    public $name;
    public $age;

    function __construct($name)
    {
        $this->name=$name;
    }

    function __destruct()
    {
        echo "对象已死";
    }

    function  __set($fieldname, $value)
    {
       if(!isset($this->$fieldname)) {
           echo "创建一个新的变量";
       }
       $this->$fieldname=$value;
    }

    function __call($name, $arguments)
    {
        // TODO: Implement __call() method.
        echo "方法不存在";
    }
}

$person=new Person("feipeixuan");
$person1=$person;
print_r($person);
print_r(array($person));
var_dump($person);
unset($person);
echo "销毁对象中?";

$person1->__set("sex","男");
echo $person1->sex;
$person1->hhh();


