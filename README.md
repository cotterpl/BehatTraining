# Behat Training

## Prerequisites

1. Clone this project https://github.com/cotterpl/BehatTraining
1. Install VirtualBox
1. Download Linux Image from https://drive.google.com/open?id=0BwLw7ZcvI2O3LV9GVmJjZVNqalE

## Set up:

1. Add Linux image to VirtualBox
1. Set up shared folder in VirtualBox: 
    - name it ‘BehatTraining’ (see `shared_folder.png`) 
    - it should be pointing to the main directory of the project (the directory this file is in)
1. Run Ubuntu image (guest system)
    - login: behat, password: behatpass
   
## Inside guest system:
   
1. Check if your folder is shared (`cd /var/www/training & ls`)
    - If not try running `~/mountBehatTraining.sh`
    - If it does not help check VirtualBox settings for shared folder and restart
    
1. `cd /var/www/tranining` and run `./install.sh`. It will install composer and run it.
   
1. Run browser and go to `http://behat-training.dev/` – application should show

1. In a separate terminal window run `selenium-server-standalone`. Leave it running. It is required for UI testing.

# Running tests
   
1. `cd /var/www/training` and run `behat`
   3 tests should pass. One of them should fail.
   
Play with the behat command:
1. `behat --suite default` to run integration tests only
1. `behat --suite api` to run API tests only
1. `behat --suite ui` to run UI tests only
1. `behat features/ui/LatestMovies.feature` to run that feature only
  
# Other

- You can use phpMyAdmin at `http://phpmyadmin.dev/`
