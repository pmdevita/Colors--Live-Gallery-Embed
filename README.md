Colors! Live Gallery Embed
==========================

Embed your gallery from Colors! Live on your website using some php.


I have hosted the php script for convience at srv2.pdevita.net/colors.php (Might change soon)

The URL has three options

srv2.pdevita.net/colors.php?id=123456&background=false&fetch=false

id: this is your user ID. It can be found in the URL when you navigate to your gallery on the Colors! Live website. It is required (obviously).

background: If you want the Colors! Live background in the iframe

fetch: You can cURL, xhtml, ajax or whatever the page. Putting true removes the \<head\> and \<body\> tags.

1) iframe mode

You can embed the script into an iframe on your website.

\<iframe src="http://srv2.pdevita.net/colors.php?id=123456"><\iframe\>

2) fetch mode

You can also insert it into the middle of your page.

  <?php

    $data = file_get_contents('http://srv.pdevita.net/colors.php?id=123456&fetch=true');
  
    echo $data;
    
  ?\>


Thanks and Enjoy!
