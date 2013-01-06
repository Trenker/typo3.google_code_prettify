<?php
/*                                                                     *
 * This file is brought to you by Georg Großberger                     *
 * (c) 2013 by Georg Großberger <contact@grossberger-ge.org>           *
 *                                                                     *
 * It is free software; you can redistribute it and/or modify it under *
 * the terms of the GNU General Public License, either version 3       *
 * of the License, or (at your option) any later version.              *
 *                                                                     */

namespace GeorgGrossberger\GoogleCodePrettify\Tests\Unit;

/**
 * Test the languages
 *
 * @package GeorgGrossberger.GoogleCodePrettify
 * @author Georg Großberger <contact@grossberger-ge.org>
 * @copyright 2013 by Georg Großberger
 * @license GPL v3 http://www.gnu.org/licenses/gpl-3.0.txt
 */
class LanguagesTest extends \TYPO3\CMS\Extbase\Tests\Unit\BaseTestCase {

	public function testPluginLanguages() {
		$expected = array(
			'apollo',
			'clj',
			'css',
			'go',
			'hs',
			'lisp',
			'lua',
			'ml',
			'n',
			'proto',
			'scala',
			'sql',
			'tex',
			'vb',
			'vhdl',
			'wiki',
			'xq',
			'yaml'
		);
		$actual = \GeorgGrossberger\GoogleCodePrettify\Languages::getPluginLanguages();
		$this->assertSame($expected, $actual);
	}

	public function testBuildInLanguages() {
		$expected = array(
			'bsh',
			'c',
			'cc',
			'cpp',
			'cs',
			'csh',
			'cyc',
			'cv',
			'htm',
			'html',
			'java',
			'js',
			'm',
			'mxml',
			'perl',
			'pl',
			'pm',
			'py',
			'rb',
			'sh',
			'xhtml',
			'xml',
			'xsl'
		);
		$actual = \GeorgGrossberger\GoogleCodePrettify\Languages::getBuildInLanguages();
		$this->assertSame($expected, $actual);
	}

	public function testAllLanguages() {
		$expected = array(
			'bsh',
			'c',
			'cc',
			'cpp',
			'cs',
			'csh',
			'cyc',
			'cv',
			'htm',
			'html',
			'java',
			'js',
			'm',
			'mxml',
			'perl',
			'pl',
			'pm',
			'py',
			'rb',
			'sh',
			'xhtml',
			'xml',
			'xsl',
			'apollo',
			'clj',
			'css',
			'go',
			'hs',
			'lisp',
			'lua',
			'ml',
			'n',
			'proto',
			'scala',
			'sql',
			'tex',
			'vb',
			'vhdl',
			'wiki',
			'xq',
			'yaml'
		);
		$actual = \GeorgGrossberger\GoogleCodePrettify\Languages::getAllLanguages();
		$this->assertSame($expected, $actual);
	}
}
