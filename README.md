#Shoe Store Inventory
###Authored by Dylan Stackhouse, 3/3/17.
#Description
A website to track which stores carry which brands of shoes. Users may view brands and help track them by adding which stores they are carried in. Users may also add new stores which carry these brands.

##Requirements

##Setup

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

$ CREATE TABLE stores (id serial PRIMARY KEY, name VARCHAR (255));

$ CREATE TABLE brands (id serial PRIMARY KEY, name VARCHAR (255));

$ CREATE TABLE brands_stores (id serial PRIMARY KEY, brand_id INT, store_id INT);


```
