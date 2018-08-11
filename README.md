# motorcycle site

- uses DockerLocal for php and composer environment

    `cd DockerLocal/commands` and

    ```
    ./site-up                               # start up the containers
    ./site-up -c=yourproject_db             # start up and create a local mysql database
    ./site-up -l=yourproject_db             # start up and use existing local mysql database
    ./site-down                             # shut down the containers
    ./site-ssh -h=web                       # ssh into your web container at /var/www/site/ as www-data
    ./site-ssh -h=webroot                   # ssh into your web container at /var/www/ as root
    ./site-ssh -h=web -c='ls /var/www/site' # send command to web container as root
    ./site-ssh -h=mysql                     # ssh into mysql container, and into the mysql program as root
    ./site-ssh -h=mysqlroot                 # ssh into mysql container as root

    ```

- if fresh install, remember to composer install inside html/ from within php environment. ie `./site-ssh -h=web` and then `composer install` from html folder
- on page refresh, build.php is ran and build folder is generated with static files
- might have issues with file permissions after running build so you can do:

    ```
    sudo chown YOURUSER:YOURUSER build/ -R
    sudo chmod 777 build/ -R
    ```

- to change the gallery items or parts items you need to edit the config.php file
- all changes should be made on the php original site