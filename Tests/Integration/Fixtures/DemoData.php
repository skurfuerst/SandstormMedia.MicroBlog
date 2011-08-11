<?php
namespace SandstormMedia\MicroBlog\Tests\Integration\Fixtures;

use Doctrine\ORM\EntityManager;
use Doctrine\Common\DataFixtures\FixtureInterface;

class DemoData implements FixtureInterface {
	public function load($manager) {
		$blogEntry = new \SandstormMedia\MicroBlog\Domain\Model\BlogEntry();
		$blogEntry->setLocation('Dresden');
		$blogEntry->setTitle('Linked Data');
		$blogEntry->setTeaser('In computing, linked Data describes a method of publishing structured data so that it can be interlinked and become more useful. It builds upon standard Web technologies such as HTTP and URIs, but rather than using them to serve web pages for human readers, it extends them to share information in a way that can be read automatically by computers. This enables data from different sources to be connected and queried.');
		$blogEntry->setText('Bill Gates, Founder of Microsoft, is a rich man. He lives with his wife in Berlin, a beautiful city.
TYPO3 is a Content Management System, where the founder, Kasper Skaarhoj, lives in Denmark.
A good friend of him is Sebastian Kurfuerst, who is CFO at Sandstorm Media UG. One of his TYPO3 friends is Thomas Maroschik, who also owns an agency.');

		$manager->persist($blogEntry);
		$manager->flush();
	}
}
?>