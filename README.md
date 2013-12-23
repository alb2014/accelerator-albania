Entreprenuership Accelerator for Albania
========================================

This is an "Entrepreneurship Accelerator" website that aims to network Albanian entrepreneurs and financiers.  It's built on top of a [CakePHP](http://www.cakephp.org) framework.

Setting Up the Database
-----------------------
This project is setup to require a MySQL database.  If you are deploying to our Heroku server, this isn't necessary, it's already set up.  But if you're creating your own local version, here are the steps you have to file.

Create a database and run the files
*  app/Config/Schema/sql/croogo.sql
*  app/Config/Schema/sql/croogo_data.sql
*  app/Config/Schema/sql/accelerator.sql

This will set up the CMS database that we use.

Now you need to populate environmental variables so that your installations can find the database connection information:

AA_DB_HOST

AA_DB_USER

AA_DB_PASS

AA_DB_NAME

Also you'll need to set up the following security variables

AA_SECURITY_SALT  - Choose a random string

AA_CIPHER_SEED  - Choose a random string of digits

Pushing to Heroku
-----------------

heroku git:remote -a heroku-app

git push heroku master

The site will be deployed [here.](http://heroku-app.herokuapp.com)

Creating an Admin User
----------------------

Once the site is live you can create an admin user by going to the url /users/users/add and creating a user.  This will create a normal user which you can modify to create an admin by changing the database so that that user's role is 1 and their status is also set to 1.  Here's the SQL

UPDATE `DATABASENAME`.`users` SET `role_id`='1', `status`='1' WHERE `id`='THE USER'S ID.  PROBABLY 1';

Setting up permissions
-----------------------

Go into the croogo admin panel
Goto Users -> Permissions
Click Tools drop down
Click Generate
Change permissions under Accelerator module

Setting up Disqus Comments
---–-----------------------

You must configure the environmental variables

DISQUS_PRIVKEY - the private key provided by Disqus API

DISQUS_PUBKEY - the public key provided by Disqus API