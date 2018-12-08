<?php


echo "****************server*****************\r\n";
//设置 IP 和 端口（端口必须保证不被占用，且允许被外部访问）
$ip = "127.0.0.1";
$port = 1935;
//超时设计
set_time_limit(0);

//创建socket AF为协议族 TYPE为TCP
$socket=socket_create(AF_INET,SOCK_STREAM,SOL_TCP);
//绑定socket到指定ip和端口
$ret = socket_bind($socket, $ip, $port);
//监听socket,最大等会数为4
$ret = socket_listen($socket, 4);
//计数
$count = 0;
echo "等待连接!!!\r\n";
do {
    //收到请求连接
    //调用子socket处理信息
    $msgsock = socket_accept($socket);
    if(!$msgsock){
        echo "socket阻塞失败，原因为：{socket_strerror($msgsock)}\r\n";
    }
    //处理客服端输入并返回数据
    socket_write($msgsock, $msg, strlen($msg));
    $buf = socket_read($msgsock, 8192);
    $talkback = "收到的信息为：{$buf}\r\n";
    echo $talkback;

    if(++$count > 5) {
        break;
    }
    socket_close($msgsock);
} while(true);
