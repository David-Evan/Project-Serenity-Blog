# Blog platform
Serenity Blog Plateform - Openclassroom Project 8 -

## Présentation

**Serenity Blog Plateform** est un blog n'utilisant aucun framework développé dans le cadre de ma formation de développeur web via Openclassroom.

Le contexte :

>  Vous venez de décrocher un contrat avec Jean Forteroche, acteur et écrivain. Il travaille actuellement sur son prochain roman, "Billet simple pour l'Alaska". Il souhaite innover et le publier par épisode en ligne sur son propre site.
Seul problème : Jean n'aime pas WordPress et souhaite avoir son propre outil de blog, offrant des fonctionnalités plus simples. Vous allez donc devoir développer un moteur de blog en PHP et MySQL.

Afin de rester dans une logique de "MLP" (Minimum lovable Product)", l'architecture utlisée est volontairement simpliste. L'utilisation d'un framework ou CMS serait vivement conseillé pour faire évoluer le projet.

J'ai utilisé le template [Discovery](https://github.com/David-Evan/discovery-blog-template), crée spécialement pour ce projet et accessible librement.

## Architecture du projet

Le projet utilise une architecture MVC Classique :

```
./lib/
./models/
./views/
  -- ./admin/
  -- ./blog/
./controllers/
  -- ./admin/
  -- ./blog/
./web/
  -- assets/
  -- upload/
  -- index.php
./vendor/
```

Voici leur description :

- **lib/** : Contient les classes utilisées pour faire fonctionner le projet
- **models/** : Les models / Managers de l'application
- **views/** : Templates de l'application
- **controllers** : Contient la logique applicative
- **web/** : Dossier accessible au public contenant le point d'entrée de l'application
- **vendors/** : Contient les bibliothèques PHP externes dont nous pourrions avoir besoin

## A venir ...
