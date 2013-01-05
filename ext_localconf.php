<?php
/*                                                                     *
 * This file is brought to you by Georg Großberger                     *
 * (c) 2013 by Georg Großberger <contact@grossberger-ge.org>           *
 *                                                                     *
 * It is free software; you can redistribute it and/or modify it under *
 * the terms of the GNU General Public License, either version 3       *
 * of the License, or (at your option) any later version.              *
 *                                                                     */


\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/Typoscript/', 'Google Code Prettify');
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'GeorgGrossberger.GoogleCodePrettify',
	'Pi1',
	array(
		'Prettify' => 'display'
	)
);
