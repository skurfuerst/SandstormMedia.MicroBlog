Feature: RDFa tags are inserted around the content.

	Scenario: Test data properly loaded
		Given I load the test data
		And I am on posting listing
		Then I should see "Linked Data"

	Scenario: RDFa inserted
		Given I load the test data
		Given I am on posting listing
		Then I should find the following RDFa triples:
          | SUBJECT | PREDICATE     | OBJECT      |
          | X       | dcterms:title | Linked Data |
		And I should find namespace declaration "dcterms" "http://purl.org/dc/terms/" for "dcterms:title"

	Scenario: RDFa inserted on detail page
		Given I load the test data
		Given I am on posting listing
		And I follow "Linked Data"
		Then I should find the following RDFa triples:
          | SUBJECT | PREDICATE     | OBJECT            |
          | X       | dcterms:title | Linked Data       |
          | X       | sioc:content  | Bill Gates.*      |
		And I should find namespace declaration "dcterms" "http://purl.org/dc/terms/" for "dcterms:title"
		And I should find namespace declaration "sioc" "http://rdfs.org/sioc/ns#" for "sioc:content"