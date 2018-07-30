<div id="top">
    {$title}
    <a href="">这里可以放置文字广告1</a>
    <a href="">这里可以放置文字广告2</a>
</div>
<div id="header">
    <h1><a href="">我的网站</a></h1>
    <div class="adver"><a href=""><img src="img/52.jpg" alt="头广告"></a></div>
</div>
<div id="nav">
    <ul>
        <li><a href="">首页</a></li>
        {if $FrontNav}
            {foreach $FrontNav(key,value)}
                <li><a href="list.php?id={@value->id}">{@value->nav_name}</a></li>
            {/foreach}
        {/if}
    </ul>
</div>
<div id="search">
    <form action="">
        <select name="search">
            <option selected>按标题</option>
            <option>按关键字</option>
            <option>全局查询</option>
        </select>
        <input type="text" name="keyword" class="text">
        <input type="submit" name="send" class="submit" value="搜索">
    </form>
    <strong>TAG标签：</strong>
    <ul>
        <li><a href="">基金(3)</a></li>
        <li><a href="">美女(3)</a></li>
        <li><a href="">白兰地(1)</a></li>
        <li><a href="">音乐(2)</a></li>
        <li><a href="">体育(1)</a></li>
        <li><a href="">直播(1)</a></li>
        <li><a href="">会晤(2)</a></li>
        <li><a href="">韩日(1)</a></li>
        <li><a href="">警方(2)</a></li>
        <li><a href="">广州(1)</a></li>
    </ul>
</div>