<?php
namespace Acme\Example;

use TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager;
use Acme\Example\Domain\Repository\BlogRepository;

class WebService implements \TYPO3\CMS\Core\SingletonInterface {

    /**
     * The Extbase persistence manager
     * @var \TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager
     */
    protected $persistenceManager;

    /**
     * @var \Acme\Example\Domain\Repository\BlogRepository
     */ 
    protected $blogRepository; 

    /**
     * We need the persistence manager as it is used in the shutdown function
     * @param  \TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager $persistenceManager
     */
    public function injectPersistenceManager(PersistenceManager $persistenceManager) {
        $this->persistenceManager = $persistenceManager;
    }

    /**
     * @param \Acme\Example\Domain\Repository\BlogRepository
     */
    public function injectBlogRepository(BlogRepository $blogRepository) {
    	$this->blogRepository = $blogRepository;
    }


    /**
     * Handle a web request.
     */
	public function handle() {
		try {
			// Run the actions
			$this->run();

			// Make sure all changes to the models are saved in the database.
            $this->shutdown();

		} catch (\Exception $e) {
			$this->errorResponse($e->getMessage());
		}
	}

	protected function run() {
		$this->blogsAction();
	}

	protected function blogsAction() {
        header('Content-Type: application/json');
		$blogs = $this->blogRepository->findAll();
        foreach($blogs as $blog) {
            echo json_encode($blog->toJSON()) . "\n";

        }
	}

    /**
     * Run shutdown after the dispatch() method has run.
     * Persists all Domain object changes to the Persistence layer.
     * @return void
     */
    protected function shutdown() {
        $this->persistenceManager->persistAll();
    }

	/**
	 * Send an error response from the web service
	 * @param  string $message The error message
     * @return void
	 */
	protected function errorResponse($message) {
		header('HTTP 500 Internal Server Error', true, 500);
        header('Access-Control-Allow-Origin: *');
		echo $message . "\n";
	}

}