<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.0//EN"
  "http://www.w3.org/MarkUp/DTD/xhtml-rdfa-1.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" version="XHTML+RDFa 1.0" dir="ltr"
  xmlns:content="http://purl.org/rss/1.0/modules/content/"
  xmlns:dc="http://purl.org/dc/terms/"
  xmlns:foaf="http://xmlns.com/foaf/0.1/"
  xmlns:og="http://ogp.me/ns#"
  xmlns:rdfs="http://www.w3.org/2000/01/rdf-schema#"
  xmlns:sioc="http://rdfs.org/sioc/ns#"
  xmlns:sioct="http://rdfs.org/sioc/types#"
  xmlns:skos="http://www.w3.org/2004/02/skos/core#"
  xmlns:xsd="http://www.w3.org/2001/XMLSchema#">
<head>
  <title><?php echo $this->get_current_page_title(); ?></title>
  <meta http-equiv="X-UA-Compatible" content="chrome=1">
  <?php echo $this->load_file('chrome_frame.php'); ?>
  <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Sans:400,700&v2">
  <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Nunito:400,700&v2">
  <?php echo $this->load_file('global.css'); ?>
  <!-- Module/Template CSS -->
  <link rel="stylesheet" type="text/css" href="<?php echo $this->_files->css; ?>">

  <?php echo $this->load_file('jquery.js'); ?>
  <?php echo $this->load_file('modernizr.js'); ?>
  <?php echo $this->load_file('global.js'); ?>
  <!-- Module/Template JS -->
  <script type="text/javascript" src="<?php echo $this->_files->js; ?>"></script>
</head>
<body>