<?php

// register pageTS files

// website
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::registerPageTSConfigFile(
	'websites',
	'Configuration/TSConfig/Website/Page/folder-website.typoscript',
	'EXT:websites :: Website Folder/Website'
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::registerPageTSConfigFile(
	'websites',
	'Configuration/TSConfig/Website/Page/folder-news.typoscript',
	'EXT:websites :: Website Folder/News'
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::registerPageTSConfigFile(
	'websites',
	'Configuration/TSConfig/Website/Page/backendlayouts.typoscript',
	'EXT:websites :: Website Backend Layouts'
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::registerPageTSConfigFile(
	'websites',
	'Configuration/TSConfig/Website/Page/gridlayouts.typoscript',
	'EXT:websites :: Website Grid Layouts'
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::registerPageTSConfigFile(
	'websites',
	'Configuration/TSConfig/Website/Page/customcontentobjects.typoscript',
	'EXT:websites :: Custom Content Objects'
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::registerPageTSConfigFile(
	'websites',
	'Configuration/TSConfig/Website/Linkhandler/linkhandler-news.typoscript',
	'EXT:websites :: Linkhandler for news'
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::registerPageTSConfigFile(
	'websites',
	'Configuration/TSConfig/Website/Linkhandler/linkhandler-worksamples.typoscript',
	'EXT:websites :: Linkhandler for worksamples'
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::registerPageTSConfigFile(
	'websites',
	'Configuration/TSConfig/Website/Page/news.typoscript',
	'EXT:websites :: Website News settings'
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::registerPageTSConfigFile(
	'websites',
	'Configuration/TSConfig/Website/Page/rte.typoscript',
	'EXT:websites :: Website RTE settings'
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::registerPageTSConfigFile(
	'websites',
	'Configuration/TSConfig/Website/Page/clearpagecache.typoscript',
	'EXT:websites :: Clear complete page cache on editing'
);

// newsletter
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::registerPageTSConfigFile(
	'websites',
	'Configuration/TSConfig/Newsletter/Page/folder-newsletter-main.typoscript',
	'EXT:websites :: Newsletter Folder/Main'
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::registerPageTSConfigFile(
	'websites',
	'Configuration/TSConfig/Newsletter/Page/folder-newsletter-recipients.typoscript',
	'EXT:websites :: Newsletter Folder/Recipients'
);
