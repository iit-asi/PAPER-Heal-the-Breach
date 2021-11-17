<?php
//Rafael Palacios Jun/2021
//Interface to call https://apps.icai.comillas.edu/owa/ and manipulate the output to change output length


//Parameters for the call to the original owa URL
$canary="";
if (isset($_GET['canary'])) $canary=$_GET['canary'];

//Call the webpage and store response
$page = file_get_contents("https://apps.icai.comillas.edu/owa/?canary={$canary}");

//Check if the browser (or caller) accepts gzip enconding
$accept_encoding = @getallheaders()['Accept-Encoding'];
//print_r($accept_encoding);
if (strpos($accept_encoding,"gzip")===false) {
	//gzip not supported
	//I skip the compression phase
	header('Content-Type: text/html; charset=UTF-8');
	header('Content-Length: '.strlen($page));
	echo $page;
	die();
}

//Unique filenames to allow concurrency
$filename=uniqid();


//Apply standard gzip
file_put_contents("tmp/response_{$filename}.html",$page);
exec("gzip -nf tmp/response_{$filename}.html 2>&1",$output,$state);
if ($state != "0") {
	print("<b>ERROR executing gzip:</b>");
	print_r($output);
	die("dead.");
}



//Apply gzip-randomizer
exec("./gzip-randomizer tmp/response_{$filename}.html.gz 10 2>&1",$output,$state);  //number 10 here is the maximum length added
if ($state != "0") {
	print("<b>ERROR executing gzip-randomizer:</b>");
	print_r($output);
	die("dead.");
}



//If everything was fine, return output
$filenamegz2="tmp/response_{$filename}.html.gz2";    ///////////////////   2
$page_gz=file_get_contents($filenamegz2);
header('Content-Type: text/html; charset=UTF-8');
header('Content-Encoding: gzip');
header('Content-Length: '.filesize($filenamegz2));
echo $page_gz;

//clear garbage
unlink("tmp/response_{$filename}.html.gz");
unlink("tmp/response_{$filename}.html.gz2");

?>