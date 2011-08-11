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

Then /^(?:|I )should find RDFa triple "([^"]*)" "([^"]*)" "([^"]*)"$/ do |subjectIdentifier, predicateCurie, object|
  objectRegex = Regexp.new("^" + object + "$")

  tag = find("span[property='" + predicateCurie + "']")
  assert_match(objectRegex, tag.text)
  if (!@subjects)
    @subjects = {}
  end

  if (@subjects[subjectIdentifier])
    assert_equal(@subjects[subjectIdentifier], tag['about'])
  else
    @subjects[subjectIdentifier] = tag['about']
  end
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