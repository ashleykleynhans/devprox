### DEVPROX Proficiency Test

This test uses PHP 7.2, Nginx, MySQL 5.7.22 and Docker

## Assumptions

1. No frontend framework such as Angular, React or Vue was used to to time constraints in learning such frameworks.  I've been mostly doing backend development and have experience with jQuery but haven't been doing much frontend development recently.  I've enrolled in an online training course for Angular on Udemy, but have not completed it yet.

## Requirements

* Docker (https://www.docker.com/community-edition#/download)
* Docker Compose (https://docs.docker.com/compose/)

## Installation

1. Clone the repo

2. Start the Docker containers, which will download and install all the required software

        docker-compose up -d

3. Set the MySQL password for the application

        docker-compose exec db bash

Inside the container, log into the MySQL root administrative account:

        root@0405df9cd866:/# mysql -u root -p

(Root password is: D3vPr0X) 

        mysql> GRANT ALL ON devprox.* TO 'devprox'@'%' IDENTIFIED BY 'D3vPr0X';
        mysql> FLUSH PRIVILEGES;
        mysql> EXIT;

        root@0405df9cd866:/# exit

4. Run the database migrations

        docker-compose exec app php artisan migrate

5. The App listens for incoming connections at http://127.0.0.1 (on port 80, assuming that port 80 is not already in use)

## Viewing the tests

You can either access the landing page at: http://127.0.0.1 and click through to each test or alternatively directly

* [Test1](http://127.0.0.1/test1) 
* [Test2](http://127.0.0.1/test2) 

## Running the automated tests
