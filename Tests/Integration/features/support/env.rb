require 'rubygems'

# Capybara configuration (using Akephalos)
require 'capybara'
require 'capybara/dsl'
require 'capybara/cucumber'
require 'capybara/session'
require 'capybara-webkit'

# RSpec
#require 'spec/expectations'

# TestUnit
require 'test/unit/assertions'


unless ENV['CUCUMBER_HOST']
  puts 'You MUST provide the argument CUCUMBER_HOST in order to run cucumber tests. Example: cucumber CUCUMBER_HOST=http://dev.flow3.local/'
  exit(1)
end

Capybara.default_selector = :css

Capybara.run_server = false
Capybara.app_host = ENV['CUCUMBER_HOST']

Capybara.default_driver = :webkit
Capybara.javascript_driver = :webkit

World(Test::Unit::Assertions)
World(Capybara)

Before('@slow_process') do
#  @aruba_io_wait_seconds = 15
end