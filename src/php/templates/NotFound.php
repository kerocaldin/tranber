<?php

$siteUrl = $siteUrl ?? '';
$imgUrl  = $siteUrl.'images/404.jpg?'.filemtime('images/404.jpg');

?><h1>404 Not Found</h1>

<p><img src="<?= $imgUrl ?>" alt="404 Not Found"></p>