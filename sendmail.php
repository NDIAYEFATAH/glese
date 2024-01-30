<?php
//
// *** To Email ***
$to = 'abdoufatahndiaye234@gmail.com';
//
// *** Subject Email ***
$subject = 'Verification';
//
// *** Content Email ***
$content = 'Sa thiaya baye laa wakh';
//
//*** Head Email ***
$headers = "fatahndiaye234@gmail.com";
//
//*** Show the result... ***
if (mail($to, $subject, $content, $headers))
{
	echo "Success !!!";
} 
else 
{
   	echo "ERROR";
}