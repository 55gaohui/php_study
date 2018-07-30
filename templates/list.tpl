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
    <title>CMS内容管理系统</title>
    <link rel="stylesheet" type="text/css" href="style/baisc.css">
    <link rel="stylesheet" type="text/css" href="style/list.css">
</head>
    <body>
    {include file="header.tpl"}
        <div id="list">
            <h2>当前位置 &gt; {$nav}</h2>
            <dl>
                <dt><img src="images/none_img.jpg" alt=""></dt>
                <dd>[<strong>军事动态</strong>] <a href="">联合利华因散布涨价信息被罚200W</a></dd>
                <dd>日期：2018年07月25日 08:55:23 点击率：220 好评：0</dd>
                <dd>归属感没事干没事干快乐时光上过课输卵管马赛克了归属感上过课了帅刚莫斯科的栏杆上打了个大规模速度快老帅刚莫斯科的栏杆上打了个大规模速度快老三个快乐时光了看帅刚莫斯科的栏杆上打了个大规模速度快老干妈啥都贵实时哥是感冒是看了闺蜜三个没事了看闺蜜三个...</dd>
            </dl>
            <dl>
                <dt><img src="images/none_img.jpg" alt=""></dt>
                <dd>[<strong>军事动态</strong>] <a href="">联合利华因散布涨价信息被罚200W</a></dd>
                <dd>日期：2018年07月25日 08:55:23 点击率：220 好评：0</dd>
                <dd>归属感没事干没事干快乐时光上过课输卵管马赛克了归属感上过课了帅刚莫斯科的栏杆上打了个大规模速度快老帅刚莫斯科的栏杆上打了个大规模速度快老三个快乐时光了看帅刚莫斯科的栏杆上打了个大规模速度快老干妈啥都贵实时哥是感冒是看了闺蜜三个没事了看闺蜜三个...</dd>
            </dl>
            <dl>
                <dt><img src="images/none_img.jpg" alt=""></dt>
                <dd>[<strong>军事动态</strong>] <a href="">联合利华因散布涨价信息被罚200W</a></dd>
                <dd>日期：2018年07月25日 08:55:23 点击率：220 好评：0</dd>
                <dd>归属感没事干没事干快乐时光上过课输卵管马赛克了归属感上过课了帅刚莫斯科的栏杆上打了个大规模速度快老帅刚莫斯科的栏杆上打了个大规模速度快老三个快乐时光了看帅刚莫斯科的栏杆上打了个大规模速度快老干妈啥都贵实时哥是感冒是看了闺蜜三个没事了看闺蜜三个...</dd>
            </dl>
            <dl>
                <dt><img src="images/none_img.jpg" alt=""></dt>
                <dd>[<strong>军事动态</strong>] <a href="">联合利华因散布涨价信息被罚200W</a></dd>
                <dd>日期：2018年07月25日 08:55:23 点击率：220 好评：0</dd>
                <dd>归属感没事干没事干快乐时光上过课输卵管马赛克了归属感上过课了帅刚莫斯科的栏杆上打了个大规模速度快老帅刚莫斯科的栏杆上打了个大规模速度快老三个快乐时光了看帅刚莫斯科的栏杆上打了个大规模速度快老干妈啥都贵实时哥是感冒是看了闺蜜三个没事了看闺蜜三个...</dd>
            </dl><dl>
                <dt><img src="images/none_img.jpg" alt=""></dt>
                <dd>[<strong>军事动态</strong>] <a href="">联合利华因散布涨价信息被罚200W</a></dd>
                <dd>日期：2018年07月25日 08:55:23 点击率：220 好评：0</dd>
                <dd>归属感没事干没事干快乐时光上过课输卵管马赛克了归属感上过课了帅刚莫斯科的栏杆上打了个大规模速度快老帅刚莫斯科的栏杆上打了个大规模速度快老三个快乐时光了看帅刚莫斯科的栏杆上打了个大规模速度快老干妈啥都贵实时哥是感冒是看了闺蜜三个没事了看闺蜜三个...</dd>
            </dl>
            <div id="page">分页</div>
        </div>

    <div id="sidebar">
        <div class="nav">
            <h2>子栏目列表</h2>
            {if $childnav}
                {foreach $childnav(key,value)}
                    <strong><a href="list.php?id={@value->id}">{@value->nav_name}</a></strong>
                {/foreach}
            {else}
                <span>该栏目没有子类</span>
            {/if}
        </div>
        <div class="right">
            <h2>本类推荐</h2>
            <ul>
                <li><i></i><a href="">银监会否认首套房贷首付将提至...</a><em>06-20</em></li>
                <li><i></i><a href="">了戈麦斯方式，廊坊发顺丰老地...</a><em>06-15</em></li>
                <li><i></i><a href="">烦得很煽风点工会经费广告费个...</a><em>05-28</em></li>
                <li><i></i><a href="">高房价的高房价的钢结构个个规划...</a><em>05-23</em></li>
                <li><i></i><a href="">粉红色发过火发过火覆盖广泛...</a><em>05-10</em></li>
                <li><i></i><a href="">电饭锅和股东会电饭锅和回复...</a><em>05-08</em></li>
                <li><i></i><a href="">风格和东方红东方红发 符合地方.</a><em>05-01</em></li>
            </ul>
        </div>
        <div class="right">
            <h2>本类热点</h2>
            <ul>
                <li><i></i><a href="">银监会否认首套房贷首付将提至...</a><em>06-20</em></li>
                <li><i></i><a href="">了戈麦斯方式，廊坊发顺丰老地...</a><em>06-15</em></li>
                <li><i></i><a href="">烦得很煽风点工会经费广告费个...</a><em>05-28</em></li>
                <li><i></i><a href="">高房价的高房价的钢结构个个规划...</a><em>05-23</em></li>
                <li><i></i><a href="">粉红色发过火发过火覆盖广泛...</a><em>05-10</em></li>
                <li><i></i><a href="">电饭锅和股东会电饭锅和回复...</a><em>05-08</em></li>
                <li><i></i><a href="">风格和东方红东方红发 符合地方.</a><em>05-01</em></li>
            </ul>
        </div>
        <div class="right">
            <h2>本类图文</h2>
            <ul>
                <li><i></i><a href="">银监会否认首套房贷首付将提至...</a><em>06-20</em></li>
                <li><i></i><a href="">了戈麦斯方式，廊坊发顺丰老地...</a><em>06-15</em></li>
                <li><i></i><a href="">烦得很煽风点工会经费广告费个...</a><em>05-28</em></li>
                <li><i></i><a href="">高房价的高房价的钢结构个个规划...</a><em>05-23</em></li>
                <li><i></i><a href="">粉红色发过火发过火覆盖广泛...</a><em>05-10</em></li>
                <li><i></i><a href="">电饭锅和股东会电饭锅和回复...</a><em>05-08</em></li>
                <li><i></i><a href="">风格和东方红东方红发 符合地方.</a><em>05-01</em></li>
            </ul>
        </div>
    </div>
    {include file='footer.tpl'}
    </body>
</html>