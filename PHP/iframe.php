<!doctype html>
<html>
<head>
<title>iframes</title>
<link rel="stylesheet" href="iframe.css">
<meta name="viewport" content="width=device-width,initial-scale=1">
</title>

<body ><center>
<form method="post" action="#" target="top">
<div style="background-color:pink ;text-align:center" class="t">
<a href="lecturer.php"  target="right" >Lecturer</a>
<a href="responsive.php"  target="right">Staff</a>
<a href="students.php" target="right">Student</a>
</div>
</center>
<iframe  name="right" style="width:100%;overflow:hidden" height="700" scrolling="no" frameborder="no" src="students.php"></iframe>
</form>

</body>
</html>