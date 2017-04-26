@movie @db-reset
Feature: Reading information about a movie
  In order to present detailed movie information to my users
  As an API client
  I want to be able to obtain details for any movie

  Scenario: Obtain information about a movie
    Given There is a movie 'Back to the Future' with id 123
    When I request '/api/movies/123'
    Then the response code is 200
    And the response body contains JSON:
      """
      {
        "id": 123,
        "title": "Back to the Future"
      }
      """
