<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<?php
    echo @$_POST['content'];
?>
<form action="" method="post">
    <textarea id="TextArea1" class="ckeditor" name="content">
        
    </textarea>
    <input type="submit" value="提交" />
</form>