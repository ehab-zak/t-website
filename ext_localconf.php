<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

// icons for own content elements
/** @var \TYPO3\CMS\Core\Imaging\IconRegistry $iconRegistry */
$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
$iconRegistry->registerIcon(
	'tx_websites_ctypes_contactperson',
	\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
	[
		'source' => 'EXT:websites/Resources/Public/Icons/CTypes/contactperson.gif'
	]
);
$iconRegistry->registerIcon(
	'tx_websites_ctypes_image',
	\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
	[
		'source' => 'EXT:websites/Resources/Public/Icons/CTypes/image.gif'
	]
);
$iconRegistry->registerIcon(
	'tx_websites_ctypes_linkbutton',
	\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
	[
		'source' => 'EXT:websites/Resources/Public/Icons/CTypes/linkbutton.gif'
	]
);
$iconRegistry->registerIcon(
	'tx_websites_ctypes_skill',
	\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
	[
		'source' => 'EXT:websites/Resources/Public/Icons/CTypes/skill.gif'
	]
);
$iconRegistry->registerIcon(
	'tx_websites_ctypes_testimonial',
	\TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
	[
		'source' => 'EXT:websites/Resources/Public/Icons/CTypes/testimonial.gif'
	]
);


// custom design for backend login
if (TYPO3_MODE === 'BE') {
	$loginConf = [
		'loginLogo' => '//service.studioneun.de/belogin/Studio9-Logo.png',
		'loginHighlightColor' => '#2a8dd4',
		'loginBackgroundImage' => '//service.studioneun.de/belogin/Bg_Macbook.jpg',
	];
	$GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['backend'] = serialize($loginConf);
}
