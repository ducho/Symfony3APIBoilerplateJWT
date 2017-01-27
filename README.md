# Symfony3APIBoilerplateJWT
Example with Symfony 3 API Boilerplate JWT

## Install with Composer

```
	$ curl -s http://getcomposer.org/installer | php
	$ php composer.phar install	 or  composer install 
```

## Generate the SSH keys

```
	$ mkdir var/jwt 
	$ openssl genrsa -out var/jwt/private.pem -aes256 4096 
	$ openssl rsa -pubout -in var/jwt/private.pem -out var/jwt/public.pem
```

## Generate Token Authentication with Curl

```
	$ curl -H 'content-type: application/json' -v -X  GET http://127.0.0.1:8000/api/token -H 'Authorization:Basic username:password'
```
