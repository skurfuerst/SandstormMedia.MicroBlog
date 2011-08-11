<?php
namespace SandstormMedia\MicroBlog\Controller;

/*                                                                        *
 * This script belongs to the FLOW3 package "SandstormMedia.MicroBlog".   *
 *                                                                        *
 *                                                                        */

use \TYPO3\FLOW3\MVC\Controller\ActionController;
use \SandstormMedia\MicroBlog\Domain\Model\Blog;

/**
 * Blog controller for the SandstormMedia.MicroBlog package 
 *
 * @scope singleton
 */
class BlogController extends ActionController {

	/**
	 * @inject
	 * @var \SandstormMedia\MicroBlog\Domain\Repository\BlogRepository
	 */
	protected $blogRepository;

	/**
	 * Shows a list of blogs
	 */
	public function indexAction() {
		$this->view->assign('blogs', $this->blogRepository->findAll());
	}

	/**
	 * Shows a single blog object
	 *
	 * @param \SandstormMedia\MicroBlog\Domain\Model\Blog $blog The blog to show
	 */
	public function showAction(Blog $blog) {
		$this->view->assign('blog', $blog);
	}

	/**
	 * Shows a form for creating a new blog object
	 */
	public function newAction() {
	}

	/**
	 * Adds the given new blog object to the blog repository
	 *
	 * @param \SandstormMedia\MicroBlog\Domain\Model\Blog $blog A new blog to add
	 */
	public function createAction(Blog $newBlog) {
		$this->blogRepository->add($newBlog);
		$this->flashMessageContainer->add('Created a new blog.');
		$this->redirect('index');
	}

	/**
	 * Shows a form for editing an existing blog object
	 *
	 * @param \SandstormMedia\MicroBlog\Domain\Model\Blog $blog The blog to edit
	 */
	public function editAction(Blog $blog) {
		$this->view->assign('blog', $blog);
	}

	/**
	 * Updates the given blog object
	 *
	 * @param \SandstormMedia\MicroBlog\Domain\Model\Blog $blog The blog to update
	 */
	public function updateAction(Blog $blog) {
		$this->blogRepository->update($blog);
		$this->flashMessageContainer->add('Updated the blog.');
		$this->redirect('index');
	}

	/**
	 * Removes the given blog object from the blog repository
	 *
	 * @param \SandstormMedia\MicroBlog\Domain\Model\Blog $blog The blog to delete
	 */
	public function deleteAction(Blog $blog) {
		$this->blogRepository->remove($blog);
		$this->flashMessageContainer->add('Deleted a blog.');
		$this->redirect('index');
	}

}

?>