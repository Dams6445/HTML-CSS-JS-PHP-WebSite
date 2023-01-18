# Site-Interet-Pizzeria
Site Internet pouvant être utilisé pour réprésenter une pizzeria en ligne

Nom de la Pizzeria : Pizz'House
Auteur : BRIOL--DUHALDE Damien

# Instruction pour se rendre sur le site de Pizz'House :

Installer le package Projet_PizzHouse.zip (donné un PJ sur Teams)

Extraire tout de ce package dans votre répertoire défini comme localhost [lien pour créer un répertoire localhost](https://ngressier.developpez.com/articles/ubuntu/configuration-repertoire-utilisateur-xampp/#LA)

Se rendre sur [PhpMyAdmin](http://localhost/phpmyadmin/) et s'identifier avec login : root ; et sans mot de passe

Copier le script du fichier Projet_PizzHouse/Script_SQL/PizzHouse.sql et le coller dans [PhpMyAdmin création de tables](http://localhost/phpmyadmin/server_sql.php)

Copier le script du fichier Projet_PizzHouse/Script_SQL/PizzHouse_data.sql et le coller dans [PhpMyAdmin création de tables](http://localhost/phpmyadmin/server_sql.php)

Maintenant, il ne vous reste plus qu'à vous rendre sur le site : [Site Internet Pizz'House](http://localhost/Site_BRIOL--DUHALDE(PhP)/Projet_PizzHouse/Code_PHP/Index.php)


# Pages du site Internet

Page d'accueil : [Site d'accueil](http://localhost/Site_BRIOL--DUHALDE(PhP)/Projet_PizzHouse/Code_PHP/Index.php)

Présentation des Pizzas : [Présentation des Pizzas](http://localhost/Site_BRIOL--DUHALDE(PhP)/Projet_PizzHouse/Code_PHP/produits.php?cat=Pizza)

Présentation des Paninis : [Présentation des Paninis](http://localhost/Site_BRIOL--DUHALDE(PhP)/Projet_PizzHouse/Code_PHP/produits.php?cat=Panini)

Présentation des Boissons : [Présentation des Boissons](http://localhost/Site_BRIOL--DUHALDE(PhP)/Projet_PizzHouse/Code_PHP/produits.php?cat=Boisson)

Page de Connexion : [Page de Connexion](http://localhost/Site_BRIOL--DUHALDE(PhP)/Projet_PizzHouse/Code_PHP/Page_Connexion.php)

Page de Contact : [Page de Contact](http://localhost/Site_BRIOL--DUHALDE(PhP)/Projet_PizzHouse/Code_PHP/Page_Contact.php)

# Remarques
La page [Panier](http://localhost/Site_BRIOL--DUHALDE(PhP)/Projet_PizzHouse/Code_PHP/Panier.php) n'est pas encore fonctionnelle

La mise au panier d'articles et la mise à jour du stock ne sont pas encore fonctionnels

Impossibilité de se connecter avec l'utilisateur root sans mot de passe.

Modifier dans le fichier bddData.php les variables $login et $pass si besoin. (essayé avec login et mot de passe perso)

# Concernant les autres aspects du site, je vous invite à lire le rapport concernant ce
dernier
