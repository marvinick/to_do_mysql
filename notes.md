*Here are a few things to consider when we make and name our new databases and tables.*

## Basics

### All names (databases, tables, columns, etc) should be in lowercase.
* Table names should be plural; for example, tasks not task.
* Names with multiple words are separated by an underscore. For example: date_of_birth not dateofbirth.
* If you add in a foreign key to your table (i.e. the column list_id into the tasks table), the foreign key is a singularized version of the table it represents. For example, list_id not lists_id.

## Advanced
### check this out after we have covered many-to-many relationships


* If a join table doesn't have any meaning besides just joining two tables, use table_name1_table_name2, with the names in alphabetical order. Example: cuisines_restaurants would be a join table for the table cuisines and restaurants.
* If the table has meaning besides just joining the table, use a name that describes the relationship. Example: visits would be a good name for a join table that joins together a table called people and a table called places.

## Monday Notes


*starting and accessing mysql server*
```mysql.server start``` followed by the command ```mysql -uroot -proot```

*This shows you what databases you have access to.*
```SELECT DATABASE();```

*This creates a new database*
```CREATE DATABASE test_database;```

*This shows a list of all databases in the current MySQL server*
```SHOW DATABASES;```

*This connects us to the database we created.*
```USE test_database```

*To create tables*
```CREATE TABLE contacts  (name VARCHAR (255), age INT, birthday DATETIME);```

*To change a table*
```ALTER TABLE contacts ADD favorite_color;```

*to remove a column*
```ALTER TABLE contacts DROP favorite_color;```

---
###To Create to do database

```USE to_do;```

```CREATE TABLE categories (id serial PRIMARY KEY, name varchar (255));```

```DROP DATABASE to_do_test;```
