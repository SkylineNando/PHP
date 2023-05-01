<html>

<head>
	<title>Home</title>
	<meta charset="utf-8">
</head>

<body>
	<?php
	$url = (isset($_GET['url'])) ? $_GET['url'] : 'home.php';
	$url = array_filter(explode('/', $url));
	//var_dump($url);

	$file = $url[0] . '.php';
	//var_dump($file);

	if (is_file("paginas/" . $file)) {
		include "paginas/" . $file;
	} else {
		include 'paginas/404.php';
	}
	?>
</body>

</html>
