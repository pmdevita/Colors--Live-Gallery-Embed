<?php
//Get all the data
$id = $_GET['id'];
$background = $_GET['background'];
$fetchdata = $_GET['fetch'];

//ID is required
if (!strlen($id)) {
die("no id");
}

//Formating for iframes
if (!$fetchdata) {
echo "<html>
    <head>";
}
//Important CSS
echo "<link href='http://colorslive.com/css/main.css' rel='stylesheet' type='text/css'>";

//Background image available on request and disabled for fetch
if (!$background or $fetchdata) {
	echo "<style type='text/css'>
body {
	background-image:url('');
}
</style>";
}

//More iframe formatting
if (!$fetchdata) {
echo "</head>
<body>";
}

//Catch stray javascript functions
echo "<script>
function mouseOverGallery(a) {
return true;
}
function mouseOutGallery(a) {
return true;
}
</script>";

//Get the painting data and format it
$colors = file_get_contents('http://colorslive.com/author?id=' . $id);
$left = strpos($colors,"<div class='paintingThumbContainer'>");
$right = strpos($colors,"<div class='paintingListLoadWrapper' id='paintingListLoadWrapper'>");
$right = $right - $left;
$output = substr($colors, $left, $right);

//Fix the URLs
$location = 0;
while ($location < strlen($output)) {
    $src = strpos($output,"src='/images/thumbnail_placeholder.png'",$location);
    $output = substr_replace($output,"", $src + 5, 50);
    $location = $src + 10;
    if (!$src) {
        $location = strlen($output) + 5;
    } else {
        $location = $src + 10;
    }
}
$location = 0;
while ($location < strlen($output)) {
    $src = strpos($output,"href='",$location);
    $output = substr_replace($output,"http://colorslive.com", $src + 6, 0);
    $location = $src + 10;
    if (!$src) {
        $location = strlen($output) + 5;
    } else {
        $location = $src + 10;
    }
}

echo $output;



//More iframe formatting
if (!$fetchdata) {
echo "
    </body>
</html>";
}
?> 
