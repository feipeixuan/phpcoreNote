<?php
/*
 * Description:请求的处理器
 * Author: feipeixuan
 */

class DefaultHandler
{
    private $router;

    public function __construct()
    {
        $this->router=new Router();
    }

    // 处理请求
    public function service()
    {
        $ac=$_REQUEST['ac'];
        $controller=$this->router->findController($ac);
        $controller->excute();
    }
}
