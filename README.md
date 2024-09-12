# Basic PHP MVC demo
This repository demonstrates how the MVC design pattern can be implemented using PHP.

It contains a docker configuration with:
* NGINX webserver
* PHP FastCGI Process Manager with PDO MySQL support
* MariaDB (GPL MySQL fork)
* PHPMyAdmin

## Installation

1. Install Docker Desktop on Windows or Mac, or Docker Engine on Linux.
1. Clone the project

## Usage

## Running the Application
**Note:** docker-compose down -v to delete all the volume of the containers and set it again
To run the application, use the command: 
```bash
docker-compose build
docker-compose down -v
docker-compose up
```
