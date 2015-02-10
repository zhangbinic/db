<?php 
$field = $_GET['field'];
$tablename = $_GET['table'];

$search = array(' ','（','）');
$replace = array('','(',')');

$field = str_replace($search,$replace,$field);

$field = rtrim($field,'||');

// echo $field;

$fieldarr = explode('||',$field);

$sql = '';
foreach($fieldarr as $v)
{
	$tablearr = explode(':',$v);
	$comment = $tablearr[0];
	$name = $tablearr[1];
	$type = $tablearr[2];

	$sql .= "`{$name}` {$type} COMMENT '{$comment}',";
}
// echo $sql;
$sql .= '`id` int(11) NOT NULL AUTO_INCREMENT,PRIMARY KEY (`id`)';
$executesql = "DROP TABLE IF EXISTS `{$tablename}`;CREATE TABLE `{$tablename}` ({$sql}) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='{$tablename}';";
// print_r($fieldarr);
// echo $executesql;
file_put_contents("E:/1.sql", $executesql);
mysql_connect('localhost:3310','root','bhxz');
mysql_select_db('test');
mysql_query('set names utf8');
$content = file_get_contents('E:/1.sql');
// echo $content;die;
$result = mysql_query($content);
var_dump($result);