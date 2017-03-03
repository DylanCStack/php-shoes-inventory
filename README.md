#Shoe Store Inventory
###Authored by Dylan Stackhouse, 3/3/17.
#Description
A website to track which stores carry which brands of shoes. Users may view brands and help track them by adding which stores they are carried in. Users may also add new stores which carry these brands.

###Requirements
This site requires some programs and frameworks to be installed on your computer in order to run it locally.
* PHP 5
* Composer
* MAMP/mySQL/Apache
* A terminal shell (apple computers will have this by default)
* A web browser

##Setup
Download or clone the repository from [here](https://github.com/DylanCStack/php-shoes-inventory). Then in a terminal shell navigate into the folder and run $`composer install`. Next, there are two options to choose from.

1. Navigate to the web folder and run $`php -S localhost:8000`. Next launch MAMP and start a mySQL server.  Finally, navigate to [localhost:8000](localhost:8000) in your web browser of choice.
2. Launch MAMP navigate to MAMP>Preferences>Web Server>Document Root and set the path to the web folder in the project. Then navigate to [localhost:8888](localhost:8888).

##Specifications

1. Program can add a new store/franchise to be tracked.
2. Program can display all tracked stores/franchises.
3. Program can find and display a specific store.
4. Program can edit a tracked store after it has been created.
5. Program can untrack a store by deleting it from the database.
6. Program can add a new brand of shoes to be tracked.
7. Program can find and display a specific brand of shoes.
8. Program can display all tracked brands.
9. Program can edit a shoe brand after it has been added to the database.
10. Program can untrack a brand by deleting it from the database.

11. Program can retrieve and display a list of all shoe brands carried in a store.
12. Program can retrieve and display a list of all stores which carry a specific brand of shoe.

####Database Setup

``` SQL
$ CREATE DATABASE shoes;

$ USE shoes;

$ CREATE TABLE stores (id serial PRIMARY KEY, name VARCHAR (255));

$ CREATE TABLE brands (id serial PRIMARY KEY, name VARCHAR (255));

$ CREATE TABLE brands_stores (id serial PRIMARY KEY, brand_id INT, store_id INT);


```
