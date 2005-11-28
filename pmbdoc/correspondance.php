<?php
// +-----------------------------------------------------+
// © 2002-2004 PMB Services / www.sigb.net pmb@sigb.net 
//   et contributeurs (voir www.sigb.net)
// +-----------------------------------------------------+

/* Ce fichier sert à établir la correspondance entre la documentation
   et PMB.
   Ce fichier est distribué avec le zip de la documentation.
  
  
   N'EDITEZ PAS CE FICHIER
   
  
*/

//lien entre les infos postées et la doc
switch ($script_name) {


	// AFFICHAGE DE LA LICENCE
    case "main.php" :
		print "html-install/ch11.html#licence";
    	break;

	// PREFERENCES
    case "account.php" :
		print "html-user/ch04.html#prefs";
		break;

	// CIRCULATION
	case "circ.php" :
		switch ($categ) {
			case "retour":
	    		print "html-user/ch07.html#circ_retour";
				break;
			case "groups":
	    		print "html-user/ch07.html#circ_groups";
				break;
			case "empr_create":
	    		print "html-user/ch07.html#circ_emprcreate_1";
				break;
			case "empr_saisie":
	    		print "html-user/ch07.html#circ_emprcreate_2";
				break;
			case "visu_ex":
	    		print "html-user/ch07s02.html#circ_visu_ex";
				break;
			case "visu_rech":
	    		print "html-user/ch07s02.html#circ_visu_rech";
				break;
			case "listeresa":
				switch ($sub) {
					case "encours":
			    		print "html-user/ch07s03.html#circ_resa_encours";
						break;
					case "depassee" :
			    		print "html-user/ch07s03.html#circ_resa_depasse";
						break;
					case "docranger" :
			    		print "html-user/ch07s03.html#circ_resa_docranger";
						break;
				}
				break;
			case "" :
				print "html-user/ch07.html#circ_pret";
				break;
		}
		break;

	// CATALOGAGE
	case "catalog.php" :
		switch ($categ) {
			case "search":
				switch ($mode) {
					case "":
					case "0":
						// Auteur/titre
			    		print "html-user/ch08.html#cat_search_tit";
						break;
					case "1":
						// Catégorie/sujet
						print "html-user/ch08.html#cat_search_categ";
						break;
					case "5":
						// Termes du thésaurus
						print "html-user/ch08.html#cat_search_terms";
						break;
					case "2":
						// Editeur/collection
						print "html-user/ch08.html#cat_search_publisher";
						break;
					case "3":
						// Paniers de notices
						print "html-user/ch08.html#cat_search_caddie";
						break;
					case "6":
						// Multi-critères
						print "html-user/ch08.html#cat_search_multi";
						break;
				}
	    		break;			
			case "create":
	    		print "html-user/ch08.html#cat_create";
				break;
			case "create_form":
	    		print "html-user/ch08.html#cat_create_form";
				break;
			case "last_records":
	    		print "html-user/ch08.html#cat_last_records";
				break;
			case "serials":
				switch ($sub) {
					case "serial_form":
			    		print "html-user/ch08s02.html#cat_serial_form";
						break;
					case "view":
						print "html-user/ch08s02.html#cat_serial_view";
					case "bulletinage":
						switch ($action) {
							case "bul_form":
					    		print "html-user/ch08s02.html#cat_serial_bul";
								break;
							case "expl_form":
					    		print "html-user/ch08s02.html#cat_serial_expl";
								break;
							case "view" :
					    		print "html-user/ch08s02.html#cat_serial_bul_view";
								break;
						}
						break;
					case "analysis":
						switch ($action) {
							case "analysis_form":
					    		print "html-user/ch08s02.html#cat_serial_analysis";
								break;
							case "explnum_form" :
					    		print "html-user/ch08s02.html#cat_serial_explnum";
								break;
						}
						break;
					case "":
			    		print "html-user/ch08s02.html#cat_serial";
						break;
						
				}
				break;
			case "caddie":
				switch ($sub) {
					case "collecte":
						switch ($moyen) {
							case "douchette":
							case "selection" :
							case "" :
								// la documentation n'est pas encore assez détaillée
					    		print "html-user/ch08s03.html#cat_caddie_collecte";
								break;
						}
						break;
					case "pointage":
						switch ($moyen) {
							case "douchette":
					    		print "html-user/ch08s03.html#cat_caddie_pointage_douchette";
								break;
							case "selection" :
					    		print "html-user/ch08s03.html#cat_caddie_pointage_selection";
								break;
							case "" :
					    		print "html-user/ch08s03.html#cat_caddie_pointage";
								break;
						}
						break;
					case "action":
			    		print "html-user/ch08s03.html#cat_caddie_action";
						break;
					case "":
					case "gestion";
						switch ($quoi) {
							case "procs":
					    		print "html-user/ch08s03.html#cat_caddie_gestion_procs";
								break;
							case "panier" :
							case "" :
					    		print "html-user/ch08s03.html#cat_caddie_gestion_panier";
								break;
						}
						break;
				}
				break;
			case "etagere":
				switch ($sub) {
					case "constitution":
			    		print "html-user/ch08s04.html#cat_etagere_constitution";
						break;
					case "gestion":
					case "":
			    		print "html-user/ch08s04.html#cat_etagere_gestion";
						break;
				}
				break;
			case "z3950":
	    		print "html-user/ch08s05.html#cat_z3950";
				break;
			case "" :
	    		print "html-user/ch08.html#cat";
	    		break;
		}
		break;

	// AUTORITES
    case "autorites.php" :
	
	    switch ($categ) {
			case "":
	    	case "auteurs":
	    		print "html-user/ch09.html#autorites_auteurs";
	    		break;
	    	case "categories":
	    		print "html-user/ch09s02.html#autorites_categ";
	    		break;
	    	case "editeurs":
	    		print "html-user/ch09s03.html#autorites_editeurs";
	    		break;
	    	case "collections":
    			print "html-user/ch09s04.html#autorites_coll";
	    		break;
	    	case "souscollections";
	    		print "html-user/ch09s05.html#autorites_subcoll";
	    		break;
	    	case "series":
	    		print "html-user/ch09s06.html#autorites_series";
	    		break;
	    	case "indexint":
	    		print "html-user/ch09s07.html#autorites_indexint";
	    		break;	    	
		}
        break;

	// EDITIONS
	case "edit.php" :
		switch ($categ) {
			case "expl":
				switch ($sub) {
					case "encours":
			    		print "html-user/ch10.html#edit_expl_encours";
						break;
					case "retard":
			    		print "html-user/ch10.html#edit_expl_retard";
						break;
					case "pargroupe":
			    		print "html-user/ch10.html#edit_expl_pargroupe";
						break;
					case "":
			    		print "html-user/ch10.html#edit_expl_encours";
						break;
				}
				break;
			case "notices":
				switch ($sub) {
					case "resa":
			    		print "html-user/ch10s02.html#edit_resa";
						break;
					case "resa_a_traiter":
			    		print "html-user/ch10s02.html#edit_resa_a_traiter";
						break;
					case "":
			    		print "html-user/ch10s02.html#edit_resa";
						break;
				}
				break;
			case "empr":
				switch ($sub) {
					case "encours":
			    		print "html-user/ch10s03.html#edit_empr_encours";
						break;
					case "limite":
			    		print "html-user/ch10s03.html#edit_empr_limite";
						break;
					case "depasse":
			    		print "html-user/ch10s03.html#edit_empr_depasse";
						break;
					case "":
			    		print "html-user/ch10s03.html#edit_empr";
						break;
				}
				break;
			case "serials":
	    		print "html-user/ch10s04.html#edit_serials";
				break;
			case "procs":
	    		print "html-user/ch10s05.html#edit_procs";
				break;
			case "cbgen":
	    		print "html-user/ch10s06.html#edit_cbgen";
				break;
			case "" :
	    		print "html-user/ch10.html#edit";
	    		break;
		}
		break;

	// ADMINISTRATION
    case "admin.php" :
	
	    switch ($categ) {
			case "docs":
				switch ($sub) {
					case "typdoc":
			    		print "html-admin/ch04.html#admin_expl_typdoc";
						break;
					case "codstat":
			    		print "html-admin/ch04s02.html#admin_expl_codstat";
						break;
					case "section":
			    		print "html-admin/ch04s03.html#admin_expl_section";
						break;
					case "statut":
			    		print "html-admin/ch04s04.html#admin_expl_statut";
						break;
					case "location":
			    		print "html-admin/ch04s05.html#admin_expl_location";
						break;
					case "lenders":
			    		print "html-admin/ch04s06.html#admin_expl_lenders";
						break;
					case "perso":
			    		print "html-admin/ch04s07.html#admin_expl_perso";
						break;
					case "":
			    		print "html-admin/ch04.html#admin_expl";
						break;
				}
				break;
			case "notices":
				switch ($sub) {
					case "orinot":
			    		print "html-admin/ch05.html#admin_notices_orinot";
						break;
					case "perso":
			    		print "html-admin/ch05s02.html#admin_notices_perso";
						break;
					case "":
			    		print "html-admin/ch05.html#admin_notices";
						break;
				}
				break;
			case "empr":
				switch ($sub) {
					case "categ":
			    		print "html-admin/ch06.html#admin_empr_categ";
						break;
					case "codstat":
			    		print "html-admin/ch06s02.html#admin_empr_codstat";
						break;
					case "implec":
			    		print "html-admin/ch06s03.html#admin_empr_implec";
						break;
					case "parperso":
			    		print "html-admin/ch06s04.html#admin_empr_parperso";
						break;
					case "":
			    		print "html-admin/ch06.html#admin_empr";
						break;
				}
				break;
			case "users":
	    		print "html-admin/ch08.html#admin_users";
				break;
			case "import":
				switch ($sub) {
					case "import":
			    		print "html-admin/ch09.html#admin_import";
						break;
					case "import_expl":
			    		print "html-admin/ch09s02.html#admin_import_expl";
						break;
					case "pointage_expl":
			    		print "html-admin/ch09s03.html#admin_import_pointage";
						break;
					case "":
			    		print "html-admin/ch09.html";
						break;
				}
				break;
			case "convert":
				switch ($sub) {
					case "import":
			    		print "html-admin/ch10s02.html";
						break;
					case "export":
			    		print "html-admin/ch10s03.html";
						break;
					case "":
			    		print "html-admin/ch10.html";
						break;
				}
				break;
			case "netbase":
	    		print "html-admin/ch11.html#admin_netbase";
				break;
			case "alter":
	    		print "html-admin/ch11s03.html";
				break;
			case "misc":
				switch ($sub) {
					case "tables":
			    		print "html-admin/ch11s04.html";
						break;
					case "mysql":
			    		print "html-admin/ch11s05.html";
						break;
					case "proc":
			    		print "html-admin/ch11s02.html";
						break;
					case "":
	    				print "html-admin/ch11.html";
	    				break;
				}
				break;
			case "alter":
	    		print "html-admin/ch11s06.html";
				break;
			case "z3950":
				switch ($sub) {
					case "zbib":
			    		print "html-admin/ch12.html";
						break;
					case "":
			    		print "html-admin/ch12.html";
						break;
				}
				break;
			case "sauvegarde":
				switch ($sub) {
					case "lieux":
			    		print "html-admin/ch13.html#admin_sauvegarde_lieux";
						break;
					case "tables":
			    		print "html-admin/ch13s02.html";
						break;
					case "gestsauv":
			    		print "html-admin/ch13s03.html";
						break;
					case "launch":
			    		print "html-admin/ch13s04.html";
						break;
					case "list":
			    		print "html-admin/ch13s05.html";
						break;
					case "":
			    		print "html-admin/ch13.html";
						break;
				}
				break;
			case "":
				print "html-admin/";
				break;
		}
        break;

    case "" :
        print "";
        break;
        }
?>