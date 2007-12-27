<?php
// +-------------------------------------------------+
// © 2002-2004 PMB Services / www.sigb.net pmb@sigb.net et contributeurs (voir www.sigb.net)
// +-------------------------------------------------+
// $Id: affiche_contenu_params.php,v 1.3 2007/12/27 09:58:03 gautier Exp $

// définition du minimum nécéssaire 
$base_path=".";                            
$base_title = "paramètres pour doc PMB";    

if (substr(phpversion(), 0, 1) == "5") @ini_set("zend.ze1_compatibility_mode", "1");
	
//include_once ("$base_path/includes/error_report.inc.php") ;
//include_once ("$base_path/includes/global_vars.inc.php") ;
require_once ("$base_path/includes/config.inc.php");

$include_path      = $base_path."/".$include_path; 
$class_path        = $base_path."/".$class_path;
$javascript_path   = $base_path."/".$javascript_path;
$styles_path       = $base_path."/".$styles_path;

require_once("$class_path/XMLlist.class.php");

// fichier de déf. pour gestion des erreurs
//require_once("$include_path/error_handler.inc.php");

require_once("$include_path/db_param.inc.php");

if ($_tableau_databases[1] && $base_title) {
	// multi-databases
	$database_window_title=$_libelle_databases[array_search(LOCATION,$_tableau_databases)].": ";
	} else $database_window_title="" ; 

require_once("$include_path/mysql_connect.inc.php");
$dbh = connection_mysql();

//require_once("$include_path/sessions.inc.php");
require_once("$include_path/misc.inc.php");
//require_once("$javascript_path/misc.inc.php");
//require_once("$include_path/user_error.inc.php");

// classe de gestion de l'audit des objets
//require_once("$class_path/audit.class.php");

include("$include_path/start.inc.php");

$lang="fr_FR";

$helpdir = $lang;
// localisation (fichier XML)
$messages = new XMLlist("$include_path/messages/$lang.xml", 0);
$messages->analyser();
$msg = $messages->table;

$descriptions = new XMLlist("affiche_contenu_params.xml", 0);
$descriptions->analyser();
$desc = $descriptions->table;


require("$include_path/templates/common.tpl.php");  

require_once($include_path."/parser.inc.php");

function param_form($id_param=0, $type_param="", $sstype_param="", $valeur_param="", $comment_param="") {
	global $msg;
	global $admin_param_form;

	$title = $msg[1606]; // modification

	$admin_param_form = str_replace('!!form_title!!', $title, $admin_param_form);
	$admin_param_form = str_replace('!!id_param!!', $id_param, $admin_param_form);
	$admin_param_form = str_replace('!!type_param!!', $type_param, $admin_param_form);
	$admin_param_form = str_replace('!!sstype_param!!', $sstype_param, $admin_param_form);
	$admin_param_form = str_replace('!!valeur_param!!', $valeur_param, $admin_param_form);
	$admin_param_form = str_replace('!!comment_param!!', $comment_param, $admin_param_form);

	print $admin_param_form;
	
	}

function _section_($param) {
	global $section_table;
	
	$section_table[$param["NAME"]]["LIB"]=$param["value"];
	$section_table[$param["NAME"]]["ORDER"]=$param["ORDER"];
}

function show_param($dbh) {

	global $msg;
	global $begin_result_liste;
	global $form_type_param, $form_sstype_param ; // si modif , ces valeurs sont connues, on va faire une ancre avec
	global $lang;
	global $include_path;
	global $section_table;
	
	$allow_section=0;
	
	if (file_exists($include_path."/section_param/$lang.xml")) {
		_parser_($include_path."/section_param/$lang.xml",array("SECTION"=>"_section_"),"PMBSECTIONS");
		$allow_section=1;
	}
	//print $begin_result_liste ;
	
	$requete = "select * from parametres where gestion=0 order by type_param, section_param, sstype_param ";
	$res = mysql_query($requete, $dbh);
	$i=0;
	while($param=mysql_fetch_object($res)) {
		if (!$type_param) {
			$type_param=$param->type_param;
			$creer = 1;
			$fincreer = 0;
			$odd_even=0;
		} elseif ($type_param!=$param->type_param) {
			$type_param=$param->type_param;
			$creer = 1;
			$fincreer = 1;
			$odd_even=0;
		} else {
			$creer = 0;
			$fincreer = 0;
		}
		if (($section_param!=$param->section_param)&&($allow_section)) {
			$section_param=$param->section_param;
			$creer_section=1;
		} else $creer_section=0; 


		if ($fincreer) {
			print "</tbody></tgroup></table></sect2>\n";
		}
		if ($creer) {
			
			$lab_param = $msg["param_".$type_param];
			if ($lab_param=="") $lab_param=$type_param;
			
			print "<sect2 id=\"admin_outils_parametres_z3950\"><title lang=\"fr\">".$lab_param."</title>\n"
			."<table><title lang=\"fr\">".$msg['admin_param_detail']."</title>\n"
			.$desc["description_".$type_param]
			."<tgroup cols=\"3\"><colspec colname='c1'/><colspec colname='c2'/><colspec colname='c3'/><thead><row>\n"
			."<entry lang=\"fr\">sous-type</entry>\n"
			."<entry lang=\"fr\">valeur par défaut</entry>\n"
			."<entry lang=\"fr\">commentaire</entry>\n"
			."</row></thead>\n"
			."<tbody>";
		}
		if ($creer_section) { 
			print "\n<row><entry lang=\"fr\" namest=\"c1\" nameend=\"c3\" align=\"center\"><emphasis role=\"bold\">".
			"<![CDATA[".$section_table[$section_param]["LIB"]."]]></emphasis></entry></row>"; 
		}
		print "\n<row>\n".
			"<entry lang=\"fr\"><![CDATA[".$param->sstype_param."]]></entry>\n".
			"<entry lang=\"fr\"><![CDATA[".$param->valeur_param."]]></entry>\n".
			"<entry lang=\"fr\"><![CDATA[".$param->comment_param."]]></entry>\n".
			"</row>\n";
		} // fin while
	print "</tbody></tgroup></table></sect2>\n";
	
	}


$admin_layout = str_replace('!!menu_sous_rub!!', $msg[1600], $admin_layout);

//print "<div class='row'>";
//echo window_title($database_window_title.$msg[1600].$msg[1003].$msg[1001]);
		

show_param($dbh);

// deconnection MYSql
mysql_close($dbh);

?>
