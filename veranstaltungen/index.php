<?php include("../config.php")?><!DOCTYPE html>
<html>
<head>
<title><?php echo $titel_der_webseite;?></title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22><?php echo $icon_der_webseite;?></text></svg>">
<meta name="description" content="<?php echo $beschreibung_der_webseite;?>">
<meta name="robots" content="noindex, nofollow, noarchive, nosnippet, max-image-preview:none, notranslate" />
  <link rel="stylesheet" href="../assets/css/gfonts.css">
  <link rel="stylesheet" href="../assets/css/paper.css">
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
        <li><a href="../">Willkommen</a></li>
        <li><a href="../veranstaltungen/" class="activated">Veranstaltungen</a></li>
        <li><a href="../veroeffentlichungen/">Veröffentlichungen</a></li>
        <li><a href="../links/">Links</a></li>
      </ul>
    </div>
  </div>
</nav>	
	
<article class="article">
  <h1 class="article-title">Veranstaltungen</h1>
  <!--<p class="article-meta">Written by <a href="#">Super User</a></p>-->


<?php 
include_once("../assets/php/parsedown.php");
$Parsedown = new Parsedown();


$ordner = "texte/";
$texte = array_slice(scandir($ordner),2);
foreach($texte as $text)
{
	$inhalt = file_get_contents($ordner.$text);
	?>
	<div class='paper container margin-bottom-large'>
  <?php echo $Parsedown->text($inhalt);  ?>
</div>	
	
	
<?php	
}
?>
  
</article>
  
<p>&nbsp;</p>
<footer >
<a href="../?impressum">Impressum</a>
</footer>

</body>
</html>