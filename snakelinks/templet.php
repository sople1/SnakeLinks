<?
header('HTTP/1.1 301 Moved Permanently');
header("Location: http://www.floraw.com");
?>
<html>
<head>
<title>SnakeLinks::Open Source Short Link Application</title>
</head>
<body>
<p>Now Loading <a href="<?=$SLK["target"]?>"><?=$SLK["target"]?></a>... </p>
</body>
</html>