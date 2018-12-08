<?php

//1 执行一条使用命名占位符的预处理语句

/* 通过绑定的 PHP 变量执行一条预处理语句 */
$calories = 150;
$colour = 'red';
$sth = $dbh->prepare('SELECT name, colour, calories
    FROM fruit
    WHERE calories < :calories AND colour = :colour');
$sth->bindValue(':calories', $calories, PDO::PARAM_INT);
$sth->bindValue(':colour', $colour, PDO::PARAM_STR);
$sth->execute();

//2 执行一条使用问号占位符的预处理语句

/* 通过绑定的 PHP 变量执行一条预处理语句 */
$calories = 150;
$colour = 'red';
$sth = $dbh->prepare('SELECT name, colour, calories
    FROM fruit
    WHERE calories < ? AND colour = ?');
$sth->bindValue(1, $calories, PDO::PARAM_INT);
$sth->bindValue(2, $colour, PDO::PARAM_STR);
$sth->execute();
=======
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
>>>>>>> 5bab8bd982136d874bfc04ed250d7abd38cf3686
