<?php

/***************************************************************
 * Extension Manager/Repository config file for ext: "example"
 *
 * Manual updates:
 * Only the data in the array - anything else is removed by next write.
 * "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array(
	'title' => 'Acme Example',
	'description' => 'An extension to demonstrate eID web services using Extbase.', 
	'category' => 'module',
	'author' => 'Tim Ross',
	'author_email' => 'timrross@gmail.com',
	'state' => 'alpha',
	'internal' => '',
	'uploadfolder' => '0',
	'createDirs' => '',
	'clearCacheOnLoad' => 0,
	'version' => '0.1.0',
	'constraints' => array(
		'depends' => array(
			'typo3' => '6.2',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
);