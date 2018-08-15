<!--<html dir="rtl">-->
<form method="get">
    <label>DATA-ASIN: <input name="asin"></label>
</form>
<?php
/**
 * Created by PhpStorm.
 * User: Msirous
 * Date: 8/2/18
 * Time: 8:46 PM
 */

$asin = filter_input(INPUT_GET, 'asin');
if (!empty($asin)) {
    echo "<hr>";
    $baseUrl = "http://www.amazon.com/gp/product/";
    $html = file_get_contents($baseUrl . $asin);

    // Title of products.
    $titleMatch = preg_match("/<span id=\"productTitle\"[^>]*?>([^<]+)<\/span/s",
        $html, $regs);

    echo " <h4> title of Products: </h4>";
    echo "{$regs[0]}";
    echo "<br />";
    echo "<br />";

    // Image of products.
    $imgMatch = preg_match_all('!"hiRes":"(https://images-na\.ssl-images-amazon\.com/images/I/[^"]+\.jpg)"!',
        $html, $immatch);

    if ($imgMatch && isset($immatch[1])) {
        foreach ($immatch[1] as $img) {
            echo "<img src='$img' width='200px'>";
        }
    }

    // bullet Key Features
    $isMatched = preg_match_all('#<ul class="a-unordered-list a-vertical a-spacing-none">.+?</ul>#is',
        $html, $matches[0]);
    $title = null;
    if ($isMatched && isset($matches[0])) {
        foreach ($matches[0] as $match) {
            echo $match[0];
        }
    }
}
?>
<!--</html>-->
