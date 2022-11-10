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
        <li><a href="../veranstaltungen/">Veranstaltungen</a></li>
        <li><a href="../veroeffentlichungen/" class="activated">Veröffentlichungen</a></li>
        <li><a href="../links/">Links</a></li>
      </ul>
    </div>
  </div>
</nav>

<?php
$kategorien = array(
					'Familie Soziales',
					'Kunst Kultur',
					'Sport Freizeit',
);

$ordner_intro_texte = "intro-texte/";
$ordner_texte = "texte/";
$intro_text_dateien = array_slice(scandir($ordner_intro_texte),2);
$intro_text_dateien = array_reverse($intro_text_dateien);
$intro_text_dateien = array_values($intro_text_dateien);
$intro_texte_kategorie = array();
foreach($intro_text_dateien as $intro_text_datei)
{
	$sortierung_kategorie = trim(file($ordner_intro_texte.$intro_text_datei)[0]);
	$sortierung_kategorie = str_replace("Kategorien: ","",$sortierung_kategorie);
	if(strpos($sortierung_kategorie,",") !== false){
	$sortierung_kategorie = explode(",",$sortierung_kategorie);
	
	foreach($sortierung_kategorie as $sortierung)
	{
		$sortierung = intval($sortierung);
		$intro_texte_kategorie[$sortierung][] = $intro_text_datei;
	}
	}
	else 
	{
		$sortierung = intval($sortierung_kategorie);
		$intro_texte_kategorie[$sortierung][] = $intro_text_datei;
	}
}

/*
echo '<pre>';
print_r($intro_texte_kategorie);
echo '</pre>';
*/
?>	
	
<article class="article">
 
  
  <?php 
  
  include_once("../assets/php/parsedown.php");
$Parsedown = new Parsedown();

if(isset($_GET['text']))
{
	
$check = trim(strip_tags($_GET['text']));
foreach($intro_text_dateien as $push)
{
	$existierende_textdateien[] = base64_encode(substr($push,0,strrpos($push,".")));
}

if(in_array($_GET['text'],$existierende_textdateien))
{

$file = base64_decode($_GET['text']).".md";
if(is_file($ordner_texte.$file)){$text = file_get_contents($ordner_texte.$file);
echo $Parsedown->text($text);
} else 
{
	echo '<div class="alert alert-danger">Der Text ist nicht vorhanden.</div>';
}

}
else 
{
	header("Location: ?");exit;
}

exit;	
} else 
{
	echo '
	 <h1 class="article-title">Veröffentlichungen</h1>
  <div class="row flex-spaces tabs">
	';
}

  
  $counter = 0;
  foreach($kategorien as $kategorie)
  {
	  $counter++;
	  $kategorie = str_replace(" ","<br>",$kategorie);
	  if($counter ==1){  echo '
<input id="tab'.$counter.'" type="radio" name="tabs" checked>';
	  } else {
		   echo '
<input id="tab'.$counter.'" type="radio" name="tabs">';
	  }
echo'
<label for="tab'.$counter.'">'.$kategorie.'</label>
';
  }
  
    $counter = 0;
  foreach($kategorien as $kategorie)
  {
	  $counter++;
	  $kategorie = str_replace(" ","<br>",$kategorie);
	  echo '
  <div class="content" id="content'.$counter.'">
  
  ';
  if(isset($intro_texte_kategorie[$counter])){
	  
	  foreach($intro_texte_kategorie[$counter] as $intro_text_datei)
	  {
		  $dateiname = substr($intro_text_datei,0,strrpos($intro_text_datei,"."));
		  $inhalt = file($ordner_intro_texte.$intro_text_datei);
		  unset($inhalt[0]);
		  unset($inhalt[1]);
		  $inhalt = implode("\n",$inhalt);
		  ?>
		
	<div class='paper container margin-bottom-large'>
  <?php echo $Parsedown->text($inhalt);  ?>
  <a href="?text=<?php echo base64_encode($dateiname);?>"><button>Weiterlesen</button></a>
</div>	


<?php
	  }
	  

  } else 
  {
  ?>
    <div class='paper container margin-bottom-large'>
	<h4>Leere Kategorie</h4>
  <p>Aktuell sind hier keine Texte vorhanden.</p>
	</div>	
<?php
  }
  echo '</div>';
  }
  ?>
<div>
 
</article>
  

<p>&nbsp;</p>
<footer >
<a href="../?impressum">Impressum</a>
</footer>

</body>
</html>