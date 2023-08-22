<?php
// Função para verificar se o dispositivo é um smartphone
function isSmartphone() {
    $userAgent = $_SERVER['HTTP_USER_AGENT'];
    $smartphoneKeywords = array(
        'Android', 'webOS', 'iPhone', 'iPad', 'iPod', 'BlackBerry', 'IEMobile', 'Opera Mini'
    );

    foreach ($smartphoneKeywords as $keyword) {
        if (strpos($userAgent, $keyword) !== false) {
            return true;
        }
    }

    return false;
}

// Verificar se é smartphone ou computador
if (isSmartphone()) {
    echo "É um smartphone.";
} else {
    echo "É um computador.";
}
?>
