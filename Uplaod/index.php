<?php
$object_dir = "img/";
$object_file = $object_dir . basename($_FILES["fileToUpload"]["name"]);
$up_file = 1;
$imageFileType = strtolower(pathinfo($object_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $up_file = 1;
  } else {
    echo "File is not an image.";
    $up_file = 0;
  }
}

// Check if file already exists
if (file_exists($object_file)) {
  echo "Sorry, file already exists.";
  $up_file = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $up_file = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $up_file = 0;
}

// Check if $up_file is set to 0 by an error
if ($up_file == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $object_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}

?>
