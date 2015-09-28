<!DOCTYPE html>
<html>
 <head>
 	<meta charset="utf8">
 	<title>Мой Первый Блог</title>
 	<link rel="stylesheet" type="text/css" href="style.css">
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
 </head>

 <body>
 	<div class = "container">
 		<h1>Мой первый блог</h1>
 		<div>
 			<div class = "article">
 				<h3><?=$article['title']?></h3>
 				<em>Опубликовано: <?=$article['date']?></em>
 				<p><?=$article['content']?></p>
 			</div>
 		</div>
 		<footer>
 			<p>Мой Первый Блог<br>Copyright &copy; 2015</p>
 		</footer>
 	</div>
 </body>


</html>