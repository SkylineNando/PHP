<?php
    //Current date and time
    $datetime = new DateTime(date('Y-m-d H:i:s'));
    // The line below returns me a date in the following format: 2017-11-22T00:06:23-02:00
    $date = $datetime->format(DateTime::ATOM); // ISO8601   

    $xml = '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
    <!--  created with Free Online Sitemap Generator www.xml-sitemaps.com  -->
    <url>
    <loc>www.YOUR URL.com.br</loc>
    <lastmod>'.$date.'</lastmod>
    <priority>1.00</priority>
    </url>
    <url>
    <loc>https://www.YOUR URL.com.br/Quartos&Suites</loc>
    <lastmod>'.$date.'/lastmod>
    <priority>0.80</priority>
    </url>
    <url>
    <loc>https://www.YOUR URL.com.br/ChapadaDosVeadeiros</loc>
    <lastmod>'.$date.'</lastmod>
    <priority>0.80</priority>
    </url>
    <url>
    <loc>https://www.YOUR URL.com.br/Atividades&Aventuras</loc>
    <lastmod>'.$date.'</lastmod>
    <priority>0.80</priority>
    </url>
    <url>
    <loc>https://www.YOUR URL.com.br/Contato</loc>
    <lastmod>'.$date.'</lastmod>
    <priority>0.80</priority>
    </url>
    </urlset>';

    $FILE = fopen('sitemap.xml', 'w');
    if (fwrite($FILE, $xml)) {
        echo "sitemap.xml file created successfully";
    } else {
        echo "Could not create file. Check directory permissions.";
    }
    fclose($FILE);

 
    $data = implode("", file("sitemap.xml"));
    $gzdata = gzencode($data, 9);
    $fp = fopen("sitemap.xml.gz", "w");
    fwrite($fp, $gzdata);
    fclose($fp);
?>
