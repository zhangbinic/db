<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>处理文字对应的表单元素替换</title>
</head>
<body>
	
</body>
</html>
<?php 
$string = file_get_contents('2.html');
// echo $string;

$patterns = array();
$patterns[0] = '/选择栏位/';
$patterns[1] = '/文本类型/';
$patterns[2] = '/日期类型/';
$patterns[3] = '/数字类型/';
$patterns[4] = '/压力容器简图/';

$replacements = array();
$replacements[0] = '<select title=""><option>选择栏位</option></select>';
$replacements[1] = '<input title="" type="text" value="文本类型">';
$replacements[2] = '<input title="" onclick="WdatePicker();" type="text" value="日期类型">';
$replacements[3] = '<input title="" type="text" value="数字类型">';
$replacements[4] = '<img src="__Public/image/plantdemo.jpg" alt="" width="300">';

echo preg_replace($patterns, $replacements, $string);

//写入文件中
$donehtml = preg_replace($patterns, $replacements, $string);
file_put_contents('4.html', $donehtml);
 ?>