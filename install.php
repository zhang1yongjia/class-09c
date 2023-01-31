<?php
// 包含配置文件
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "tushu";//数据库库名
// 创建连接
$conn = new mysqli($servername, $username, $password);
// 检测连接
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 创建数据库
$sql = "CREATE DATABASE " . $dbname;
if ($conn->query($sql) === true) {
    echo "Database created successfully";
    $conn2 = new mysqli($servername, $username, $password, $dbname);
    // 检测连接
    if ($conn2->connect_error) {
        die("Connection failed: " . $conn2->connect_error);
    }

    // admin管理员表
    $sql10 = "CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL COMMENT '管理员id',
  `adminname` varchar(255) NOT NULL COMMENT '管理员名字',
  `password` varchar(255) NOT NULL COMMENT '管理员密码'
)ENGINE=INNODB  DEFAULT CHARSET=utf8";
    // book表
    $sql11 = "CREATE TABLE `book` (
  `id` int(11) NOT NULL COMMENT '书籍id',
  `book_name` varchar(255) DEFAULT NULL COMMENT '书籍名字',
  `type_id` int(11) DEFAULT NULL COMMENT '分类id',
  `author` varchar(255) DEFAULT NULL COMMENT '作者',
  `publish` varchar(255) DEFAULT NULL COMMENT '出版社',
  `price` double(10,2) DEFAULT NULL COMMENT '价格',
  `number` int(11) DEFAULT NULL COMMENT '数量',
  `status` int(11) DEFAULT '1' COMMENT '状态 1上架0下架',
  `remark` varchar(255) DEFAULT NULL COMMENT '简介',
  `floor` varchar(20) DEFAULT NULL COMMENT '馆藏位置'
)ENGINE=INNODB  DEFAULT CHARSET=utf8";
	
    // book_type表
    $sql12 = "CREATE TABLE `book_type` (
  `id` int(11) NOT NULL COMMENT '分类id',
  `type_name` varchar(255) DEFAULT NULL COMMENT '分类名',
  `remark` varchar(255) DEFAULT NULL COMMENT '分类简介'
)ENGINE=INNODB  DEFAULT CHARSET=utf8";
    // borrowdetail表
    $sql13 = "CREATE TABLE `borrowdetail` (
  `tid` int(11) NOT NULL COMMENT '借阅id',
  `user_id` int(11) NOT NULL COMMENT '用户id',
  `book_id` int(11) NOT NULL COMMENT '图书id',
  `status` int(11) NOT NULL COMMENT '状态  1在借2已还',
  `borrow_time` bigint(20) DEFAULT NULL COMMENT '借书时间',
  `return_time` bigint(20) DEFAULT NULL COMMENT '还书时间'
)ENGINE=INNODB  DEFAULT CHARSET=utf8";
    // seat表
    $sql14 = "CREATE TABLE `seat` (
  `id` int(11) NOT NULL COMMENT '座位id',
  `location` varchar(255) DEFAULT NULL COMMENT '楼层位置',
  `static` int(11) DEFAULT NULL COMMENT '预约状态',
  `isnull` varchar(20) DEFAULT NULL COMMENT '预约人'
)ENGINE=INNODB  DEFAULT CHARSET=utf8";
    //user表
    $sql15 = "CREATE TABLE `user` (
  `id` int(11) NOT NULL COMMENT 'id',
  `username` varchar(255) DEFAULT NULL COMMENT '用户名',
  `password` varchar(255) DEFAULT NULL COMMENT '密码',
  `sex` varchar(1) DEFAULT NULL COMMENT '性别',
  `phone` char(11) DEFAULT NULL COMMENT '电话'
)ENGINE=INNODB  DEFAULT CHARSET=utf8";


    // 初始化,插入测试数据
    $sql20 = "INSERT INTO `admin` (`admin_id`, `adminname`, `password`) VALUES
(1, 'admin', 'admin');";
    $sql21 = "INSERT INTO `book` (`id`, `book_name`, `type_id`, `author`, `publish`, `price`, `number`, `status`, `remark`, `floor`) VALUES
(4, '西游记', 3, '吴承恩', '机械工业出版社', 23.00, 212, 1, '四大名著之一', '图书馆二楼'),
(6, 'SpringCloud微服务架构开发', 1, '黑马程序员', '人民邮电出版社', 28.00, 20, 1, '微服务实战开发', '图书馆三楼'),
(7, '水浒传', 3, '施耐庵 ', '人民文学出版社', 29.00, 30, 1, '四大名著之一', '图书馆三楼'),
(8, 'Java基础入门（第2版）', 1, '黑马程序员', '清华大学出版社', 30.20, 22, 1, '提高Java编程功底必备', '图书馆三楼'),
(9, '中国文学编年史', 2, '陈文新', '湖南人民出版社', 35.30, 36, 1, '中国文学编年史', '图书馆三楼'),
(10, 'JavaWeb程序设计任务教程', 1, '黑马程序员', '人民邮电出版社', 25.50, 16, 1, '学好java web的好帮手', '图书馆一楼'),
(11, 'SSH框架整合实战教程', 1, '传智播客高教产品研发部', '清华大学出版社', 59.00, 12, 1, 'SSH项目开发实战', '图书馆三楼'),
(13, '彷徨', 3, '鲁迅', '辽海出版社', 44.60, 16, 1, '鲁迅小说全集系列', '图书馆三楼'),
(14, '呐喊', 3, '鲁迅', '辽海出版社', 44.50, 16, 1, '鲁迅小说全集系列', '图书馆三楼'),
(15, '阿Q正传', 3, '鲁迅', '辽海出版社', 29.00, 33, 1, '鲁迅小说全集系列', '图书馆三楼'),
(20, '热热热', 1, '三木', '新华', 5.00, 20, 1, '阿萨斯', '图书馆二楼');";
    $sql22 = "INSERT INTO `book_type` (`id`, `type_name`, `remark`) VALUES
(1, '技术', '技术类'),
(2, '人文', '人文关怀'),
(3, '小说', '人生情感小说'),
(4, '科幻小说类', '科幻小说');";
	$sql23 = "INSERT INTO `borrowdetail` (`tid`, `user_id`, `book_id`, `status`, `borrow_time`, `return_time`) VALUES
(33, 1, 4, 2, 1644940969, 1645631515),
(34, 1, 6, 2, 1644940971, 1644940989),
(35, 1, 7, 2, 1644940973, 1644940989),
(36, 1, 8, 2, 1644940979, 1644940989),
(37, 1, 9, 2, 1644941085, 1644941094),
(38, 1, 12, 2, 1644941090, 1644941340),
(39, 1, 14, 2, 1644941107, 1644941116),
(40, 1, 4, 2, 1644941295, 1645631515),
(41, 1, 4, 2, 1644941318, 1645631515),
(42, 3, 4, 2, 1645631467, 1645632178),
(43, 3, 14, 1, 1645632212, NULL),
(44, 10, 4, 1, 1668498959, NULL);";
    $sql24 = "INSERT INTO `seat` (`id`, `location`, `static`, `isnull`) VALUES
(1, '图书馆一楼', 1, 'zyj'),
(2, '图书馆三楼', 0, NULL),
(3, '图书馆四楼', 0, ''),
(4, '图书馆二楼', 1, 'javaniu'),
(5, '图书馆一楼', 0, NULL),
(7, '图书馆三楼', 0, NULL),
(8, '图书馆二楼', 0, NULL),
(10, '工程学院一号位', 0, NULL);";
	$sql25 = "INSERT INTO `user` (`id`, `username`, `password`, `sex`, `phone`) VALUES
(2, 'admin', '111111', '男', '13198645975'),
(3, '徐某人', 'xkj123', '女', '13195648529'),
(4, '肖淼', 'sdf78978', '女', '13195698458'),
(5, '张军伟', 'zjw520', '男', '18332456784'),
(6, '杨帆', 'dfd757', '女', '15246598568'),
(7, '九头蛇', 'kkk111', '男', '13194959879'),
(9, '杨飞龙', 'kj12345', '男', '13195864589'),
(10, 'zyj', '14e1b600b1fd579f47433b88e8d85291', '男', '10086');";
    //默认管理员
    //$pass = md5('123456');
    //$sql23 = "insert into users values(1,'admin','" . $pass . "'),(2,'user','" . $pass . "')";

    if ($conn2->multi_query($sql10) && $conn2->multi_query($sql11) && $conn2->multi_query($sql12) &&
        $conn2->multi_query($sql13) && $conn2->multi_query($sql14) && $conn2->multi_query($sql15)
        && $conn2->query($sql20) && $conn2->query($sql21) && $conn2->query($sql22) && $conn2->query($sql23) && $conn2->query($sql24) && $conn2->query($sql25)) {
        echo "insert successfully";
    } else {
        echo "Error insert: " . $conn2->error;
    }
    $conn2->close();
    //安装完成,跳转到主页
    echo "正在跳转到<a href='index.php'>主页</a>";
    header("refresh:1;url=index.php");
} else {
    // 安装失败/重复安装
    echo "Error creating database: " . $conn->error;
}
$conn->close();
?>