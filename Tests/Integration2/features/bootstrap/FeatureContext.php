<?php

use Behat\Behat\Context\ClosuredContextInterface,
    Behat\Behat\Context\TranslatedContextInterface,
    Behat\Behat\Context\BehatContext,
    Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;

require_once 'mink/autoload.php'; require_once 'PHPUnit/Autoload.php'; require_once 'PHPUnit/Framework/Assert/Functions.php';
//
// Require 3rd-party libraries here:
//
//   require_once 'PHPUnit/Autoload.php';
//   require_once 'PHPUnit/Framework/Assert/Functions.php';
//

/**
 * Features context.
 */
class FeatureContext extends Behat\Mink\Behat\Context\MinkContext
{

	/**
     * @Given /^I load the test data$/
     */
    public function iLoadTheTestData()
    {
        //throw new PendingException();
    }

    /**
     * @Given /^trigger the keyUp event on "([^"]*)"$/
     */
    public function triggerTheKeyUpEventOn($argument1)
    {
		$this->getSession();
        throw new PendingException();
    }

    /**
     * @Given /^wait$/
     */
    public function wait()
    {
		sleep(5);
		echo $this->getSession()->getPage()->getContent();
    }

	/**
     * @When /^click on the linked data URI "([^"]*)"$/
     */
    public function clickOnTheLinkedDataURI($argument1)
    {
        throw new PendingException();
    }

    /**
     * @Then /^I should find the following RDFa triples:$/
     */
    public function iShouldFindTheFollowingRDFaTriples(TableNode $table)
    {
        throw new PendingException();
    }

}
