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
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Page\PageRenderer;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use GeorgGrossberger\GoogleCodePrettify\Languages;

/**
 * Test for the pretty print API class
 *
 * @package GeorgGrossberger.GooglePrettyPrint
 * @author Georg Großberger <contact@grossberger-ge.org>
 * @copyright 2013 by Georg Großberger
 * @license GPL v3 http://www.gnu.org/licenses/gpl-3.0.txt
 */
class PrettyPrintTest extends \TYPO3\CMS\Extbase\Tests\Unit\BaseTestCase {

	/**
	 * @var \GeorgGrossberger\GoogleCodePrettify\PrettyPrint
	 */
	protected $object;

	/**
	 * @var \TYPO3\CMS\Core\Page\PageRenderer
	 */
	protected static $_proxyPageRenderer;

	public function setUp() {
		if (!self::$_proxyPageRenderer) {
			$name = $this->buildAccessibleProxy('\TYPO3\CMS\Core\Page\PageRenderer');
			self::$_proxyPageRenderer = GeneralUtility::makeInstance($name);
		}
		$this->object = GeneralUtility::makeInstance('GeorgGrossberger\\GoogleCodePrettify\\PrettyPrint');
		$this->object->injectPageRenderer(self::$_proxyPageRenderer);
	}

	public function testPrettyPrint() {
		$code = '/* Display Inline */
.inline-element {
    display: inline-block;
    *display: inline;
    *zoom: 1;
}';
		$expected = '<pre class="prettyprint"><code>/* Display Inline */
.inline-element {
    display: inline-block;
    *display: inline;
    *zoom: 1;
}</code></pre>';

		$actual = $this->object->prettyPrint($code);
		$this->assertSame($expected, $actual);


		$expected = '<pre class="prettyprint"><code class="language-css">/* Display Inline */
.inline-element {
    display: inline-block;
    *display: inline;
    *zoom: 1;
}</code></pre>';
		$actual = $this->object->prettyPrint($code, Languages::L_CSS);
		$this->assertSame($expected, $actual);

		$pageRenderer = self::$_proxyPageRenderer;
		$cssFiles = $pageRenderer->_get('cssFiles');
		$jsFiles  = $pageRenderer->_get('jsFiles');
		$jsInline = $pageRenderer->_get('jsInline');

		$basePath = ExtensionManagementUtility::siteRelPath('google_code_prettify');
		$cssFile  = $basePath . 'Resources/Public/Stylesheet/prettify.css';
		$jsFile   = $basePath . 'Resources/Public/Javascript/prettify.js';

		$this->assertTrue(isset($cssFiles[ $cssFile ]) && is_array($cssFiles[ $cssFile ]));
		$this->assertSame($cssFile, $cssFiles[ $cssFile ]['file']);

		$this->assertTrue(isset($jsFiles[ $jsFile ]) && is_array($jsFiles[ $jsFile ]));
		$this->assertSame($jsFile, $jsFiles[ $jsFile ]['file']);
		$this->assertSame(PageRenderer::PART_FOOTER, $jsFiles[ $jsFile ]['section']);

		$this->assertTrue(isset($jsInline['google_code_prettify']) && is_array($jsInline['google_code_prettify']));
		$this->assertSame(PageRenderer::PART_FOOTER, $jsInline['google_code_prettify']['section']);
		$this->assertTrue(strlen($jsInline['google_code_prettify']['code']) > 100);
	}

	/**
	 *
	 * @expectedException \InvalidArgumentException
	 */
	public function testEmptyCodeThrowsException() {
		$this->object->prettyPrint('');
	}

	/**
	 *
	 * @expectedException \InvalidArgumentException
	 */
	public function testNullCodeThrowsException() {
		$this->object->prettyPrint(NULL);
	}

	/**
	 *
	 * @expectedException \InvalidArgumentException
	 */
	public function testIntegerCodeThrowsException() {
		$this->object->prettyPrint(123);
	}

	/**
	 *
	 * @expectedException \InvalidArgumentException
	 */
	public function testUnknownLanguageCodeThrowsException() {
		$this->object->prettyPrint('var a=1;', 'javascript');
	}
}
