<?php

echo "****************server*****************\r\n";
//设置 IP 和 端口（端口必须保证不被占用，且允许被外部访问）
$ip = "127.0.0.1";
$port = 1935;
//超时设计
set_time_limit(0);

//创建socket AF为协议族[IPV4\IPV6] TYPE为TCP
$socket=socket_create(AF_INET,SOCK_STREAM,0);
$result=socket_connect($socket,$ip,$port);//用 socket_create() 创建的有效的套接字资源来连接到 address
if($result==false){
    echo "连接失败";
}
socket_write($socket,"jb是狗");
