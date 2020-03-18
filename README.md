# Evaluation Symfony

## Sujet:
Créer une application Symfony permettant de rechercher des informations de contact et d’horaires sur des établissements publics (mairies, etc) d’une commune donnée, grâce aux API publiques du gouvernement.

L’application peut ne comporter qu’une seule page présentant un formulaire de recherche.
Lorsque le formulaire est envoyé, s’il n’y a aucune erreur, afficher les résultats (la liste des établissements).

## Rendu
### 1. Formulaire de recherche: 2 pts.
Le formulaire doit comporter un champ pour indiquer le nom de la commune à rechercher, et un second champ pour le code postal. Il n’est pas nécessaire de créer un formulaire Symfony même si ça n’est pas interdit. Penser à un minimum de validation et d’affichage des erreurs.
### 2. Service GeoApi: 4 pts.
Créer une classe App\Service\GeoApi dont le but sera de communiquer avec l’API Géo afin de rechercher une commune.
Il est obligatoire de communiquer avec l’API en utilisant cURL.
Utiliser votre service avec le formulaire créé précédemment, l’utilisateur devrait obtenir un message d’erreur si aucune commune n’a été trouvée.
### 3. Service EtablissementPublicApi: 7 pts.
Créer une classe App\Service\EtablissementPublicApi dont le but sera de communiquer avec l’API Etablissements Publics afin de rechercher des etablissements.
Il est obligatoire de communiquer avec l’API en utilisant cURL.
A vous de décider quels types d’établissements publics vous souhaitez afficher, et quelles informations (explorez l’API et sa documentation, personnalisez l’exercice).
Utiliser ce nouveau service avec le formulaire, et procéder à l’affichage des résultats.
### 4. Résilience: 2 pts.
Votre application ne doit pas prendre feu si les APIs du gouvernement sont indisponibles. Veillez à ce qu’elle informe l’utilisateur en cas de problème avec ces APIs externes.
Pour tester, coupez votre connexion Internet, et essayez d’utiliser votre application.
