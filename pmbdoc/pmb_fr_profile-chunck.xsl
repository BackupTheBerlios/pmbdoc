<?xml version="1.0"?>

<!-- $Id: pmb_fr_profile-chunck.xsl,v 1.1 2007/11/26 21:58:38 gautier Exp $ -->

<!-- HTML Stylesheet for e-smith DocBook XML documents -->

<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
                version="1.0">

<!-- Adjust this to point to your docbook distribution. I've -->
<!-- tested it with 1.55.0, but it probably works with other -->
<!-- versions. -->
<xsl:import href="profile-chunk.xsl"/>

<!-- langue cible 
<xsl:param name="profile.lang" select="fr"/>
<xsl:param name="l10n.gentext.default.language" select="fr"/>
-->

<!-- table des matières (toc) -->
<xsl:param name="generate.toc">
 appendix  nop
 article   nop
 book      toc
 chapter   toc
 part      nop
 preface   nop
 qandadiv  nop
 qandaset  nop
 reference toc,title
 section   nop
 set       toc
 </xsl:param>

<!-- boutons de navigation en images -->

<xsl:param name="navig.graphics" select="1"></xsl:param>
<xsl:param name="navig.graphics.extension" select="'.gif'"></xsl:param>
<xsl:param name="navig.graphics.path">../tools/images/</xsl:param>

<xsl:param name="html.stylesheet.type">text/css</xsl:param>
<xsl:param name="html.stylesheet" select="'../tools/html.css'"></xsl:param>

<xsl:param name="section.autolabel" select="1"></xsl:param>

<!-- 

<xsl:template name="user.header.content">
  <img src="../tools/images/logo_pmb_vert.gif" align="absmiddle"/><img src="./htmlcover.jpg" align="absmiddle"/><HR/>
</xsl:template>  -->

<xsl:template name="header.navigation">
  <xsl:param name="prev" select="/foo"/>
  <xsl:param name="next" select="/foo"/>
  <xsl:param name="nav.context"/>

  <xsl:variable name="home" select="/*[1]"/>
  <xsl:variable name="up" select="parent::*"/>

  <xsl:variable name="row1" select="$navig.showtitles != 0"/>
  <xsl:variable name="row2" select="count($prev) &gt; 0
                                    or (count($up) &gt; 0 
                                        and $up != $home
                                        and $navig.showtitles != 0)
                                    or count($next) &gt; 0"/>

  <xsl:if test="$suppress.navigation = '0' and $suppress.header.navigation = '0'">
    <div class="navheader">
      <xsl:if test="$row1 or $row2">
        <table width="100%" summary="Navigation header">
          <xsl:if test="$row1">
            <tr><th><a href="../"><img src="../tools/images/logo_pmb_vert.gif" /><br />accueil de la documentation</a></th>
              <th align="center">
                <xsl:apply-templates select="." mode="object.title.markup"/>
              </th>
              <th style="font-weight:normal;">
		<form method="GET" action="http://www.google.com/custom">
			<input type="text" name="q" size="34" maxlength="255" value="" /><input type="hidden" name="sitesearch" value="www.sigb.net/doc" /><input type="hidden" name="hl" value="fr" /><br /><font size="1"><b>chercher sur www.sigb.net/doc <input type="submit" name="btnG" value="ok" /></b></font><br />
		</form>
	      </th>
            </tr>
          </xsl:if>

          <xsl:if test="$row2">
            <tr>
              <td width="20%" align="left">
                <xsl:if test="count($prev)>0">
                  <a accesskey="p">
                    <xsl:attribute name="href">
                      <xsl:call-template name="href.target">
                        <xsl:with-param name="object" select="$prev"/>
                      </xsl:call-template>
                    </xsl:attribute>
                    <xsl:call-template name="navig.content">
                      <xsl:with-param name="direction" select="'prev'"/>
                    </xsl:call-template>
                  </a>
                </xsl:if>
                <xsl:text>&#160;</xsl:text>
              </td>
              <th width="60%" align="center">
                <xsl:choose>
                  <xsl:when test="count($up) > 0
                                  and $up != $home
                                  and $navig.showtitles != 0">
                    <xsl:apply-templates select="$up" mode="object.title.markup"/>
                  </xsl:when>
                  <xsl:otherwise>&#160;</xsl:otherwise>
                </xsl:choose>
              </th>
              <td width="20%" align="right">
                <xsl:text>&#160;</xsl:text>
                <xsl:if test="count($next)>0">
                  <a accesskey="n">
                    <xsl:attribute name="href">
                      <xsl:call-template name="href.target">
                        <xsl:with-param name="object" select="$next"/>
                      </xsl:call-template>
                    </xsl:attribute>
                    <xsl:call-template name="navig.content">
                      <xsl:with-param name="direction" select="'next'"/>
                    </xsl:call-template>
                  </a>
                </xsl:if>
              </td>
            </tr>
          </xsl:if>
        </table>
      </xsl:if>
      <xsl:if test="$header.rule != 0">
        <hr/>
      </xsl:if>
    </div>
  </xsl:if>
</xsl:template>

</xsl:stylesheet>
