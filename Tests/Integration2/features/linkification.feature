Feature: Links to other Linked Data Sources can be created

	Scenario: Linking ...
		Given I load the test data
		Given I am on "/sandstormmedia.microblog/blog/index"
		And wait
		And I follow "Edit"
		When I fill in "location" with "Berli"
		And trigger the keyUp event on "#location"
		And wait

		Then I should see "Berlin" within ".sm-semantic.linkification"
		Then I should see "Berlin Wall" within ".sm-semantic.linkification"
		When click on the linked data URI "http://dbpedia.org/resource/Berlin"
		And submit the form
		And I follow "Linked Data"

		Then I should find the following RDFa triples:
          | SUBJECT | PREDICATE       | OBJECT                             |
          | X       | foaf:based_near | http://dbpedia.org/resource/Berlin |
          | X       | sioc:content    | Bill Gates.*                       |
