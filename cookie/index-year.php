<?php
// Sets the expiration date to 1 year from now
$expiry = time() + (365 * 24 * 60 * 60);

// Sets the cookie value
$value = 'my_cookie';

// Defines the name of the cookie
$name = 'cookie_name';

//Set the cookie path to '/'
$path = '/';

//Set the cookie domain to '.mydomain.com'
$domain = '.mydomain.com';

// Defines whether the cookie can only be accessed over HTTPS
$secure = true;

// Defines whether the cookie can only be accessed by the same domain
$httpOnly = true;

// Set the cookie to the above values
setcookie($name, $value, $expiry, $path, $domain, $secure, $httpOnly);


if (isset($_COOKIE['my-cookie'])) {
    $valor = $_COOKIE['my-cookie'];
    // Do something with the cookie value
    echo $valor;
}
?>
