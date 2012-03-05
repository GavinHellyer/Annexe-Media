<!DOCTYPE html>
<html>
<head>
  <title><?php echo $this->get_current_page_title(); ?></title>
  <meta http-equiv="X-UA-Compatible" content="chrome=1">
  <?php echo $this->load_file('chrome_frame.php'); ?>
  <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Sans:400,700&v2">
  <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Nunito:400,700&v2">
  <!-- General and Module/Template CSS -->
  <?php echo $this->load_theme(); ?>
  <link rel="stylesheet" type="text/css" href="<?php echo $this->_files->css; ?>">

  <!-- General and Module/Template JS -->
  <script type="text/javascript" src="<?php echo $this->_files->js; ?>"></script>
</head>
<body>