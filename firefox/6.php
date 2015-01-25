<?php
//2014-11-24
//寻找表字段的注释，跟表单的title属性值进行对应，然后把汉字替换为表字段，达到自动提交的目的
header('Content-Type:text/html;charset=utf-8');
echo '<pre>'; 
mysql_connect('localhost:3310','root','bhxz');
mysql_query('set names utf8');
mysql_select_db('haiyou');
$sql = 'SHOW FULL COLUMNS FROM haiyou_container_unitinfo';
$result = mysql_query($sql);
$array = mysql_fetch_assoc($result);
// print_r($array);

$rows = array();
$i = 0;
while($row = mysql_fetch_assoc($result)){
	$rows[$i]['Field'] = $row['Field'];
	$rows[$i]['Comment'] = $row['Comment'];
	$i++;
}
// print_r($rows);

$content = file_get_contents('5.html');
// $content = htmlspecialchars($content);
// echo $content;

foreach($rows as $row)
{
	// echo $row['Comment'];
	// echo 'title="'.$row['Comment'].'">';
	// echo '<br>';
	// $content = str_replace('title="'.$row['Comment'].'">','title="'.$row['Field'].'">',$content);
	$content = str_replace('"'.$row['Comment'].'"','"'.$row['Field'].'"',$content);
	$patterns[] = "'/{$row['Comment']}/'";
	$replacements[] = "'{$row['Field']}'";
}
// print_r($patterns);
// print_r($replacements);
// echo preg_replace($patterns,$replacements,$content);
echo $content;
 ?>