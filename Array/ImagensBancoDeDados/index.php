<?php
include('../conn.php');
$sqlGetImages = "SELECT galeria FROM fotos WHERE idfotos='$idfotos'";
$resultImages = $conn->query($sqlGetImages);

if ($resultImages->num_rows > 0) {
    $row = $resultImages->fetch_assoc();
    $imagePaths = explode(',', $row['galeria']);

    if (!empty($imagePaths)) {

        $firstImageDisplayed = false; // Flag para verificar se a primeira imagem válida já foi exibida

        foreach ($imagePaths as $index => $img) {
            $imageSrc = 'galeria/' . $img;
            $extension = strtolower(pathinfo($imageSrc, PATHINFO_EXTENSION));

            if (!$firstImageDisplayed && in_array($extension, ['jpg', 'jpeg', 'png'])) {
                echo '<div class="swiper-slide">
                        <img src="' . $imageSrc . '" alt="image" id="custom-image" class="custom-image rounded-4 col-12 object-cover">
                      </div>';
                $firstImageDisplayed = true; // Marca a primeira imagem válida como exibida

            } elseif ($firstImageDisplayed && in_array($extension, ['jpg', 'jpeg', 'png'])) {
                $class = 'rounded-4 col-12 h-full object-cover';
                
                echo '<div class="swiper-slide">
                        <img src="' . $imageSrc . '" id="custom-image" alt="image" class="' . $class . '">
                      </div>';
            }
        }


    }
}$conn->close();
?>
