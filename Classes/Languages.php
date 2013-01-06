<?php
/*                                                                     *
 * This file is brought to you by Georg Großberger                     *
 * (c) 2013 by Georg Großberger <contact@grossberger-ge.org>           *
 *                                                                     *
 * It is free software; you can redistribute it and/or modify it under *
 * the terms of the GNU General Public License, either version 3       *
 * of the License, or (at your option) any later version.              *
 *                                                                     */

namespace GeorgGrossberger\GoogleCodePrettify;

/**
 * Index of supported languages codes
 *
 * @package GeorgGrossberger.GoogleCodePrettify
 * @author Georg Großberger <contact@grossberger-ge.org>
 * @copyright 2013 by Georg Großberger
 * @license GPL v3 http://www.gnu.org/licenses/gpl-3.0.txt
 */
class Languages {

	// Build in
	const L_BSH  = 'bsh';
	const L_C    = 'c';
	const L_CC   = 'cc';
	const L_CPP  = 'cpp';
	const L_CS   = 'cs';
	const L_CSH  = 'csh';
	const L_CYC  = 'cyc';
	const L_CV   = 'cv';
	const L_HTM  = 'htm';
	const L_HTML = 'html';
	const L_JAVA = 'java';
	const L_JS   = 'js';
	const L_M    = 'm';
	const L_MXML = 'mxml';
	const L_PERL = 'perl';
	const L_PL   = 'pl';
	const L_PM   = 'pm';
	const L_PY   = 'py';
	const L_RB   = 'rb';
	const L_SH   = 'sh';
	const L_XHTML= 'xhtml';
	const L_XML  = 'xml';
	const L_XSL  = 'xsl';

	// Plugged in
	const L_APOLLO = 'apollo';
	const L_CLJ    = 'clj';
	const L_CSS    = 'css';
	const L_GO     = 'go';
	const L_HS     = 'hs';
	const L_LISP   = 'lisp';
	const L_LUA    = 'lua';
	const L_ML     = 'ml';
	const L_N      = 'n';
	const L_PROTO  = 'proto';
	const L_SCALA  = 'scala';
	const L_SQL    = 'sql';
	const L_TEX    = 'tex';
	const L_VB     = 'vb';
	const L_VHDL   = 'vhdl';
	const L_WIKI   = 'wiki';
	const L_XQ     = 'xq';
	const L_YAML   = 'yaml';

	/**
	 * All available language codes
	 *
	 * @return array
	 */
	public static function getAllLanguages() {
		return array_merge(
			self::getBuildInLanguages(),
			self::getPluginLanguages()
		);
	}

	/**
	 * Language codes that are built into the script
	 *
	 * @return array
	 */
	public static function getBuildInLanguages() {
		return array(
			self::L_BSH,
			self::L_C,
			self::L_CC,
			self::L_CPP,
			self::L_CS,
			self::L_CSH,
			self::L_CYC,
			self::L_CV,
			self::L_HTM,
			self::L_HTML,
			self::L_JAVA,
			self::L_JS,
			self::L_M,
			self::L_MXML,
			self::L_PERL,
			self::L_PL,
			self::L_PM,
			self::L_PY,
			self::L_RB,
			self::L_SH,
			self::L_XHTML,
			self::L_XML,
			self::L_XSL
		);
	}

	/**
	 * Language codes available through a plugin
	 *
	 * @return array
	 */
	public static function getPluginLanguages() {
		return array(
			self::L_APOLLO,
			self::L_CLJ,
			self::L_CSS,
			self::L_GO,
			self::L_HS,
			self::L_LISP,
			self::L_LUA,
			self::L_ML,
			self::L_N,
			self::L_PROTO,
			self::L_SCALA,
			self::L_SQL,
			self::L_TEX,
			self::L_VB,
			self::L_VHDL,
			self::L_WIKI,
			self::L_XQ,
			self::L_YAML
		);
	}
}
