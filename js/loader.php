<?php
# Load the Core Files
$core->load_cjs('_js', 'gen', 'jquery', 'core/jquery.js');
$core->load_cjs('_js', 'gen', 'class', 'core/class.js');
$core->load_cjs('_js', 'gen', 'delays', 'core/delays.js');
$core->load_cjs('_js', 'gen', 'exists', 'core/exists.js');
$core->load_cjs('_js', 'gen', 'format', 'core/format.js');
$core->load_cjs('_js', 'gen', 'outerhtml', 'core/outerhtml.js');
$core->load_cjs('_js', 'gen', 'spinner', 'core/spinner.js');

#Load the custom Class Files
$core->load_cjs('_js', 'gen', 'template', 'class/template.js');
$core->load_cjs('_js', 'gen', 'template', 'class/ajax.js');

#Load the general Files
$core->load_cjs('_js', 'gen', 'global', 'global.js');
?>