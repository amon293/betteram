# Installation

**1 - Install Docker**

https://www.docker.com/products/docker-toolbox

**2 - Run**

```
$ docker-machine start
$ docker-machine env
$ eval $(docker-machine env)
$ docker-compose up -d
$ docker exec -it betteram_php sh -c "composer install"
$ docker exec -it betteram_php sh -c "php -r \"file_exists('.env') || copy('.env.example', '.env');\""
$ docker exec -it betteram_php sh -c "php artisan key:generate"
$ docker exec -it betteram_php sh -c "chmod -R 777 storage"
$ docker exec -it betteram_php sh -c "php artisan migrate"

//Temporarely 
// install nodejs on your local machine and 

$ npm i -f
$ ./node_modules/.bin/gulp
```

**3 - Set the Database Configs**

open the file ```.env``` and on the database section add the ip returned from ```$ docker-machine ip```

**4 - Done**

Open your browser at 

```
http://192.168.99.100:8080/ (or your docker-machine ip if its different from this one
```
