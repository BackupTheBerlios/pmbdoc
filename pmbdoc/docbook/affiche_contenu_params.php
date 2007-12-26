<?php
// Paramètres persos
$host = "localhost"; // voir hébergeur
$user = "bibli"; // vide ou "root" en local
$pass = "bibli"; // vide en local
$bdd = "bibli"; // nom de la BD
// connexion
mysql_connect($host,$user,$pass)
   or die("Impossible de se connecter");
mysql_select_db("$bdd")
   or die("Impossible de se connecter");

$query = "SELECT type_param,section_param FROM parametres WHERE gestion=0 GROUP BY section_param, type_param ORDER BY type_param, section_param"; 
$result = mysql_query($query) or die('Erreur SQL ! <br>'.$query.'<br>'.mysql_error()); ;

echo '<?xml version="1.0" encoding="ISO-8859-1"?>
	<chapter id="admin_parametres">
	  <title lang="fr">Paramètres pour reprise docbook</title>
	      <sect1 id="admin_outils_parametres">
    		 <title lang="fr">Paramètres</title>'."\n";

// tant qu'il y a des types de paramètres
while ($parametres = mysql_fetch_assoc($result)) {
	if  ($parametres['section_param']!="") {
		echo "<sect2 id=\"admin_outils_parametres_".$parametres['type_param']."_".$parametres['section_param']."\">";
		echo "<title lang=\"fr\">".$parametres['type_param']." - ".$parametres['section_param']."</title>\n";	
		echo "<table><title lang=\"fr\">".$parametres['type_param']." - ".$parametres['section_param']."</title>\n";
	} else {
		echo "<sect2 id=\"admin_outils_parametres_".$parametres['type_param']."\"><title lang=\"fr\">".$parametres['type_param']."</title>\n";	
		echo "<table><title lang=\"fr\">".$parametres['type_param']."</title>\n";
	}
	echo '<tgroup cols="3"><thead><row>'."\n";
	echo '<entry lang="fr">sous-type</entry>'."\n";
	echo '<entry lang="fr">valeur par défaut</entry>'."\n";
	echo '<entry lang="fr">commentaire</entry>'."\n";
	echo '</row></thead>'."\n<tbody>\n";

	$query2 = "SELECT section_param, sstype_param, valeur_param, comment_param FROM parametres WHERE gestion=0 AND type_param=\"".$parametres['type_param']."\" AND section_param=\"".$parametres['section_param']."\" ORDER BY 1, 2"; 
	$result2 = mysql_query($query2) or die('Erreur SQL ! <br>'.$query2.'<br>'.mysql_error()); ;
	// tant qu'il y a des paramètres pour le type
	while ($detail_parametres = mysql_fetch_assoc($result2)) {
		echo "<row>\n";
		echo "<entry lang=\"fr\"><![CDATA[".$detail_parametres['sstype_param']."]]></entry>\n"; 
		echo "<entry lang=\"fr\"><![CDATA[".$detail_parametres['valeur_param']."]]></entry>\n"; 
		echo "<entry lang=\"fr\"><![CDATA[".$detail_parametres['comment_param']."]]></entry>\n";
		echo "</row>\n";
	}
	echo "</tbody>\n</tgroup>\n</table>\n</sect2>\n\n";
}

mysql_close(); 

echo "</sect1>\n</chapter>";
?>

