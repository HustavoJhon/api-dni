# Ejecute file PHP

`docker run -p 3000:80 -d hello-php`

**Eliminar todas la imagenes que se corrieron**
`docker rm $(docker ps -aq)`

**Update code and preview cambios**
`docker run -p 5000:80 -d -v $(pwd)/src:/var/www/html hello-php`

**Use cmd Terminal the bash**
`docker exec -it "id" bash`

**Create images with tag 1.0**
`docker build -t hello-php:1.0 .`
