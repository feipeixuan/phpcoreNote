## PDO相关的知识

1. PDO提供一个通用的接口来访问多种数据库，抽象地支持多种数据库，使得不同的数据库使用相同的方法名，进行了统一
2. 连接mysql的三种选择
   
   2.1 MYSQL系列函数
   
   2.2 MYSQLi系列函数【增加面向对象的API+预编译和参数绑定】
   
   2.3 PDO 抽象的接口层，不同的数据库有不同的数据库驱动【依靠驱动进行连接】
   
3. API相关的类

   3.1 PDO 代表一个PHP与数据库之间的连接，有点类似Java里面的Connection
   
   3.2 PDOStatement 代表预处理语句以及语句执行后的联合结果集，调用PDO的prepare方法

4. PDO的参数绑定与预编译【同一件事的不同阶段】

   4.1 参数绑定：PDO会自动的参数进行语法转义，合法的所传的参数拼接到SQL中，例如参数为字符会自动+''
   
   4.2 预编译：数据库支持+驱动支持 【避免重复分析/编译/优化周期】

5. 相关博文:  https://blog.csdn.net/zuiliannvshen/article/details/78247244

6. 注入漏洞防范方法：禁止PHP代替Mysql来模拟prepare,这样SQL的拼接工作就是由数据库端完成的，
   mysql Server指定字符集，并将变量发送给MySQL Server完成根据字符转义

