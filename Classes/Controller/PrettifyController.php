<?php
/*                                                                     *
 * This file is brought to you by Georg Großberger                     *
 * (c) 2013 by Georg Großberger <contact@grossberger-ge.org>           *
 *                                                                     *
 * It is free software; you can redistribute it and/or modify it under *
 * the terms of the GNU General Public License, either version 3       *
 * of the License, or (at your option) any later version.              *
 *                                                                     */

namespace GeorgGrossberger\GoogleCodePrettify\Controller;

use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

/**
 * Controller for frontend output of the plugin
 *
 * @package GeorgGrossberger.GoogleCodePrettify
 * @author Georg Großberger <contact@grossberger-ge.org>
 * @copyright 2013 by Georg Großberger
 * @license GPL v3 http://www.gnu.org/licenses/gpl-3.0.txt
 */
class PrettifyController extends ActionController {

	/**
	 *
	 * @inject
	 * @var \GeorgGrossberger\GoogleCodePrettify\PrettyPrint
	 */
	protected $prettyPrint;

	/**
	 * Injects the pretty printer
	 *
	 * @param \GeorgGrossberger\GoogleCodePrettify\PrettyPrint $prettyPrint
	 */
	public function injectPrettyPrint(\GeorgGrossberger\GoogleCodePrettify\PrettyPrint $prettyPrint) {
		$this->prettyPrint = $prettyPrint;
	}

	/**
	 * Simply output the code of the plugin
	 *
	 * @return string
	 */
	public function displayAction() {
		$code = $this->settings['code'];
		$language = NULL;

		if (!empty($this->settings['language'])) {
			$language = $this->settings['language'];
		}

		return $this->prettyPrint->prettyPrint($code, $language);
	}
}
