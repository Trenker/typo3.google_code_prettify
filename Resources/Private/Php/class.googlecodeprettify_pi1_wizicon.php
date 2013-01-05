<?php
/*                                                                     *
 * This file is brought to you by Georg Großberger                     *
 * (c) 2013 by Georg Großberger <contact@grossberger-ge.org>           *
 *                                                                     *
 * It is free software; you can redistribute it and/or modify it under *
 * the terms of the GNU General Public License, either version 3       *
 * of the License, or (at your option) any later version.              *
 *                                                                     */

/**
 * Wizard Icon class for the BE page module
 *
 * @package GeorgGrossberger.GoogleCodePrettify
 * @author Georg Großberger <contact@grossberger-ge.org>
 * @copyright 2013 by Georg Großberger
 * @license GPL v3 http://www.gnu.org/licenses/gpl-3.0.txt
 */
class googlecodeprettify_pi1_wizicon {

	/**
	 * Add our wizard item
	 *
	 * @param array $wizardItems
	 * @return array
	 */
	public function proc($wizardItems) {
		$wizardItems['plugins_tx_googleprettyprint'] = array(
			'icon'        => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('google_code_prettify') . 'Resources/Public/Icons/ce_wiz.png',
			'title'       => $GLOBALS['LANG']->sL('LLL:EXT:google_code_prettify/Resources/Private/Language/locallang.xml:plugin.title'),
			'description' => $GLOBALS['LANG']->sL('LLL:EXT:google_code_prettify/Resources/Private/Language/locallang.xml:plugin.description'),
			'params'      => '&defVals[tt_content][CType]=list&defVals[tt_content][list_type]=googlecodeprettify_pi1'
		);
		return $wizardItems;
	}

}
