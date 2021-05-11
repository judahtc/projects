<!doctype html>
<html>
<head>
<style>
table td input[type="text"]{
margin-left:0;
margin-right:0;
padding-left:0;
padding-right:0;
background-color:gray;
border-collapse:collapse;
}
</style>
<title>try</title>
</head>
<body>
<form method="post" action="#" target="_self">
<table>
<tr>
	<th>name</th><th>price</th><th>date</th><th>total</th>
</tr>
<tr>

<td><input type="text" name="one"  value="<?PHP $one=$_POST['one']; echo($one);?>"></td>
<td><input type="text" name="two" value="<?php $two=$_POST['two']; echo($two); ?>"></td>
<td><input type="text" name="three" value="<?PHP $three=$_POST['three']; echo($three);?>"></td>
<td><?php $one=$_POST['one']; $three=$_POST['three']; $two=$_POST['two']; if(isset($_POST['one'])){$total=$one+$two+$three;echo($total);}?></td>
</tr>

</table>

<button type="submit" name="add">add</button>
</form>
</body>
</html>