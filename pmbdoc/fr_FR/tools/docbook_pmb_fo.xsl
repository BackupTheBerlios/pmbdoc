<!DOCTYPE xsl:stylesheet>

<!-- This customization of the docbook xsls -->
<!-- (http://docbook.sourceforge.net/) adds a full page -->
<!-- cover to a pdf using an image as a background image. -->
<!-- eps images work best for this kind of thing and will -->
<!-- fill the entire page. If you are using xep, you can use a bitmap -->
<!-- and an xep extension scales it to the right -->
<!-- size. The extension is only used if xep.extensions is -->
<!-- set to 1.  -->

<!-- To use this, just change the xsl:import to point to a -->
<!-- local version of the docbook xsls and put in a valid -->
<!-- value for the cover.path parameter (or pass it in from -->
<!-- the command line.  -->

<!-- I have only tested this with XEP. If it works with -->
<!-- other renderers or if it works, but only with some -->
<!-- changes, let me know: dcramer@broadjump.com -->

<!-- This can and probably be made to work with the -->
<!-- titlepage template system, so that you let the template -->
<!-- system control the text that appears on the -->
<!-- cover. Likewise, you can adapt it to give you full page -->
<!-- cover images on part titlepages. -->

<xsl:stylesheet 
  xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
  xmlns:fo="http://www.w3.org/1999/XSL/Format"
  xmlns:rx="http://www.renderx.com/XSL/Extensions"
  version='1.0'>

<!-- Adjust this to point to your docbook distribution. I've -->
<!-- tested it with 1.55.0, but it probably works with other -->
<!-- versions. -->
<xsl:import href="docbook.xsl"/>

<!-- numérotation des sections -->
<xsl:param name="section.autolabel" select="1"/>


<xsl:param name="page.margin.bottom" select="'1cm'"/>
<xsl:param name="page.margin.inner">
  <xsl:choose>
    <xsl:when test="$double.sided != 0">0.25cm</xsl:when>
    <xsl:otherwise>0.25cm</xsl:otherwise>
  </xsl:choose>
</xsl:param>
<xsl:param name="page.margin.outer">
  <xsl:choose>
    <xsl:when test="$double.sided != 0">0.25cm</xsl:when>
    <xsl:otherwise>0.25cm</xsl:otherwise>
  </xsl:choose>
</xsl:param>
<xsl:param name="page.margin.top" select="'1cm'"/>

</xsl:stylesheet>