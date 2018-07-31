<script id="container" name="content" type="text/plain">
        这里写你的初始化内容
</script>
<script type="text/javascript" src="ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="ueditor/_examples/editor_api.js"></script>
<script type="text/javascript">
    var editor = UE.getEditor('container');
</script>
<?php
    echo @$_POST['content'];
?>
<form action="" method="post">
    <textarea id="container" style="width:630px;height:220px;"></textarea>
</form>