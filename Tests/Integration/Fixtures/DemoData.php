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
		$blogEntry->setText('Tim Berners-Lee, director of the World Wide Web Consortium, coined the term in a design note discussing issues around the Semantic Web project.[2]. However, the idea is very old and is closely related to concepts such as the network model (database), citations between scholarly articles, and authority control in libraries. Text is taken from from Wikipedia.');

		$manager->persist($blogEntry);
		$manager->flush();
	}
}
?>