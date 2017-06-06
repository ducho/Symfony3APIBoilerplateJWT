# Symfony3APIBoilerplateJWT

[![Build Status](https://travis-ci.org/Tony133/Symfony3APIBoilerplateJWT.svg?branch=master)](https://travis-ci.org/Tony133/Symfony3APIBoilerplateJWT)

An API Boilerplate to create a ready-to-use REST API in seconds with Symfony 3.3

## Install with Composer

```
    $ composer create-project tony133/symfony-api-boilerplate-jwt myProject
```
## Generate the SSH keys

```
	$ mkdir var/jwt
	$ openssl genrsa -out var/jwt/private.pem -aes256 4096
	$ openssl rsa -pubout -in var/jwt/private.pem -out var/jwt/public.pem
```

## Generate Token Authentication with Curl

```
	$ curl -H 'content-type: application/json' -v -X  POST http://127.0.0.1:8000/api/token -H 'Authorization:Basic username:password'
```

## Example JSON Web Token Authentication with Curl on resource

```
    $ curl -H 'content-type: application/json' -v -X POST -d '{"email":"myemail@example.com", "password": "mypassword"}' http://127.0.0.1:8000/api/changePassword  -H 'Authorization: Bearer :token'
```

## Example with Symfony3APIBoilerplateJWT

* [How to Build an API-Only JWT Symfony App](https://github.com/Tony133/Symfony3APIBoilerplateJWTBook)
