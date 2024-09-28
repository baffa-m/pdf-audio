<?php

include('class.pdf2text.php');
$a = new PDF2Text();
$a->setFilename('book.pdf'); 
$a->decodePDF();
echo $a->output(); 


?>