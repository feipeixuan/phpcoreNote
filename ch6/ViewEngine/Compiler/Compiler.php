<?php 
// 模板编译工具类
abstract class Compiler
{
    //带编译文件
	private $template;

    //值栈
    private $value = array();

    //编译方法
    public abstract function compile();
}