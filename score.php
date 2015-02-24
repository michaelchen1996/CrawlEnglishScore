<?php
	$num = $_POST["num"];
	if ($num!="") {
		$fh = file_get_contents('http://scdxwyxy.gicp.net:800/system/Search/chech.asp', 'r');
		$index = strpos($fh, $num);
		#echo $index;
		$flag=true;
		for ($i=0; i<strlen($num); $i++) {
			if ($fh[$index+$i]!=$num[$i]) {
				$flag=false;
				break;
			}
		}
		if ($fh[$index-1]=='>' && flag && $fh[$index+strlen($num)]=='<') {
			#echo 'find it';
			while ($fh[$index]!="'") {
				$index--;
			}
			$index--;
			$url="";
			while ($fh[$index]!="'") {
				$url = $fh[$index].$url;
				$index--;
			}
			$url = "http://scdxwyxy.gicp.net:800/system/Search/".$url;
			#echo $url;
			#file_get_contents($url, 'r')
			echo "<iframe src='".$url."'>iframe can't open.</iframe>";
		} else {
			echo "can't find it.";
		}
	}
?>

<html>
	<head>
		<meta charset = utf-8>
		<title>半期考试成绩查询</title>
	</head>
	<body>
		<form action='' method='post'>
			Student Number:<input type='text' name='num'>
			<input type='submit'>
		</form>
	<body>
<html>