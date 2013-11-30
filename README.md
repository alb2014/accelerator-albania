Entreprenuership Accelerator for Albania
========================================

This is an "Entrepreneurship Accelerator" website that aims to network Albanian entrepreneurs and financiers.  It's built on top of a [CakePHP](http://www.cakephp.org) framework.

Setting Up the Database
-----------------------
This project is setup to require a MySQL database.  If you are deploying to our Heroku server, this isn't necessary, it's already set up.  But if you're creating your own local version, here are the steps you have to file.

Create a database and run the files
*  app/Config/Schema/sql/croogo.sql
*  app/Config/Schema/sql/croogo_data.sql

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

heroku git:remote -a infinite-brushlands-4936

git push heroku master

The site will be deployed [here.](http://infinite-brushlands-4936.herokuapp.com)

CakePHP
=======

[![CakePHP](http://cakephp.org/img/cake-logo.png)](http://www.cakephp.org)

CakePHP is a rapid development framework for PHP which uses commonly known design patterns like Active Record, Association Data Mapping, Front Controller and MVC.
Our primary goal is to provide a structured framework that enables PHP users at all levels to rapidly develop robust web applications, without any loss to flexibility.

Some Handy Links
----------------

[CakePHP](http://www.cakephp.org) - The rapid development PHP framework

[Cookbook](http://book.cakephp.org) - THE Cake user documentation; start learning here!

[Plugins](http://plugins.cakephp.org/) - A repository of extensions to the framework

[The Bakery](http://bakery.cakephp.org) - Tips, tutorials and articles

[API](http://api.cakephp.org) - A reference to Cake's classes

[CakePHP TV](http://tv.cakephp.org) - Screen casts from events and video tutorials

[The Cake Software Foundation](http://cakefoundation.org/) - promoting development related to CakePHP

Get Support!
------------

[Our Google Group](https://groups.google.com/group/cake-php) - community mailing list and forum

[#cakephp](http://webchat.freenode.net/?channels=#cakephp) on irc.freenode.net - Come chat with us, we have cake.

[Q & A](http://ask.cakephp.org/) - Ask questions here, all questions welcome

[Lighthouse](https://cakephp.lighthouseapp.com/) - Got issues? Please tell us!

[![Bake Status](https://secure.travis-ci.org/cakephp/cakephp.png?branch=master)](http://travis-ci.org/cakephp/cakephp)

![Cake Power](https://raw.github.com/cakephp/cakephp/master/lib/Cake/Console/Templates/skel/webroot/img/cake.power.gif)
