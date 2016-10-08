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
// install gulp globally on your machine (npm install gulp -g)

$ npm i -f

//Temporarely
While https://github.com/Semantic-Org/Semantic-UI/pull/4567 is not merged into the semantic-ui we have to do this step manually
gulp install --gulpfile node_modules/semantic-ui/gulpfile.js
 * Yes, extend my current settings.
 * Automatic (Use defaults locations and all components)
 * Is this your project folder (choose yes)
 * Where should we put Semantic UI inside your project? ( write: resources/assets/semantic )

$ ./node_modules/.bin/gulp

```

**3 - Set the Database Configs**

open the file ```.env``` and on the database section add the ip returned from ```$ docker-machine ip```

**4 - Done**

Open your browser at 

```
http://192.168.99.100:8080/ (or your docker-machine ip if its different from this one
```

# Default Accounts

| Name  | Email           | Password | Type  |
|-------|-----------------|----------|-------|
| admin | admin@admin.com | 123456   | admin |
| user  | user@user.com   | 123456   | user  |
