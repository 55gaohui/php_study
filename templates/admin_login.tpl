<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-05-08
 * Time: 8:40
 */
?>
<!DOCTYPE html
        PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; chartser=utf-8" >
    <title>main</title>
    <link rel="stylesheet" type="text/css" href="../style/admin.css">
    <script type="text/javascript" src="../js/admin_login.js"></script>
</head>
<body>
    <form action="?action=login" method="post" id="admin_login" name="login">
        <fieldset>
            <legend>登录CMS后台管理系统</legend>
            <label>账&nbsp;&nbsp;&nbsp;号：<input type="text" name="admin_user" class="text"></label>
            <label>密&nbsp;&nbsp;&nbsp;码：<input type="password" name="admin_pass" class="text"></label>
            <label>验证码：<input type="text" name="code" class="text"></label>
            <label class="t">输入下图的字符，不区分大小写</label>
            <label><img src="../config/code.php" alt="验证码" onclick="javascript:this.src='../config/code.php?tm='+Math.random();"></label>
            <input type="submit" value="登录" class="submit" name="send" onclick="return checkLogin();">
        </fieldset>
    </form>
</body>
</html>