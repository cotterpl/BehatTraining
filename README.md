# Install application

## Prerequisites

1. Docker (if you are installing with docker)
1. Google Chrome browser
1. chromedriver

## With docker

1. Install docker
1. Make sure port 80 is not used (for example by your local apache instance)
1. Run sudo ./create_docker.sh
1. Go to web browser http://localhost/

## Without docker

1. You will need PHP 7.0+, web server and MySQL server
1. Point web server to src/public directory
1. If page is accessible under http://localhost/ you don't need to do anything else
1. Otherwise change configurations in behat.yml and app.yml.

## Test

You should be able to access application at http://localhost/

# Configuration

1. behat.yml
1. selenium
1. chromedriver
1. composer

# Running tests

To go inside container and switch to project directory
```bash
sudo docker exec -it app bash
cd /var/www/html
```

From inside container run

1. API tests: `./vendor/bin/behat --suite api`
1. Integration tests: `./vendor/bin/behat --suite default` - integration tests form default suite

From you machine, against container run:

1. UI tests: `./vendor/bin/behat --suite ui`

# Clean-up

1. Run `sudo ./destroy_docker.sh`

TODO
remove phpMyAdmin


README2

mount in virtualbox


