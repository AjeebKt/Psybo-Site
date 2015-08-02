<?php 
/*
|---------------------
| Validate URL Regular Expression
|---------------------
*/
 
function get_valid_url( $url ) {
 
    $regex = "/^(((https?)\:\/\/\/?)|www\.)([a-zA-Z0-9-.]*)\.([a-z]{2,3})(\/([a-zA-Z0-9+\$_-]\.?)+)*\/?$/"; // Scheme
    // $regex .= "([a-z0-9+!*(),;?&=\$_.-]+(\:[a-z0-9+!*(),;?&=\$_.-]+)?@)?"; // User and Pass
    /// $regex .= "([a-zA-Z0-9-.]*)\.([a-z]{2,3})"; // Host or IP
    // $regex .= "(\:[0-9]{2,5})?"; // Port
    ///$regex .= "(\/([a-zA-Z0-9+\$_-]\.?)+)*\/?"; // Path
    // $regex .= "(\?[a-z+&\$_.-][a-z0-9;:@&%=+\/\$_.-]*)?"; // GET Query
    // $regex .= "(#[a-z_.-][a-z0-9+\$_.-]*)?"; // Anchor

 
    // return preg_match("/^$regex$/", $url);
    return preg_match($regex, $url);

 
}
 
// $urls = array('www.plus.google.com/+ukK/about',);
// $urls = array('https://plus.google.com/+AjeebKTajb/about/aheerf');
$urls = array('www.in.linkedin.com/in/noushid');
/*
|---------------------
| Different URLs
|---------------------
*/
 
// $urls = array(
//             'http://www.tutorialchip.com/',
//             'http://www.tutorialchip.com/php-csv-parser-class/#tab-description',
//             'http://www.google.com/search?hl=en&source=hp&biw=1366&bih=515&q=chip+zero+wordpress+theme&aq=f&aqi=&aql=&oq=',
//             'ftp://some.domaon.co.uk/',
//             'wwwhellocom',
//             'tcp://www.domain.org',
//             'http://wordpress.org',
//             'https:www.secure.net',
//             'https://.com',
//             'https://www.lock.cc',
//             'http://www.tutorialchip.com'
//         );
 
/*
|---------------------
| Let's Check Them
|---------------------
*/
 
foreach( $urls as $url ) {
 
    if( get_valid_url( $url ) ) {
        echo "Valid URL: " . $url;
    }
 
    else {
        echo "Invalid URL: " . $url;
    }
 
    echo "<br />";
 
}

 ?>