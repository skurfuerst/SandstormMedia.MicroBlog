<?php
namespace SandstormMedia\MicroBlog\Domain\Model;

/*                                                                        *
 * This script belongs to the FLOW3 package "SandstormMedia.MicroBlog".   *
 *                                                                        *
 *                                                                        */

/**
 * A Blog Entry
 *
 * @scope prototype
 * @entity
 */
class BlogEntry {

	/**
	 * @var string
	 * @validate StringLength(minimum = 1, maximum = 100)
	 * @Column(length="100")
	 */
	protected $title;

	/**
	 * @var string
	 * @validate StringLength(minimum = 1, maximum = 100)
	 * @Column(length="100")
	 */
	protected $location;

	/**
	 * @var \DateTime
	 */
	protected $creationDate;

	/**
	 * @Column(type="text")
	 * @var string
	 */
	protected $teaser;

	/**
	 * @Column(type="text")
	 * @var string
	 */
	protected $text;

	public function __construct() {
		$this->creationDate = new \DateTime();
	}

	public function getTitle() {
		return $this->title;
	}

	public function setTitle($title) {
		$this->title = $title;
	}

	public function getLocation() {
		return $this->location;
	}

	public function setLocation($location) {
		$this->location = $location;
	}

	public function getCreationDate() {
		return $this->creationDate;
	}

	public function getTeaser() {
		return $this->teaser;
	}

	public function setTeaser($teaser) {
		$this->teaser = $teaser;
	}

	public function getText() {
		return $this->text;
	}

	public function setText($text) {
		$this->text = $text;
	}


}
?>