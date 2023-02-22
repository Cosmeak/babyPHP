# babyPHP - Make my own PHP Framework to learn 

The objective of this project is to understand the basics of PHP and its object-oriented programming (bye bye procedural).

The project must respect the MVC structure (Model - View - Controller) of PHP as well as have an ORM (object-relational mapping) to access the database.


## Goals

To do this, your application must recreate an ecommerce platform like [TopAchat](https://www.topachat.com/accueil/index.php) and include:
- A home page with the latest items added to the site and the best sellers
- A product category page
- The page grouping all the products of a category
- A page showing a product
- A search system in all the products available on the site
- A cart system
- A customer account system
- A seeder to implement easely data in database

Your product need to have a stock!

BE CAREFUL to respect the database names. All your tables must have a proper id named ID as well as if table with several words, separate them by a "_", the same for pivot tables.


## Project Architecture
```
- /app
  | - /Controllers
  | - /Helpers
  | - /Models
  | - /Middleware
  | - /Views
  
- /config
  | - database.php

- /core
  | - Application.php
  | - Controller.php
  | - Database.php
  | - Handler.php 
  | - Model.php
  | - Request.php
  | - Response.php
  | - Route.php
  | - Session.php
  | - View.php 

- /public 
  | - /js
  | - /css 
  | - /assets 
  | - index.php (launch project file)

- /vendor (contain composer autoload, do not push it to github)

- .env (contain environment variable, be aware to not push it to github)
- .env.example (this can be push, it just contain variable name without value)
- .gitignore
- composer.json (used to make your autoload)
- composer.lock 
- README.md (this README you actually read)
```

CAUTION you do not have the right to install composer dependencies!


## GIT

To get used to good practice, here’s how you’ll have two choice to build your commits as well as your development branches.

The first one is [Conventionnal Commits](https://www.conventionalcommits.org/en/v1.0.0/), the most used and older.

The second one is [Gitmoji](https://gitmoji.dev/), most recent, and more easy understandable.

You need to know both for your developper carrier. Don't forget if you want to contribute to an open-source repository to read their commit convention, they may change from the one above.

For your branch, the most used and clear is to have a main branch named `main` (like the default branch of github) where you have your stable code, and a second one named `develop` where you push all your code from all development branches, and can test if all your code run correctly. For all sub development branch, you have `dev/features` and `fix/bug`. 

To put your code of a development branch you will need to do a PR (Pull Request) for your work to merge on the main branch (`main`).

Here we have all the things you need to know before jump into make your own PHP framework.

## Documentations 
- [PHP](https://www.php.net/docs.php)
- [PHP The Right Way](https://eilgin.github.io/php-the-right-way/)

<br>
<br>
<br>
#### NB
This README is writen by [Cosmeak - Guillaume FINE](https://github.com/Cosmeak/) to help other friend student to go with PHP OOP and was used has "learning correction".