# Wiregate website backend (On-Boarding task #1)

## Preparing

## Development

### Run for local development
```
docker-compose up --build
```

### Production image
```
TARGET=prod docker-compose up --build
```

### Database inititalization (migration)

Connect to app container
```
docker exec -it onboarding1-app-1 bash
```
From the default directory /var/www/html run:
```
php artisan migrate
```

### Check emails locally
```
http://localhost:8025
```

## PS Task Description

* Create a back-end application which will have User Entity: email / password, Role Entity: Administrator and User.
* User needs to have the ability to register and reset his password via email.
* User needs to confirm his email.
* User needs ability to edit profile: FIRST\_NAME, LAST\_NAME, AVATAR;
* Entity Avatar should be stored on S3 compatible storage;
* Administrator can delete users;
* User can be promoted to Administrator;
* Application needs to be stateless - all session information stored in REDIS;
* Application needs to print its logs to STDOUT.
* Project needs to have a code style standard and README needs to contain information on how to run code style test;
* README needs to contain information on how to run the application in DEV and PROD modes.
* DEV mode should allow to debug project STEP-BY-STEP using XDebug;
* PROD mode should be packed in single Docker Container in order to run it in Kubernetes.

Front-end part is not important. Can be implemented without CSS on plain HTML.

## Tech
Following technologies must be used:

* PHP Laravel;
* Minio;
* Maildev;
* Docker;
* Redis.

## Hints:

	maildev:
	  image: maildev/maildev
	  ports:
	    - "8025:1080"
