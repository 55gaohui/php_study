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
    <script type="text/javascript" src="../js/admin_level.js"></script>
</head>
<body id="main">
    <div class="map">
        内容管理>>查看文档列表>><strong title="{$title}" id="title">{$title}</strong>
    </div>
    <ol>
        <li><a href="content.php?action=show" class="selected">文档列表</a></li>
        <li><a href="content.php?action=add">新增文档</a></li>
        {if $update}
            <li><a href="content.php?action=update&id={$id}">修改文档</a></li>
        {/if}
    </ol>
    {if $add}
        <form action="" method="post">
            <table cellspacing="0" class="content">
                <tr><th><strong>发布一条新文档</strong></th></tr>
                <tr><td>文档标题：<input type="text" name="title" class="text" /></td></tr>
                <tr>
                    <td>栏&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;目：
                        <select name="nav" id="">
                            <option value="">请选择一个栏目类别</option>
                        </select>
                    </td>
                </tr>
                <tr><td>定义属性：<input type="checkbox" name="top" value="头条"/>头条
                        <input type="checkbox" name="rec" value="推荐"/>推荐
                        <input type="checkbox" name="bold" value="加粗"/>加粗
                        <input type="checkbox" name="skin" value="跳转"/>跳转
                </td></tr>
                <tr><td>TAG标签：<input type="text" name="tag" class="text" /></td></tr>
                <tr><td>关&nbsp;&nbsp;键&nbsp;字：<input type="text" name="keyword" class="text" /></td></tr>
                <tr><td>缩&nbsp;&nbsp;略&nbsp;图：<input type="text" name="thumbnail" class="text" /></td></tr>
                <tr><td>文章来源：<input type="text" name="source" class="text" /></td></tr>
                <tr><td>作&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;者：<input type="text" name="author" class="text" /></td></tr>
            </table>
        </form>
    {/if}
</body>
</html>