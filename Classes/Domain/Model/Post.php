<?php
namespace Acme\Example\Domain\Model;

/**
 * Post
 */
class Post extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * the blog for this post
	 *
	 * @var \Acme\Example\Domain\Model\Blog
	 */
	protected $blog = NULL;

	/**
	 * title
	 *
	 * @var string
	 */
	protected $title = '';

	/**
	 * body
	 *
	 * @var string
	 */
	protected $body = '';

	

    /**
     * @return string
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title) {
        $this->title = $title;
    }

	/**
	 * Returns the body
	 *
	 * @return string $body
	 */
	public function getBody() {
		return $this->body;
	}

	/**
	 * Sets the body
	 *
	 * @param string $body
	 * @return void
	 */
	public function setBody($body) {
		$this->body = $body;
	}

	/**
	 * Returns the blog
	 *
	 * @return \Acme\Example\Domain\Model\Blog $blog
	 */
	public function getBlog() {
		return $this->blog;
	}

	/**
	 * Sets the blog
	 *
	 * @param \Acme\Example\Domain\Model\blog $blog
	 * @return void
	 */
	public function setBlog(\Acme\Example\Domain\Model\Blog $blog) {
		$this->blog = $blog;
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
        $object->body = $this->body;
        return $object;
    }

}