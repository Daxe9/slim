# Dockerizzare un LAMP

Avviare il container Docker con php, apache e composer

`docker run --rm --name phpcomposer -v ./:/var/www/html -p 8080:80 benvenuti/php-composer:1.0`

Aprire il browser al seguente indirizzo:

http://localhost:8080


## Primo avvio

1) In un altro terminale ottenere una bash nel container con il seguente comando:

`docker exec -it phpcomposer bash`


2) Dentro il container, aggiornare le dipendenze di composer

`composer update`
