<?php

$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['realurl'] = array (
	/*
	 * Use two hooks for modifying URLs of rootpage
	 */
	'encodeSpURL_postProc' => array(
		'st9setup' => 'EXT:st9setup/Classes/Hooks/RealURL.php:&St9\St9setup\Hooks\RealURL->user_encodeSpURL_postProc',
	),
	'decodeSpURL_preProc' => array(
		'st9setup' => 'EXT:st9setup/Classes/Hooks/RealURL.php:&St9\St9setup\Hooks\RealURL->user_decodeSpURL_preProc',
	),
	'_DEFAULT' => array (
		/*
		 * Custom configuration section for rootpages, as urls to root page are created like "www.domain.de/de.html".
		 * So we hook into realurl and modify this.
		 * Configuration is done like defining aliases for all root pages: "<langcode>.html" => "<path>"
		 * Consider the current configuration for filename to get the correct urls
		 */
		'rootpages' => array(
			'/de.html' => '/',
			'/en.html' => '/en/start.html',
		),
		'init' => array (
			'enableCHashCache' => true,
			'appendMissingSlash' => 'ifNotFile,redirect',
			'adminJumpToBackend' => true,
			'enableUrlDecodeCache' => true,
			'enableUrlEncodeCache' => true,
			'emptyUrlReturnValue' => '/',
		),
		'redirects' => array(),
		'preVars' => array (
			0 => array (
				'GETvar' => 'L',
				'valueMap' => array (
					'de' => '0',
					'en' => '1',
				),
				'valueDefault' => 'de',
			),
			1 => array(
				'GETvar' => 'no_cache',
				'valueMap' => array(
					'nc' => 1,
				),
				'noMatch' => 'bypass',
			),
		),
		'pagePath' => array (
			'type' => 'user',
			'userFunc' => 'EXT:realurl/class.tx_realurl_advanced.php:&tx_realurl_advanced->main',
			'spaceCharacter' => '-',
			'languageGetVar' => 'L',
			'expireDays' => 7,
			'rootpage_id' => '1',
		),
		'fixedPostVars' => array (
			'newsDetailConfiguration' => array (
				array (
					'GETvar' => 'tx_news_pi1[news]',
					'lookUpTable' => array (
						'table' => 'tx_news_domain_model_news',
						'id_field' => 'uid',
						'alias_field' => 'title',
						'addWhereClause' => ' AND NOT deleted',
						'useUniqueCache' => 1,
						'useUniqueCache_conf' => array (
							'strtolower' => 1,
							'spaceCharacter' => '-',
						),
						'languageGetVar' => 'L',
						'languageExceptionUids' => '',
						'languageField' => 'sys_language_uid',
						'transOrigPointerField' => 'l10n_parent',
						'autoUpdate' => 1,
						'expireDays' => 180,
					),
				),
				array(
					'GETvar' => 'tx_news_pi1[controller]',
					'valueMap' => array(
						'News' => '',
					),
					'noMatch' => 'bypass'
				),
				array (
					'GETvar' => 'tx_news_pi1[action]',
					'valueMap' => array(
						'detail' => '',
					),
					'noMatch' => 'bypass'
				),
			),
			// enter pids of news detail pages here: <id (single, no list)> => 'newsDetailConfiguration'
			'65' => 'newsDetailConfiguration',
		),
		'postVarSets' => array (
			'_DEFAULT' => array (
				// tx_news pagebrowser
				'browse' => array (
					array (
						'GETvar' => 'tx_news_pi1[@widget_0][currentPage]',
						'valueMap' => array (),
##						mapping array is generated below
					),
				),
				'Filter' => array (
					array (
						'GETvar' => 'tx_news_pi1[controller]',
						'noMatch' => 'bypass',
					),
				),
				'Y' => array (
					array (
						'GETvar' => 'tx_news_pi1[overwriteDemand][year]',
						'valueMap' => array (
							'2012' => '2012',
							'2013' => '2013',
							'2014' => '2014',
							'2015' => '2015',
							'2016' => '2016',
							'2017' => '2017',
							'2018' => '2018',
							'2019' => '2019',
							'2020' => '2020',
							'2021' => '2021',
							'2022' => '2022',
							'2023' => '2023',
							'2024' => '2024',
							'2025' => '2025',
						),
					),
				),
				'M' => array (
					array (
						'GETvar' => 'tx_news_pi1[overwriteDemand][month]',
						'valueMap' => array (
							'01' => '01',
							'02' => '02',
							'03' => '03',
							'04' => '04',
							'05' => '05',
							'06' => '06',
							'07' => '07',
							'08' => '08',
							'09' => '09',
							'10' => '10',
							'11' => '11',
							'12' => '12',
						),
					),
				),
				'page' => array (
					array (
						'GETvar' => 'tx_news_pi1[@widget_0][currentPage]',
					),
				),
			),
		),
		'fileName' => array (

/*
			// filename: path/index.html
			'defaultToHTMLsuffixOnPrev' => 0,
			'acceptHTMLsuffix' => 1,
			'index' => array (
				'print.html' => array (
					'keyValues' => array (
						'type' => 98,
					),
				),
				'index.html' => array (
					'keyValues' => array (
					),
				),
			),
*/

			// filename: path.html
			'defaultToHTMLsuffixOnPrev' => 1,
			'acceptHTMLsuffix' => 1,
			'index' => array (
				'print.html' => array (
					'keyValues' => array (
						'type' => 98,
					),
				),
			),

		),
	),
);
