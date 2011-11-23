<?php
function resize_image($blob, $w, $h, $crop = false) {
  $src = imagecreatefromstring($blob);

  $width = imagesx($src);
  $height = imagesy($src);

  $r = $width / $height;

  if ($crop) {
    if ($w/$h < $r) {
      $newwidth = $h*$r;
      $newheight = $h;
    } else {
      $newheight = $w/$r;
      $newwidth = $w;
    }
  } else {
    if ($w/$h > $r) {
      $newwidth = $h*$r;
      $newheight = $h;
    } else {
      $newheight = $w/$r;
      $newwidth = $w;
    }
  }

  $dst = imagecreatetruecolor($newwidth, $newheight);
  imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
  if ($crop) {
    $thumb = imagecreatetruecolor($w, $h);
    imagecopyresampled($thumb, $dst, 0, 0, (($newwidth-$w)/2), (($newheight-$h)/2), $w, $h, $w, $h);
  }

  $output = isset($thumb) ? $thumb : $dst;
  imagejpeg( $output, '', 90 );

  imagedestroy( $dst );
  imagedestroy( $src );

  return true;
}

$image = false;
if (isset($_REQUEST['id'])) {
  if (!isset($_SESSION)) {
    session_start();
  }

  if (isset($_SESSION['images'][$_REQUEST['id']])) {
    $image = $_SESSION['images'][$_REQUEST['id']];
    //unset($_SESSION['images'][$_REQUEST['id']]);

    $image = base64_decode($image);
  }
} else {
  $image = isset($_REQUEST['img']) ? file_get_contents($_REQUEST['img']) : false;
}

if ($image) {
  $size = isset($_REQUEST['size']) ? explode('x', $_REQUEST['size']) : false;
  $crop = isset($_REQUEST['crop']) ? $_REQUEST['crop'] : false;

  header("Content-Type: image/jpeg");
  header("Accept-Ranges: bytes");
  header("Cache-Control: max-age=9999, must-revalidate");
  if ($size) {
    resize_image($image, $size[0], $size[1], $crop);
  } else {
    echo $image;
  }
}
?>