<?php
/**
 * Created by PhpStorm.
 * User: changba-176
 * Date: 2018/12/4
 * Time: 下午6:29
 */
$dbms='mysql';     //数据库类型
$host='localhost'; //数据库主机名
$dbName='test';    //使用的数据库
$user='root';      //数据库连接用户名
$pass='root';          //对应的密码
$dsn="$dbms:host=$host;dbname=$dbName";

try {
    $pdo = new PDO($dsn, $user, $pass); //初始化一个PDO对象
    echo "连接成功<br/>";
    $statement=$pdo->query("select * from user");
    $rs=$statement->fetchAll();//insert delete update 操作可以调用execute 方法
    print_r($rs);
    $statement=$pdo->prepare("insert into user values(?,?)");
    $statement->bindValue(1,"shishi");
    $statement->bindValue(2,"0901");
    $statement->execute();
    echo $statement->rowCount();
} catch (PDOException $e) {
    die ("Error!: " . $e->getMessage() . "<br/>");
}
