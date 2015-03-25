<?php
namespace Acme\Example\Domain\Repository;

/**
 * The repository for Posts
 */
class PostRepository extends AbstractRepository {

    protected $defaultOrderings = array('crdate' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING);

}