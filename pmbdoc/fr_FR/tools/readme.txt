Editer la documentation PMB
$Id : $

-------------------------------
   Obtenir la doc par le cvs
-------------------------------

La doc PMB est disponible sur le CVS de berlios.de, dans le module "doc"
Pour obtenir la version en cours
cvs -d:ext:nom_d_utilisateur_berlios@cvs.berlios.de:/cvsroot/pmb checkout doc

-------------------------------
        Editer la doc
-------------------------------

L'�diteur XML Docbook recommand� est XXE, disponible sur www.xmlmind.com
Pour g�n�rer les pages HTML, on peut se servir de XFC dispo sur www.xmlmind.com

**************
  Important
**************

Rappel : conform�ment � notre fonctionnement, seule la doc au format HTML est mise � disposition.
La doc PDF que vous pouvez vous g�n�rer en tant que r�dacteur ne doit pas �tre diffus�e, de m�me que le fichier XML source.

-------------------------------
 Convertir XML docbook en PDF
-------------------------------

Pour obtenir un PDF avec une mise en page optimis�e, il faut utiliser le fichier situ� dans ce r�pertoire : 
docbook_pmb_fo.xsl

Comment l'installer ?
A. Premi�re possibilit�
	1. Ne d�placer aucun fichier, mais �diter le fichier docbook_pmb_fo.xsl
	2. Editer le fichier docbook_pmb_fo.xsl, en ligne 36 indiquer le chemin du fichier docbook.xsl
	   Celui-ci se trouve dans un sous r�pertoire de votre installation XFC
	   VOTRE_CHEMIN/xfc-13/xslu/config/docbook/xsl/fo/docbook.xsl
	3. dans XFC, 
			Input : votre fichier docbook xml
			Transformation : 
				cliquer sur New
				Description : "Docbook vers PDF PMB"
				XSLT stylesheet : votre fichier docbook_pmb_fo.xsl
				Paramaters : ajouter "paper.type" qui vaut "A4"
				FO Processor : choisir FOP, Output PDF
				Output file extension : "pdf" 
			

B. Deuxi�me possibilit�
	1. Copier docbook_pmb_fo.xsl dans
   	   VOTRE_CHEMIN/xfc-13/xslu/config/docbook/xsl/fo/
	2. dans XFC, 
			Input : votre fichier docbook xml
			Transformation : 
				cliquer sur New
				Description : "Docbook vers PDF PMB"
				XSLT stylesheet : votre fichier docbook_pmb_fo.xsl
				Paramaters : ajouter "paper.type" qui vaut "A4"
				FO Processor : choisir FOP, Output PDF
				Output file extension : "pdf" 
   	   
-------------------------------
   Convertir docbook en HTML
-------------------------------

Pour obtenir un PDF avec une mise en page optimis�e, il faut utiliser le fichier situ� dans ce r�pertoire : 
docbook_pmb_fo.xsl

Comment l'installer ?
A. Premi�re possibilit�
	1. Ne d�placer aucun fichier, mais �diter le fichier chunk_pmb_html.xsl
	2. Editer le fichier chunk_pmb_html.xsl, en ligne 13 indiquer le chemin du fichier docbook.xsl
	   Celui-ci se trouve dans un sous r�pertoire de votre installation XFC
	   VOTRE_CHEMIN/xfc-13/xslu/config/docbook/xsl/fo/docbook.xsl
	3. dans XFC, 
			Input : votre fichier docbook xml
			Transformation : 
				cliquer sur New
				Description : "Docbook vers HTML PMB"
				XSLT stylesheet : votre fichier chunk_pmb_html.xsl
				Paramaters : ajouter "paper.type" qui vaut "A4"
				FO Processor : choisir FOP, Output PDF
				Output file extension : "pdf" 
			

B. Deuxi�me possibilit�
	1. Copier chunk_pmb_html.xsl dans
   	   VOTRE_CHEMIN/xfc-13/xslu/config/docbook/xsl/fo/
	2. dans XFC, 
			Input : votre fichier docbook xml
			Transformation : 
				cliquer sur New
				Description : "Docbook vers HTML PMB"
				XSLT stylesheet : votre fichier chunk_pmb_html.xsl				
				Paramaters : ajouter "base.dir" qui vaut "%Od%/"
				FO Processor : choisir None
				Output file extension : "html" 

Pour exporter en HTML, j'utilise des images modifi�es, disponible dans /tools/images
recopier ce r�pertoire � la place de XMLmind_FO_Converter\xslu\config\docbook\xsl\images

Pour exporter en HTML, j'utilise une css modifi�e, disponible dans /tools/html.css
recopier ce fichier � la place de XMLmind_FO_Converter\xslu\config\docbook\xsl\css\html.css
	
	