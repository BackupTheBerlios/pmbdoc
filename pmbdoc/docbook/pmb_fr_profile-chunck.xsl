<?xml version="1.0"?>

<!-- $Id: pmb_fr_profile-chunck.xsl,v 1.1 2007/12/20 19:05:06 gautier Exp $ -->

<!-- HTML Stylesheet for e-smith DocBook XML documents -->

<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
                version="1.0">

<!-- Adjust this to point to your docbook distribution. I've -->
<!-- tested it with 1.55.0, but it probably works with other -->
<!-- versions. -->
<xsl:import href="profile-chunk.xsl"/>

<xsl:param name="profile.lang" select="fr"/>

<!-- langue cible 
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

<!-- niveau de détail de la table des matières -->
<xsl:param name="toc.section.depth" select="1"></xsl:param>

<!-- boutons de navigation en images -->

<xsl:param name="navig.graphics" select="1"></xsl:param>
<xsl:param name="navig.graphics.extension" select="'.gif'"></xsl:param>
<xsl:param name="navig.graphics.path">../tools/images/</xsl:param>

<xsl:param name="html.stylesheet.type">text/css</xsl:param>
<xsl:param name="html.stylesheet" select="'../tools/html.css'"></xsl:param>

<xsl:param name="section.autolabel" select="1"></xsl:param>

<!-- 

<xsl:template name="user.header.content">
  <img src="../tools/images/logo_pmb_vert.gif" align="absmiddle" class="navigation"/><img src="./htmlcover.jpg" align="absmiddle" class="navigation"/><HR/>
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
    <div class="navheader"><SCRIPT SRC="../tools/show_hide.js"></SCRIPT>
      <xsl:if test="$row1 or $row2">
        <table width="100%" summary="Navigation header">
          <xsl:if test="$row1">
            <tr>
            <th width="26px" align="left">
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
            </th>    
              <th align="left" style="padding-top:8px;">
               <h2>
                <xsl:choose>
                  <xsl:when test="count($up) > 0
                                  and $up != $home
                                  and $navig.showtitles != 0">
                    <xsl:apply-templates select="$up" mode="object.title.markup"/>
                  </xsl:when>
                  <xsl:otherwise>&#160;</xsl:otherwise>
                </xsl:choose>
                 </h2>
              </th><th align="right">
            		<form method="GET" action="http://www.google.com/custom" style="padding-top:8px;">
                <a href="../"><img src="../tools/images/logo_pmb_small.png" class="navigation" align="right" />accueil</a> - <a href="JavaScript:void(0);" onClick="show_hide_classe('figure');show_hide_classe('figure-break');show_hide_classe('figure-contents');show_hide_classe('inlinemediaobject');show_hide_classe('mediaobject');"><span id="texte_masquage">masquer les images</span></a><br /> 
                 <input type="text" name="q" class="q" size="17" maxlength="255" value="" /><input type="hidden" name="sitesearch" value="www.sigb.net/doc" /><input type="hidden" name="hl" value="fr" /><input type="submit" name="btnG" class="btnG" value="chercher" />
		            </form>
              </th>
	           <th width="26px" align="right">
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
                <xsl:text>&#160;</xsl:text>
              </th>
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

<xsl:template name="navig.content">
    <xsl:param name="direction" select="next"/>
    <xsl:variable name="navtext">
        <xsl:choose>
            <xsl:when test="$direction = 'prev'">
                <xsl:call-template name="gentext.nav.prev"/>
            </xsl:when>
            <xsl:when test="$direction = 'next'">
                <xsl:call-template name="gentext.nav.next"/>
            </xsl:when>
            <xsl:when test="$direction = 'up'">
                <xsl:call-template name="gentext.nav.up"/>
            </xsl:when>
            <xsl:when test="$direction = 'home'">
                <xsl:call-template name="gentext.nav.home"/>
            </xsl:when>
            <xsl:otherwise>
                <xsl:text>xxx</xsl:text>
            </xsl:otherwise>
        </xsl:choose>
    </xsl:variable>

    <xsl:choose>
        <xsl:when test="$navig.graphics != 0">
            <img>
                <xsl:attribute name="src">
                    <xsl:value-of select="$navig.graphics.path"/>
                    <xsl:value-of select="$direction"/>
                    <xsl:value-of select="$navig.graphics.extension"/>
                </xsl:attribute>
                <xsl:attribute name="alt">
                    <xsl:value-of select="$navtext"/>
                </xsl:attribute>
                <xsl:attribute name="class">navigation</xsl:attribute>
            </img>
        </xsl:when>
        <xsl:otherwise>
            <xsl:value-of select="$navtext"/>
        </xsl:otherwise>
    </xsl:choose>
</xsl:template>

</xsl:stylesheet>
