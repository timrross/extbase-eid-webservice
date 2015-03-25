<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

/** @var \Acme\Example\Core\EidBootstrap $bootstrap */
$bootstrap = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('Acme\\Example\\Core\\EidBootstrap', 'tx_example');

// Use the Extbase bootstrap object to load the correct typoscript config, including storagePids for classes.
$configuration = array(
    'vendorName' => 'Acme',
    'extensionName' => 'Example',
    'extensionKey' => 'tx_example',
    'pluginName' => 'Pi1'
);
$bootstrap->setExtensionConfiguration($configuration);
$bootstrap->initialize();

// Need to create the object manager here so it is available for everything else.
$objectManager = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('\TYPO3\CMS\Extbase\Object\ObjectManager'); 

$webService = $objectManager->get('Acme\\Example\\WebService');
$webService->handle();
