# Installation

**1 - Install Docker**

https://www.docker.com/products/docker-toolbox

**2 - Run**

tee /etc/yum.repos.d/docker.repo <<-'EOF'
[dockerrepo]
name=Docker Repository
baseurl=https://yum.dockerproject.org/repo/main/centos/6/
enabled=1
gpgcheck=1
gpgkey=https://yum.dockerproject.org/gpg
EOF

```
$ docker-machine start
$ docker-machine env
$ eval $(docker-machine env)
$ docker-compose up -d
$ docker exec -it betteram_php /bin/bash -c "composer install"
$ docker exec -it betteram_php /bin/bash -c "php artisan key:generate"
```

**3 - Done**

Open your browser at 

```
http://192.168.99.100:8000/
```

or run to know your ip

```
$ docker-machine ip
```
