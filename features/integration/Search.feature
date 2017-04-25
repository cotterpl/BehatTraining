@search @db-reset
Feature: Search for movies by title
  In order to easily access movies
  As a visitor
  I want to be able to search for a movie by title

  Rules:
  - one should be able to search by word prefix
  - 'Empty' search should not return any results


  Scenario: Search for a movie by word, case insensitive
    Given There are movies titled 'Lord of the Rings', 'Shutter Island' and 'Back to the Future'
    When A member wants to find a movie containing 'future' in title
    Then He should see the movie titled 'Back to the Future' as a result
    But He shouldn't see the movie titled 'Lord of the Rings' as a result

#todo correct the code so that this scenario passes
  Scenario: Search for a movie by word prefix
    Given There are movies titled 'Ape World', 'Planet of Apes' and 'Grape'
    When A member wants to find a movie containing 'ape' in title
    Then He should see the movie titled 'Ape World' as a result
    And He should see the movie titled 'Planet of Apes' as a result
    But He shouldn't see the movie titled 'Grape' as a result

#todo (task 1): try to write a scenario that covers for empty search query
