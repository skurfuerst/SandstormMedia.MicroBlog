<?php
namespace SandstormMedia\MicroBlog\Command;

/*                                                                        *
 * This script belongs to the FLOW3 package "SandstormMedia.MicroBlog".   *
 *                                                                        *
 *                                                                        */


include_once(FLOW3_PATH_PACKAGES . 'Application/SandstormMedia.MicroBlog/Tests/Integration/Fixtures/DemoData.php');

/**
 * Test command controller for the SandstormMedia.MicroBlog package
 *
 * @scope singleton
 */
class TestCommandController extends \TYPO3\FLOW3\MVC\Controller\CommandController {

	/**
	 * @var \Doctrine\Common\Persistence\ObjectManager
	 * @inject
	 */
	protected $entityManager;

	/**
	 * Load demo data. !!! EMPTIES THE DATABASE!
	 *
	 * @return void
	 */
	public function resetDatabaseCommand() {
		$fixtureLoader = new \Doctrine\Common\DataFixtures\Loader();

		$fixtureLoader->addFixture(new \SandstormMedia\MicroBlog\Tests\Integration\Fixtures\DemoData());

		$purger = new \Doctrine\Common\DataFixtures\Purger\ORMPurger();
		$executor = new \Doctrine\Common\DataFixtures\Executor\ORMExecutor($this->entityManager, $purger);

		$executor->execute($fixtureLoader->getFixtures());

		$this->response->appendContent('Reset demo data.');
	}

}

?>