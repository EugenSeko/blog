<?php

function articles_all($link){
	//Запрос
	$query = "SELECT * FROM articles ORDER BY id";
	$result = mysqli_query($link, $query);

	if(!$result)
		die(mysqli_error($link));

	// Извлечение из БД.
	$n = mysqli_num_rows($result);
	$articles = array();

	for ($i=0; $i < $n; $i++) { 
		$row = mysqli_fetch_assoc($result);
		$articles[] = $row;
	}
	return $articles;
}


function articles_get($link, $id_article){
	// Запрос
	$query = sprintf("SELECT * FROM articles WHERE id=%d", (int)$id_article);
	$result = mysqli_query($link, $query);

	if (!$result) 
		die(mysqli_error($link));
	
	$article = mysqli_fetch_assoc($result);

    return $article;
}
function articles_new($link, $title, $date, $content){
	// Подготовка
	$title = trim($title);
	$content = trim($content);

	// Проверка
	if($title == '')
	 return false;

    // Задание перменной id
    $query1 = "SELECT MAX(id) AS id FROM articles";
	$result1 = mysqli_query($link, $query1);

	if(!$result1)
		die(mysqli_error($link));

       $n = mysqli_fetch_array($result1);
       $n1 = "$n[id]";
       echo "max id =  $n1<br>"; 
       $n1++;
       echo " new id =  $n1";
       $id = $n1;
		
	// Запрос
	$t = "INSERT INTO articles (id, title, date, content) VALUES ('%s', '%s', '%s', '%s')";

	$query = sprintf($t,mysqli_real_escape_string($link, $id), 
		mysqli_real_escape_string($link, $title), mysqli_real_escape_string($link, $date),
		mysqli_real_escape_string($link, $content));
	echo $query;
	$result = mysqli_query($link, $query);
	if(!$result)
		die(mysqli_error($link));

	return true;
}
function articles_edit($link, $id, $title, $date, $content){
    // Подготовка
	$title = trim($title);
	$content = trim($content);
	$date = trim($date);
	$id = trim($id);
	// Проверка
	if($title == '') return false;

	// Запрос
	$sql = "UPDATE articles SET title='%s', content='%s', date='%s' WHERE id='%d'";

	$query = sprintf($sql, mysqli_real_escape_string($link, $title),
		                   mysqli_real_escape_string($link, $content),
		                   mysqli_real_escape_string($link, $date),
	                       $id);

	$result = mysqli_query($link, $query);

	if(!$result)
		die(mysqli_error($link));

	return mysqli_affected_rows($link);

}
function articles_delete($link, $id){
	$id = (int)$id;
	// Проверка
	if($id == 0) return false;

	// Запрос
	$query = sprintf("DELETE FROM articles WHERE id = '%d'", $id);
	$result = mysqli_query($link,$query);

	if(!$result)
		die(mysqli_error($link));

	return mysql_affected_rows($link);
}
function articles_intro($text, $slen = 500){
	return mb_substr($text, 0, $slen);
}

