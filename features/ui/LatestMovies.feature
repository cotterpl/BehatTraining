@javascript @movie
Feature: Latest movies
    In order to be up to date
    As a visitor
    I want to see what are the latest movies

    Rules:
    - 3 latest movies should be presented at Home Page

    Scenario: Should show 3 latest movies at home page
        When Visitor goes to Home Page
        Then He should see 3 latest movies
