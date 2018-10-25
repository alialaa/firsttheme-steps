<?php

require_once('lib/helpers.php');
require_once('lib/enqueue-assets.php');

function after_pagination() {
	echo 'kaljfelji';
}

function after_pagination2() {
	echo 'kaljfelji545454';
}

add_action( '_themename_after_pagination', 'after_pagination' );
add_action( '_themename_after_pagination', 'after_pagination2' );


?>