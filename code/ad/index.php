
<!DOCTYPE html>
<html>
<style>
	div {
		height:200px;
        /*width: 100px;*/
        background-color: #8fd19e;
	}
    a {
        float: right;
    }
</style>
<head>
	<title>广告</title>
</head>
<body>
<?php if (empty($_COOKIE['hide_ad']) || $_COOKIE['hide_ad'] != 1): ?>
    <div>
        <a href="close.php">关闭广告</a>
    </div>
<?php endif ?>


</body>
</html>