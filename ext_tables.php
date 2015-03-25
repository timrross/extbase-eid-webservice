<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}


\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'Acme' . $_EXTKEY,
    'Pi1',
    'Example eID Web Service'
);


\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Acme Example Web Service');

$extPath = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY);

/** Blogs */
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_example_domain_model_blog');
$GLOBALS['TCA']['tx_example_domain_model_blog'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:example/Resources/Private/Language/locallang.xlf:tx_example_domain_model_blog',
		'label' => 'title',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,

		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'dynamicConfigFile' => $extPath . 'Configuration/TCA/Blog.php',
		'iconfile' => $extPath . 'Resources/Public/Icons/tx_example_domain_model_blog.gif'
	),
);

/** Entries */
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_example_domain_model_post');
$GLOBALS['TCA']['tx_example_domain_model_post'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:example/Resources/Private/Language/locallang.xlf:tx_example_domain_model_post',
		'label' => 'title',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,

		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'dynamicConfigFile' => $extPath . 'Configuration/TCA/Post.php',
		'iconfile' => $extPath . 'Resources/Public/Icons/tx_example_domain_model_post.gif'
	),
);