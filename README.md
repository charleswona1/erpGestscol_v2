## Apropos de eprGestscol

application de gestion scolaire comportant plusieurs modules :
- module de gestion scolaire
- module de gestion de la caisse 
- module de gestion de la paie
- module d'administration
- module de configuration d'etablissement 

## prerequis pour prendre la main sur le code source 

l'application est developper avec le **framework laravel de la version 8** qui tourne actuellement sur une version de **php 7.4** 
[la documentation officiel](https://laravel.com/docs) ici

- requis 
> php 7.4
> mysql 8
> serveur apache 2.4

## instalation 
le projet se trouve sur notre repositorie [ERPgestscol](https://github.com/charleswona1/erpGestscol_v2)
- faire un clone 
- mettre l'environement si dessous a la racine du projet dans un dossier **.env**
```
APP_NAME=ENACP
APP_ENV=test
APP_KEY=
APP_DEBUG=true
APP_URL=http://127.0.0.1:8000/
LOG_CHANNEL=stack

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=enacp
DB_USERNAME=YOUR_DB_USERNAME
DB_PASSWORD=YOUR_DB_PASSWORD

BROADCAST_DRIVER=log
CACHE_DRIVER=file
QUEUE_CONNECTION=database
SESSION_DRIVER=file
SESSION_LIFETIME=120

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

#MAIL_DRIVER=
#MAIL_HOST=
#MAIL_PORT=
#MAIL_USERNAME=
#MAIL_PASSWORD=
#MAIL_ENCRYPTION=
#MAIL_FROM_ADDRESS=

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"
```

- en suite instalation des dependance 
```
    $ composer install
    $ php artisan key:generate
    $ php artisan migrate --force
```

- cree une base de donneé et remplace le non situer dans le fichier **.env**
- lancé la migration 

