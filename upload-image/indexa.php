<?php
    // $i=0;
    // while(!file_exists('README.txt')){
    //     chdir("..");
    //     $i--;
    // }
    // header("Location: ".substr($_SERVER['PHP_SELF'],0,strrpos(dirname($_SERVER['PHP_SELF']),'/',$i)));
	// $parent = basename(dirname($_SERVER['PHP_SELF']));
	// var_dump($_SERVER['SERVER_NAME']);

	header("location:".$_SERVER['SERVER_NAME']);

?>