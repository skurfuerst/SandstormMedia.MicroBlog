Feature: RDFa tags are inserted around the content.

	Scenario: Test data properly loaded
		Given I load the test data
		And I am on posting listing
		Then I should see "Linked Data"

	Scenario: RDFa inserted
		Given I am on posting listing
		Then I should find RDFa triple "X" "dcterms:title" "Linked Data"
		And I should find namespace declaration "dcterms" "http://purl.org/dc/terms/" for "dcterms:title"

	Scenario: RDFa inserted on detail page
		Given I am on posting listing
		And I follow "Linked Data"
		Then I should find RDFa triple "X" "dcterms:title" "Linked Data"
		And I should find namespace declaration "dcterms" "http://purl.org/dc/terms/" for "dcterms:title"
		Then I should find RDFa triple "X" "sioc:content" "Tim Berners-Lee.*"
		And I should find namespace declaration "sioc" "http://rdfs.org/sioc/ns#" for "sioc:content"