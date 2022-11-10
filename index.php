<?php include("config.php")?><!DOCTYPE html>
<html>
<head>
<title><?php echo $titel_der_webseite;?></title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22><?php echo $icon_der_webseite;?></text></svg>">
<meta name="description" content="<?php echo $beschreibung_der_webseite;?>">
<meta name="robots" content="noindex, nofollow, noarchive, nosnippet, max-image-preview:none, notranslate" />
  <link rel="stylesheet" href="assets/css/gfonts.css">
  <link rel="stylesheet" href="assets/css/paper.css">
  <title><?php echo $titel_der_webseite;?></title>
 </head>
<body> 
    <div class="paper container">
	
<div class="background-success"  style="width:100%!important; padding-left:1em;"><h1><?php echo $titel_der_webseite;?></h1><h3 style="padding-bottom:0.5em!important;"><?php echo $untertitel_der_webseite;?></h3></div>

<nav class="border fixed">
  <div class="nav-brand">
    <h4><?php echo $titel_der_webseite;?></h4>
  </div>
  <div class="collapsible">
    <input id="collapsible2" type="checkbox" name="collapsible2">
    <label for="collapsible2"><span class="menuitem">&#9776;</span>
      <div class="bar1"></div>
      <div class="bar2"></div>
      <div class="bar3"></div>
    </label>
    <div class="collapsible-body">
      <ul class="inline">
        <li><a href="?"  class="activated">Willkommen</a></li>
        <li><a href="veranstaltungen/">Veranstaltungen</a></li>
        <li><a href="veroeffentlichungen/">Veröffentlichungen</a></li>
        <li><a href="links/">Links</a></li>
      </ul>
    </div>
  </div>
</nav>	
	
<article class="article">

<?php if(isset($_GET['impressum'])){
	include_once("assets/php/parsedown.php");
	$Parsedown = new Parsedown();
	$inhalt = file_get_contents("impressum.md");
	$Parsedown->setBreaksEnabled(true);
	$output =  $Parsedown->text($inhalt); 
	$output = str_replace('<h1>','<h1 class="article-title">',$output);
	echo $output;	} else {?>
	
  <h1 class="article-title">Herzlich willkommen</h1>
  <!--<p class="article-meta">Written by <a href="#">Super User</a></p>-->
	<p>auf dieser schönen Homepage.</p>
	<p>Veranstaltungen und Texte können als Markdown in einzelne Dateien geschrieben werden.</p>

<p>Die Optik und ein Großteil der Funktionen dieser Webseite basieren auf <a href="https://getpapercss.com/" target="_blank">Paper.css</a>, leicht angepasst. Besten Dank auch an <a href="https://parsedown.org" target="_blank">Parsedown</a>.</p>

<p>Es folgt Fülltext, Danke an <a href="https://loremipsum.de" target="_blank">loremipsum.de</a></p>

<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. </p>

<p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </p>

<p>Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. </p>

</article>

<?php }?>
<p>&nbsp;</p>
<footer >
<a href="?impressum">Impressum</a>
</footer>

</body>
</html>