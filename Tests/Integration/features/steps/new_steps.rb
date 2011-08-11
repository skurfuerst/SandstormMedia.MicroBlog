Given /^I load the test data$/ do
  if !ENV['FLOW3_ROOTPATH']
    raise(RuntimeError, "FLOW3_ROOTPATH not set.")
  end

  system(ENV['FLOW3_ROOTPATH'] + "/flow3 sandstormmedia.microblog:test:resetdatabase")
end


Then /^(?:|I )should find tag "([^"]*)" with attribute "([^"]*)" and value "([^"]*)"$/ do |selector, attributeName, value|
  tag = find(selector)
  assert_equal(tag[attributeName], value)
end

Then /^(?:|I )should find namespace declaration "([^"]*)" "([^"]*)" for "([^"]*)"$/ do |prefix, fullNamespace, predicateCurie|
  tag = find("span[property='" + predicateCurie +"']")
  assert_equal(fullNamespace, tag['xmlns:' + prefix])
end

Then /^(?:|I )should find the following RDFa triples:$/ do |table|

  table.hashes.each do |triple|
    objectRegex = Regexp.new("^" + triple['OBJECT'] + "$")

    tag = find("span[property='" + triple['PREDICATE'] + "']")

		if tag['content'] != ''
			assert_equal(triple['OBJECT'], tag['content'])
		else
			assert_match(objectRegex, tag.text)
		end
    if (!@subjects)
      @subjects = {}
    end

    if (@subjects[triple['SUBJECT']])
      assert_equal(@subjects[triple['SUBJECT']], tag['about'])
    else
      @subjects[triple['SUBJECT']] = tag['about']
    end
  end
end

Then /^trigger the keyUp event on "([^"]*)"$/ do |selector|
	find(selector).trigger('keyup');
end

Then /^click on the linked data URI "([^"]*)"$/ do |linkedDataUri|
  find('*[data-uri="' + linkedDataUri + '"]').click()
end


Then /^wait$/ do
  sleep(5)
end

Then /^render$/ do
  page().driver.render("/tmp/screen.png")
end

Then /^(?:|I )submit the form$/ do
  click_button('Update')
end




# STUFF

Given /^PENDING/ do
  pending
end

When /^I click on image "([^"]*)"$/ do |arg1|
  find("##{arg1}").click
end

Wenn /^ich das Bild "([^"]*)" anklicke$/ do |arg1|
  find("##{arg1}").click
end

Then /^I should see a date within "([^"]*)"$/ do |selector|
  with_scope(selector) do
      page.text.should match(/(\d{2})\.(\d{2})\.(\d{4})/)
  end
end

Given /^I am logged in$/ do
  page.driver.browser.credentials = "user:pw"
end

Given /^I am a developer$/ do
  find("##{arg1}").click
end

When /^I wait until "([^"]*)" is visible$/ do |selector|
  page.has_css?("#{selector}", :visible => true)
end

Given /^I am a backend user$/ do
  pending # express the regexp above with the code you wish you had
end