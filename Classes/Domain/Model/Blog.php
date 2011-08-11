<?php
namespace SandstormMedia\MicroBlog\Domain\Model;

/*                                                                        *
 * This script belongs to the FLOW3 package "SandstormMedia.MicroBlog".   *
 *                                                                        *
 *                                                                        */

/**
 * A Blog
 *
 * @scope prototype
 * @entity
 */
class Blog {

	/**
	 * The name
	 * @var string
	 */
	protected $name;


	/**
	 * Get the Blog's name
	 *
	 * @return string The Blog's name
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * Sets this Blog's name
	 *
	 * @param string $name The Blog's name
	 * @return void
	 */
	public function setName($name) {
		$this->name = $name;
	}

}
?>