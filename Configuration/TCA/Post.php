<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$GLOBALS['TCA']['tx_example_domain_model_post'] = array(
	'ctrl' => $GLOBALS['TCA']['tx_example_domain_model_post']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'hidden, title, body, blog',
	),
	'types' => array(
		'1' => array('showitem' => 'hidden;;1, title, body, blog, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
	),
	'columns' => array(

		't3ver_label' => array(
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'max' => 255,
			)
		),
	
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
			'config' => array(
				'type' => 'check',
			),
		),
		'starttime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
		'endtime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),

		'title' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:example/Resources/Private/Language/locallang.xlf:tx_example_domain_model_post.title',
			'config' => array(
				'type' => 'text',
				'cols' => 120,
				'rows' => 10,
				'eval' => 'trim'
			),
		),
		'body' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:example/Resources/Private/Language/locallang.xlf:tx_example_domain_model_post.body',
			'config' => array(
				'type' => 'text',
				'cols' => 120,
				'rows' => 10,
				'eval' => 'trim'
			),
		),
		'blog' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:example/Resources/Private/Language/locallang.xlf:tx_example_domain_model_post.blog',
			'config' => array(
				'type' => 'select',
                'readOnly' => 1,
				'foreign_table' => 'tx_example_domain_model_blog',
				'minitems' => 1,
				'maxitems' => 1,
				'size' => 1,
			),
		)
	),
);
