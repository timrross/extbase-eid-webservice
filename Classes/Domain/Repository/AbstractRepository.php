<?php
namespace Acme\Example\Domain\Repository;

/**
 * The abstract repository with debug function
 */
class AbstractRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {

    
    public function initializeObject() {
        $defaultQuerySettings = $this->createQuery()->getQuerySettings();
        $defaultQuerySettings->setRespectStoragePage(TRUE);
        $this->setDefaultQuerySettings($defaultQuerySettings);
    }
    
    /**
     * Debugs a SQL query from a QueryResult
     *
     * @param \TYPO3\CMS\Extbase\Persistence\Generic\QueryResult $queryResult
     * @param boolean $explainOutput
     * @return void
     */
    public function debugQuery(\TYPO3\CMS\Extbase\Persistence\Generic\QueryResult $queryResult, $explainOutput = FALSE){
      $GLOBALS['TYPO3_DB']->debugOuput = 2;
      if($explainOutput){
        $GLOBALS['TYPO3_DB']->explainOutput = true;
      }
      $GLOBALS['TYPO3_DB']->store_lastBuiltQuery = true;
      $queryResult->toArray();
      // Use SqlFormatter class to output the SQL nicely.
      echo \SqlFormatter::format($GLOBALS['TYPO3_DB']->debug_lastBuiltQuery, false);
     
      $GLOBALS['TYPO3_DB']->store_lastBuiltQuery = false;
      $GLOBALS['TYPO3_DB']->explainOutput = false;
      $GLOBALS['TYPO3_DB']->debugOuput = false;
    }

}