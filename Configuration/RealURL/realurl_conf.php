<?php

$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['realurl'] = [
	'_DEFAULT' => [
		'init' => [
			'enableCHashCache' => true,
			'appendMissingSlash' => 'ifNotFile,redirect',
			'adminJumpToBackend' => true,
			'enableUrlDecodeCache' => true,
			'enableUrlEncodeCache' => true,
			'emptyUrlReturnValue' => '/',
		],
		'redirects' => [],
		'preVars' => [
			0 => [
				'GETvar' => 'L',
				'valueMap' => [
// no 'de' path segment
//					'de' => '0',
					'en' => '1',
				],
				'noMatch' => 'bypass',
			],
			1 => [
				'GETvar' => 'no_cache',
				'valueMap' => [
					'nc' => 1,
				],
				'noMatch' => 'bypass',
			],
		],
		'pagePath' => [
			'type' => 'user',
			'userFunc' => 'EXT:realurl/class.tx_realurl_advanced.php:&tx_realurl_advanced->main',
			'spaceCharacter' => '-',
			'languageGetVar' => 'L',
			'expireDays' => 7,
			'rootpage_id' => '1',
		],
		'fixedPostVars' => [
			'newsDetailConfiguration' => [
				[
					'GETvar' => 'tx_news_pi1[news]',
					'lookUpTable' => [
						'table' => 'tx_news_domain_model_news',
						'id_field' => 'uid',
						'alias_field' => 'title',
						'addWhereClause' => ' AND NOT deleted',
						'useUniqueCache' => 1,
						'useUniqueCache_conf' => [
							'strtolower' => 1,
							'spaceCharacter' => '-',
						],
						'languageGetVar' => 'L',
						'languageExceptionUids' => '',
						'languageField' => 'sys_language_uid',
						'transOrigPointerField' => 'l10n_parent',
						'autoUpdate' => 1,
						'expireDays' => 180,
					],
				],
				[
					'GETvar' => 'tx_news_pi1[controller]',
					'valueMap' => [
						'News' => '',
					],
					'noMatch' => 'bypass',
				],
				[
					'GETvar' => 'tx_news_pi1[action]',
					'valueMap' => [
						'detail' => '',
					],
					'noMatch' => 'bypass',
				],
			],
			// enter pids of news detail pages here: <id (single, no list)> => 'newsDetailConfiguration'
			'18' => 'newsDetailConfiguration',

		],
		'postVarSets' => [
			'_DEFAULT' => [
				// tx_news pagebrowser
				'browse' => [
					[
						'GETvar' => 'tx_news_pi1[@widget_0][currentPage]',
						'valueMap' => [],
##						mapping array is generated below
					],
				],
			],
		],
		'fileName' => [
			// filename: path.html
			'defaultToHTMLsuffixOnPrev' => 1,
			'acceptHTMLsuffix' => 1,
			'index' => [
				'print.html' => [
					'keyValues' => [
						'type' => 98,
					],
				],
			],
		],
	],
];

