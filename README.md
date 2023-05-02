# WebCup-2023
Projet Equipe

initialiser votre projet
>symfony new Books

 lancer le serveur de Symfony
>symfony server:start

Le premier outil est le maker-bundle. Cela permet de demander à Symfony de nous créer certains éléments via la ligne de commande
>composer require symfony/maker-bundle --dev

Pour interagir avec une base de données, Symfony utilise ce qu’on appelle un ORM (Object Relational Mapping)
>composer require orm

Créez l’entité Book
>php bin/console make:entity

créer votre base grâce à Doctrine
>php bin/console doctrine:database:create

transformer l’entité en véritable table
>php bin/console doctrine:schema:update --force

#Ajoutez des fixtures 

installer fixtures
>composer require orm-fixtures --dev (Ctrl + Shift + P)
>composer require doctrine/doctrine-fixures-bundle --dev

exécuter fixtures
>php bin/console doctrine:fixtures:load

#Créez votre première route

créer notre première route
>php bin/console make:controller

#Serializer

installer
>composer require symfony/serializer-pack



Authentification
>composer require security
>php bin/console doctrine:schema:update --force

Protégez une API avec de l’authentification
>composer require lexik/jwt-authentication-bundle
:GitBash
>openssl genpkey -out config/jwt/private.pem -aes256 -algorithm rsa -pkeyopt rsa_keygen_bits:4096
    Verifying - Enter PEM pass phrase: mamie
>openssl pkey -in config/jwt/private.pem -out config/jwt/public.pem -pubout

Gérez les erreurs et ajoutez la validation
>php bin/console make:subscriber
    ExceptionSubscriber
    kernel.exception


