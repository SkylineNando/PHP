<?php

//Set this to be your site map URL
$sitemapUrl = "http://www.example.com/sitemap.xml";

// cUrl handler to ping the Sitemap submission URLs for Search Engines…
function myCurl($url){
  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_exec($ch);
  $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
  curl_close($ch);
  return $httpCode;
}

//Google
$url = "http://www.google.com/webmasters/sitemaps/ping?sitemap=".$sitemapUrl;
$returnCode = myCurl($url);
echo "<p>Google Sitemaps has been pinged (return code: $returnCode).</p>";



function return_code_check($pingedURL, $returnedCode) {

    $to = "webmaster@yoursite.com";
    $subject = "Sitemap ping fail: ".$pingedURL;
    $message = "Error code ".$returnedCode.". Go check it out!";
    $headers = "From: hello@yoursite.com";

    if($returnedCode != "200") {
        mail($to, $subject, $message, $headers);
    }
}

?>
