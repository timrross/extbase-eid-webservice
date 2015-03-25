<?php
namespace Acme\Example\Core;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Core\Bootstrap;
use TYPO3\CMS\Extbase\Service\TypoScriptService;
use TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController;
use TYPO3\CMS\Frontend\Utility\EidUtility;

/**
 * This class is basically taken from:
 * https://github.com/helhum/ajax_example/blob/master/Classes/Core/EidRequestBootstrap.php
 *
 * This needs to be created because the TS settings for persistence need to be loaded in to Extbase, and 
 * without all this bootstrapping, the different PIDs for the models do not get loaded.
 */
class EidBootstrap {

    protected $extensionConfiguration;

    /**
     * @var array
     */
    protected $pluginConfiguration;

    /**
     * @var Bootstrap
     */
    protected $bootstrap;

    public function setExtensionConfiguration($configuration) {
        $this->extensionConfiguration = $configuration;
    }

    public function getExtensionConfiguration() {
        return $this->extensionConfiguration;
    }

    public function getPluginConfiguration() {
        return $this->pluginConfiguration;
    }

    public function initialize() {

        $feUserObj = EidUtility::initFeUser();

        $pageId = GeneralUtility::_GET('id') ?: 1;

        /** @var TypoScriptFrontendController $typoScriptFrontendController */
        $typoScriptFrontendController = GeneralUtility::makeInstance(
            'TYPO3\\CMS\\Frontend\\Controller\\TypoScriptFrontendController',
            $GLOBALS['TYPO3_CONF_VARS'],
            $pageId,
            0,
            TRUE
        );
        $GLOBALS['TSFE'] = $typoScriptFrontendController;
        $typoScriptFrontendController->connectToDB();
        $typoScriptFrontendController->fe_user = $feUserObj;
        $typoScriptFrontendController->id = $pageId;
        $typoScriptFrontendController->determineId();
        $typoScriptFrontendController->getCompressedTCarray();
        $typoScriptFrontendController->initTemplate();
        $typoScriptFrontendController->getConfigArray();
        $typoScriptFrontendController->includeTCA();

        /** @var TypoScriptService $typoScriptService */
        $typoScriptService = GeneralUtility::makeInstance('TYPO3\\CMS\\Extbase\\Service\\TypoScriptService');
        $pluginTyposcript = $typoScriptFrontendController->tmpl->setup['plugin.'][$this->extensionConfiguration['extensionKey'] . '.'];
        $this->pluginConfiguration = $typoScriptService->convertTypoScriptArrayToPlainArray($pluginTyposcript);

        // Set configuration to call the plugin
        $extensionConfiguration['settings'] = $this->pluginConfiguration['settings'];
        $extensionConfiguration['persistence'] = $this->pluginConfiguration['persistence'];

        $this->extensionConfiguration = array_merge($extensionConfiguration, $this->extensionConfiguration);
        
        $this->bootstrap = GeneralUtility::makeInstance('TYPO3\\CMS\\Extbase\\Core\\Bootstrap');
        $this->bootstrap->initialize($this->extensionConfiguration);
    }

}
