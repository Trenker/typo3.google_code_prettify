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
use TYPO3\CMS\Core\SingletonInterface;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

/**
 * The base API for printing pretty code
 *
 * @package GeorgGrossberger.GoogleCodePrettify
 * @author Georg Großberger <contact@grossberger-ge.org>
 * @copyright 2013 by Georg Großberger
 * @license GPL v3 http://www.gnu.org/licenses/gpl-3.0.txt
 */
class PrettyPrint implements SingletonInterface {

	/**
	 * If the base API assets have already been added
	 *
	 * @var boolean
	 */
	protected $assetsAdded = FALSE;

	/**
	 * Added javascript plugins
	 *
	 * @var array
	 */
	protected $addedPlugins = array();

	/**
	 * The page renderer to which we add the JS and CSS
	 *
	 * @inject
	 * @var \TYPO3\CMS\Core\Page\PageRenderer
	 */
	protected $pageRenderer;

	/**
	 * @param \TYPO3\CMS\Core\Page\PageRenderer $pageRenderer
	 */
	public function injectPageRenderer(\TYPO3\CMS\Core\Page\PageRenderer $pageRenderer) {
		$this->pageRenderer = $pageRenderer;
	}

	/**
	 * Getter for the page renderer
	 *
	 * @return \TYPO3\CMS\Core\Page\PageRenderer
	 */
	protected function getPageRenderer() {
		// Fallback in case no DI was issued
		if (!$this->pageRenderer) {
			$this->injectPageRenderer(GeneralUtility::makeInstance('TYPO3\\CMS\\Core\\Page\\PageRenderer'));
		}
		return $this->pageRenderer;
	}

	/**
	 * Wrap the given code inside a <pre><code> and add the API to the page renderer
	 *
	 * @param string $code
	 * @param null|string $language
	 * @return string
	 * @throws \InvalidArgumentException
	 */
	public function prettyPrint($code, $language = NULL) {

		if (empty($code) || !is_string($code)) {
			throw new \InvalidArgumentException('Code must be a not empty string');
		}

		if ($language !== NULL && !$this->isAllowedLanguageKey($language)) {
			throw new \InvalidArgumentException('Given language not supported');
		}

		if (!$this->assetsAdded) {
			$pageRenderer = $this->getPageRenderer();
			$pathPrefix = ExtensionManagementUtility::siteRelPath('google_code_prettify');
			$pageRenderer->addCssFile( $pathPrefix . 'Resources/Public/Stylesheet/prettify.css' );
			$pageRenderer->addJsFooterFile( $pathPrefix . 'Resources/Public/Javascript/prettify.js' );
			$pageRenderer->addJsFooterInlineCode('google_code_prettify', '(function(){function a(){prettyPrint()}if(window.addEventListener)window.addEventListener("load",a,!1);else if(window.attachEvent)window.attachEvent("onload",a);else{var b=window.onload||function(){};window.onload=function(){b(),a()}}})();');
			$this->assetsAdded = TRUE;
		}

		$additionalHtml = '';

		if ($language !== NULL) {
			if ($this->needsJavascriptPlugin($language) && !isset($this->addedPlugins[$language])) {
				$this->addedPlugins[$language] = TRUE;
				$this->getPageRenderer()->addJsFooterFile(
					ExtensionManagementUtility::siteRelPath('google_code_prettify') .
					'Resources/Public/Javascript/lang-' . $language . '.js'
				);
			}
			$additionalHtml = ' class="language-' . $language . '"';
		}

		return
			'<pre class="prettyprint">' .
				'<code' . $additionalHtml . '>' .
				htmlspecialchars($code, ENT_NOQUOTES, 'UTF-8', FALSE) .
				'</code>' .
			'</pre>';
	}

	/**
	 * Test if the given language key is allowed to be used as a hint
	 *
	 * @param string $language
	 * @return boolean
	 */
	protected function isAllowedLanguageKey($language) {
		return in_array($language, Languages::getAllLanguages(), TRUE);
	}

	/**
	 * Test if the given language needs a javascript plugin
	 *
	 * @param string $language
	 * @return boolean
	 */
	protected function needsJavascriptPlugin($language) {
		return in_array($language, Languages::getPluginLanguages(), TRUE);
	}
}
