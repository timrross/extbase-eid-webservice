<?php
// Make sure that we are executed only from the inside of TYPO3
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

// Register eID script that performs final FE user authentication. It will be called by the OpenID provider
$GLOBALS['TYPO3_CONF_VARS']['FE']['eID_include']['tx_example'] = 'EXT:'. $_EXTKEY .'/Resources/Private/Php/tx_example_eid.php';