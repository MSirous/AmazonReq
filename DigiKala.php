<?php
/**
 * Created by PhpStorm.
 * User: Msirous
 * Date: 9/10/18
 * Time: 12:19 PM
 */

//echo "test";


// Create DOM from URL or file
include ("simple_html_dom.php");
$html = file_get_html("https://www.digikala.com/product/dkp-90825");

// Show Me all of Text in Digikala.
//echo $html->plaintext;

// Show Title On top Of The site.
$title = $html->find("title",0)->innertext;
echo "<html dir = rtl>".$title . "</html>";
