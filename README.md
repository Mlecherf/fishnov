# Fishnov

Fishnov est une application web conçue pour aider les pêcheurs à enregistrer leurs captures quotidiennes. Elle offre un moyen simple et pratique d'enregistrer les détails importants de chaque sortie de pêche, y compris les espèces capturées, le lieu et les notes supplémentaires. Fishnov est développée en PHP, en utilisant le framework laravel, et son architecture MVC (Modèle-Vue-Controlleur).

## Fonctionnalités

- Création de compte
- Enregistrement des pêches quotidiennes : Enregistrez les espèces, la quantité.
- Visualisation et gestion des compagnie
- Création de compagnie
- Gestion de profil
- Visualisation des pêches réalisées

## Dépendances

Fishnov utilise les dépendances suivantes :
      
- Ext-Curl  : Package PHP permettant d'utiliser l'extension cUrl(transfert de data via protocoles internet) sous PHP.
- Fruitcake/laravel-cors : Package PHP permettant d'envoyer des en-têtes Cross-Origin Resource Sharing avec la configuration du middleware Laravel.
- Guzzlehttp/guzzle : Guzzle est un client HTTP PHP qui facilite l'envoi de requêtes HTTP et facilite l'intégration aux services Web.
- Facade/ignition : Ignition est une belle page d'erreur personnalisable pour les applications Laravel.
- Fakerphp/faker : Faker est une bibliothèque PHP qui permet de génèrer de fausses données.
- Laravel/Breeze : Laravel Breeze est une implémentation minimale et simple de toutes les fonctionnalités d'authentification de Laravel , y compris la connexion, l'enregistrement, la réinitialisation du mot de passe, la vérification des e-mails et la confirmation du mot de passe.
- Laravel/Sail : Laravel Sail est une interface de ligne de commande légère pour interagir avec l'environnement de développement Docker par défaut de Laravel.
- Mockery/mockery : Mockery est un framework d'objets factices PHP simple mais flexible à utiliser dans les tests unitaires avec PHPUnit, PHPSpec ou tout autre framework de test. 
- Collision est un package conçu pour vous donner de beaux rapports d'erreur lors de l'interaction avec votre application via la ligne de commande.
- PhpUnit : PHPUnit est un framework de test orienté programmeur pour PHP. Il s'agit d'une instance de l'architecture xUnit pour les frameworks de tests unitaires.

Pour installer ces dépendances, assurez-vous d'avoir les configurations nécessaires dans le composer de votre projet.

## Développement

Fishnov est développé en utilisant le modèle d'architecture MVC (Modèle-Vue-Controlleur), qui sépare l'interface utilisateur de la logique métier. L'application web est composée des éléments suivants :

- Modèle : Responsable de la gestion des données et de la logique métier de l'application. Cela comprend les opérations de base de données, la récupération des données et leur manipulation.
- Vue : Représente l'interface utilisateur, y compris les activités, les fragments et les mises en page. Elle observe le ViewModel pour les changements et met à jour l'interface utilisateur en conséquence.
- Controller : Fait le lien entre le Modèle et la Vue, fournissant les données à la Vue et gérant les interactions utilisateur.


## Contact

Si vous avez des questions ou des suggestions concernant Fishnov, n'hésitez pas à nous contacter à l'adresse mathis.lecherf@ynov.com.

Bonne pêche ! 🎣
