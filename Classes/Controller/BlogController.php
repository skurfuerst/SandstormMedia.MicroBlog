<?php
namespace SandstormMedia\MicroBlog\Controller;

/*                                                                        *
 * This script belongs to the FLOW3 package "SandstormMedia.MicroBlog".   *
 *                                                                        *
 *                                                                        */

use \TYPO3\FLOW3\MVC\Controller\ActionController;
use \SandstormMedia\MicroBlog\Domain\Model\BlogEntry;

/**
 * BlogEntry controller for the SandstormMedia.MicroBlogEntry package
 *
 * @scope singleton
 */
class BlogController extends ActionController {

	/**
	 * @inject
	 * @var \SandstormMedia\MicroBlog\Domain\Repository\BlogEntryRepository
	 */
	protected $blogEntryRepository;

	/**
	 * Shows a list of blogs
	 */
	public function indexAction() {
		$this->view->assign('blogs', $this->blogEntryRepository->findAll());
	}

	/**
	 * Shows a single BlogEntry object
	 *
	 * @param \SandstormMedia\MicroBlog\Domain\Model\BlogEntry $BlogEntry The BlogEntry to show
	 */
	public function showAction(BlogEntry $blog) {
		$this->view->assign('blog', $blog);
	}

	/**
	 * Shows a form for creating a new BlogEntry object
	 */
	public function newAction() {
	}

	/**
	 * Adds the given new BlogEntry object to the BlogEntry repository
	 *
	 * @param \SandstormMedia\MicroBlog\Domain\Model\BlogEntry $blogEntry A new BlogEntry to add
	 */
	public function createAction(BlogEntry $newBlog) {
		$this->blogEntryRepository->add($newBlog);
		$this->flashMessageContainer->add('Created a new blog.');
		$this->redirect('index');
	}

	/**
	 * Shows a form for editing an existing BlogEntry object
	 *
	 * @param \SandstormMedia\MicroBlog\Domain\Model\BlogEntry $blogEntry The BlogEntry to edit
	 */
	public function editAction(BlogEntry $blogEntry) {
		$this->view->assign('blog', $blogEntry);
	}

	/**
	 * Updates the given BlogEntry object
	 *
	 * @param \SandstormMedia\MicroBlog\Domain\Model\BlogEntry $blogEntry The BlogEntry to update
	 */
	public function updateAction(BlogEntry $blogEntry) {
		$this->blogEntryRepository->update($blogEntry);
		$this->flashMessageContainer->add('Updated the blog.');
		$this->redirect('index');
	}

	/**
	 * Removes the given BlogEntry object from the BlogEntry repository
	 *
	 * @param \SandstormMedia\MicroBlog\Domain\Model\BlogEntry $blogEntry The BlogEntry to delete
	 */
	public function deleteAction(BlogEntry $blogEntry) {
		$this->blogEntryRepository->remove($blogEntry);
		$this->flashMessageContainer->add('Deleted a blog.');
		$this->redirect('index');
	}

}

?>