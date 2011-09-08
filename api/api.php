<?php
require_once('functions.php');
require_once('class.php');
require_once('plugins.php');

if (!isset($_SESSION)) {
  session_start();
}

if (isset($_SESSION['gva-framework']['core'])) {
  $core = &$_SESSION['gva-framework']['core'];
  $core->redefine();
} else {
  $core = $_SESSION['gva-framework']['core'] = new template;
}

if ($devMode) {
  unset($_SESSION['gva-framework']['core']);
}
/*
http://yiibu.com/

http://slides.html5rocks.com

http://zomigi.com/blog/examples-of-flexible-layouts-with-css3-media-queries/
http://www.themaninblue.com/experiment/ResolutionLayout/
http://particletree.com/examples/dynamiclayouts/

http://spoiledmilk.dk/blog/html5-changing-the-browser-url-without-refreshing-page

http://net.tutsplus.com/tutorials/html-css-techniques/how-to-add-variables-to-your-css-files/

private function cache($content = false) {  
    $cacheFile = "cache/".urlencode($this->cssFile);  
    if (file_exists($cacheFile) && filemtime($cacheFile) > filemtime($this->cssFile)) {  
        return file_get_contents($cacheFile);  
    } else if ($content) {  
        file_put_contents($cacheFile, $content);  
    }  
    return $content;  
} 

public function __construct($cssFile) {  
    if (!file_exists($cssFile)) {  
        header('HTTP/1.0 404 Not Found');  
        exit;  
    }  
  
    // Deals with the Browser cache  
    $modified = filemtime($cssFile);  
    header('Last-Modified: '.gmdate("D, d M Y H:i:s", $modified).' GMT');  
  
    if(isset($_SERVER['HTTP_IF_MODIFIED_SINCE'])) {  
        if (strtotime($_SERVER['HTTP_IF_MODIFIED_SINCE']) == $modified) {  
            header('HTTP/1.1 304 Not Modified');  
            exit();  
        }  
    }  
  
    $this->cssFile = $cssFile;  
}   
*/
?>