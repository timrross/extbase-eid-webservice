<?php
namespace Acme\Example\Domain\Model;

/**
 * Blog
 */
class Blog extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * title
	 *
	 * @var string
	 */
	protected $title = '';

	/**
	 * description
	 *
	 * @var string
	 */
	protected $description = '';

    /**
     * The posts in this blog
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Acme\Example\Domain\Model\Post>
     * @lazy
     */
    protected $posts;

    /**
     * __construct
     */
    public function __construct() {
        //Do not remove the next line: It would break the functionality
        $this->initStorageObjects();
    }

    /**
     * Initializes all ObjectStorage properties
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     *
     * @return void
     */
    protected function initStorageObjects() {
        $this->posts = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }


	/**
	 * Returns the title
	 *
	 * @return string $title
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * Sets the title
	 *
	 * @param string $title
	 * @return void
	 */
	public function setTitle($title) {
		$this->title = $title;
	}

	/**
	 * Returns the description
	 *
	 * @return string $description
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * Sets the description
	 *
	 * @param string $description
	 * @return void
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

    /**
     * Return the posts in this blog.
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Acme\Example\Domain\Model\Post>
     */
    public function getPosts() {
        return $this->posts;
    }

    /**
     * Sets the posts
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Acme\Example\Domain\Model\Post> $posts
     * @return void
     */
    public function setPosts(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $posts) {
        $this->posts = $posts;
    }

    /**
     * @param \Acme\Example\Domain\Model\Post $post
     * @return void
     */
    public function addPost(Post $post) {
        $this->posts->attach($post);
    }

    /**
     * @param  \Acme\Example\Domain\Model\Post  $post The post to remove
     * @return void
     */
    public function removePost(Post $post) {
        $this->posts->detach($post);
    }

    /**
     * Create a new object ready for JSON stringification. 
     *
     * This doesn't return string, but an object ready to be passed into json_encode.
     * 
     * @return object
     */
    public function toJSON() {
        $object = new \stdClass();
        $object->title = $this->title;
        $object->description = $this->description;
        $object->posts = array();
        foreach ($this->posts as $post) {
            array_push($object->posts, $post->toJSON());
        }
        return $object;

    }

}