<xsl:stylesheet version="2.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

	<xsl:output 
  		encoding="ISO-8859-15"
  		method="xml"
  		indent="yes" />

 

	<xsl:template match="node() | @*">
		<xsl:copy>
			<xsl:apply-templates select="@* | node()"/>
		</xsl:copy>
	</xsl:template>

 
	<!-- Langues à supprimer-->
	<xsl:template match="*[@lang = 'en']">
	</xsl:template>
	
	<!-- Langues à supprimer-->
	<xsl:template match="*[@lang = 'es']">
	</xsl:template>
</xsl:stylesheet>


