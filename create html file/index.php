<?php

$html="<html>
<head>
   <title>My HTML File</title>
</head>
<body>
   <h1>Welcome to my website</h1>
   <p>This is an example paragraph.</p>
</body>
</html>";


$file = 'myfile.html';
file_put_contents($file, $html);


if (file_exists($file) && is_file($file)) {
     echo "The file $file was successfully created!";
   } else {
     echo "There was an error creating the file $file.";
   }
?>
