<?php

// set default number of tt_content:imagecols to 1 instead of 2 (core default value)
$GLOBALS['TCA']['tt_content']['columns']['imagecols']['config']['default'] = 1;

// disable some fields in TCE for special cObjs
// colPos 102 = accordeonentry-headline
// colPos 103 = accordeonentry-content
$displayCondExcludeAccordeonentryHeadline = 'FIELD:tx_gridelements_columns:!=:102';
$displayCondExcludeAccordeonentryContent = 'FIELD:tx_gridelements_columns:!=:103';
$displayCondExcludeAccordeonentryAll = [
	'AND' => [
		'FIELD:tx_gridelements_columns:!=:102',
		'FIELD:tx_gridelements_columns:!=:103',
	],
];
$GLOBALS['TCA']['tt_content']['columns']['header_layout']['displayCond'] = $displayCondExcludeAccordeonentryHeadline;
$GLOBALS['TCA']['tt_content']['columns']['bodytext']['displayCond'] = $displayCondExcludeAccordeonentryHeadline;
$GLOBALS['TCA']['tt_content']['columns']['assets']['displayCond'] = $displayCondExcludeAccordeonentryContent;
$GLOBALS['TCA']['tt_content']['columns']['image_zoom']['displayCond'] = $displayCondExcludeAccordeonentryAll;
$GLOBALS['TCA']['tt_content']['columns']['imagewidth']['displayCond'] = $displayCondExcludeAccordeonentryAll;
$GLOBALS['TCA']['tt_content']['columns']['imageheight']['displayCond'] = $displayCondExcludeAccordeonentryAll;
$GLOBALS['TCA']['tt_content']['columns']['imageorient']['displayCond'] = $displayCondExcludeAccordeonentryContent;
$GLOBALS['TCA']['tt_content']['columns']['imagecols']['displayCond'] = $displayCondExcludeAccordeonentryAll;
$GLOBALS['TCA']['tt_content']['columns']['sectionIndex']['displayCond'] = $displayCondExcludeAccordeonentryAll;

// define own cObjs
$tca = [
	'palettes' => [
		'header.nolink' => [
			'showitem' => '
				header;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:header_formlabel,
				--linebreak--,
				header_layout;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:header_layout_formlabel,
			',
		],
	],
	'types' => [
		'linkbutton' => [
			'showitem' => '
					--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.general;general,
					--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.header;header.nolink,rowDescription,
					layout,bodytext;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:bodytext_formlabel,header_link,
				--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access,
					hidden;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:field.default.hidden,
					--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.access;access,
				--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.extended',
		],
		'skill' => [
			'showitem' => '
					--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.general;general,
					--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.header;header.nolink,rowDescription,
					bodytext;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:bodytext_formlabel,header_link,
				--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.media,
					assets,
				--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access,
					hidden;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:field.default.hidden,
					--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.access;access,
				--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.extended',
		],
		'image' => [
			'showitem' => '
					--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.general;general,
					header;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:header_formlabel,rowDescription,
					bodytext;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:bodytext_formlabel,header_link,
				--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.media,
					assets,
				--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access,
					hidden;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:field.default.hidden,
					--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.access;access,
				--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.extended',
		],
		'testimonial' => [
			'showitem' => '
					--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.general;general,
					--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.header;header.nolink,rowDescription,
					bodytext;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:bodytext_formlabel,header_link,
				--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.media,
					assets,
				--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access,
					hidden;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:field.default.hidden,
					--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.access;access,
				--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.extended',
			'columnsOverrides' => [
				'bodytext' => [
					'defaultExtras' => 'richtext:rte_transform[mode=ts_css]',
				],
			],
		],
		'contactperson' => [
			'showitem' => '
					--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.general;general,
					--palette--;LLL:EXT:websites/Resources/Private/Language/locallang.xlf:table_ttcontent_contactperson_header;header.nolink,
					subheader;LLL:EXT:websites/Resources/Private/Language/locallang.xlf:table_ttcontent_contactperson_subheader,
					rowDescription,
					bodytext;LLL:EXT:websites/Resources/Private/Language/locallang.xlf:table_ttcontent_contactperson_bodytext,
				--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.media,
					assets,
				--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access,
					hidden;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:field.default.hidden,
					--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.access;access,
				--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.extended',
			'columnsOverrides' => [
				'bodytext' => [
					'defaultExtras' => 'richtext:rte_transform[mode=ts_css]',
				],
			],
		],
		'teaser' => [
			'showitem' => '
					--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.general;general,
					header;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:header_formlabel,rowDescription,
					header_link,
				--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.media,
					assets,
				--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access,
					hidden;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:field.default.hidden,
					--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.access;access,
				--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.extended',
		],
	],
	'columns' => [
		'CType' => [
			'config' => [
				'items' => [
					'customelements-divider' => [
						'LLL:EXT:websites/Resources/Private/Language/locallang.xlf:customcontentobjects_header',
						'--div--',
					],
					'linkbutton' => [
						'LLL:EXT:websites/Resources/Private/Language/locallang.xlf:customcontentobjects_linkbutton_title',
						'linkbutton',
						'EXT:websites/Resources/Public/Icons/CTypes/linkbutton.gif',
					],
					'skill' => [
						'LLL:EXT:websites/Resources/Private/Language/locallang.xlf:customcontentobjects_skill_title',
						'skill',
						'EXT:websites/Resources/Public/Icons/CTypes/skill.gif',
					],
					'image' => [
						'LLL:EXT:websites/Resources/Private/Language/locallang.xlf:customcontentobjects_image_title',
						'image',
						'EXT:websites/Resources/Public/Icons/CTypes/image.gif',
					],
					'testimonial' => [
						'LLL:EXT:websites/Resources/Private/Language/locallang.xlf:customcontentobjects_testimonial_title',
						'testimonial',
						'EXT:websites/Resources/Public/Icons/CTypes/testimonial.gif',
					],
					'contactperson' => [
						'LLL:EXT:websites/Resources/Private/Language/locallang.xlf:customcontentobjects_contactperson_title',
						'contactperson',
						'EXT:websites/Resources/Public/Icons/CTypes/contactperson.gif',
					],
					'teaser' => [
						'LLL:EXT:websites/Resources/Private/Language/locallang.xlf:customcontentobjects_teaser_title',
						'teaser',
						'EXT:websites/Resources/Public/Icons/CTypes/teaser.gif',
					],
				],
			],
		],
	],
	'ctrl' => [
		'typeicon_classes' => [
			'linkbutton' => 'tx_websites_ctypes_linkbutton',
			'skill' => 'tx_websites_ctypes_skill',
			'image' => 'tx_websites_ctypes_image',
			'testimonial' => 'tx_websites_ctypes_testimonial',
			'contactperson' => 'tx_websites_ctypes_contactperson',
			'teaser' => 'tx_websites_ctypes_teaser',
		],
	],
];
$GLOBALS['TCA']['tt_content'] = array_replace_recursive($GLOBALS['TCA']['tt_content'], $tca);


