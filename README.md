#The Booster
============

This is the version 2.0 of the Symfony project created on October 17, 2016, 10:50 am, by the students of the [Wild Code School](http://www.wildcodeschool.fr/), Lyon.
 
* Symfony version 2.8
* PHP 5.3.9 
* MySQL 5.7.13
* Bootstrap
* EasyAdminBundle
* FOSUserBundle

##Context
The Booster is a brand new French startup, that wants to revolutionize our economy. The concept is to put entrepreneurs "Les Boostés", in contact with the people who desire to help them "Les Boosters", by giving a free amount of their time to share their skills.

The team was in charge of developing the second version of the website. 


##Team of contributors
Laurie Gandon, Cédric Gamrat, Yoann Gloaguen, Riad Hacini .

##Licence
This website is the property of the company The Booster. 

#Installation procedure

###mbcrypt
The following packages must be installed :
<pre>sudo apt-get install mcrypt php-mcrypt </pre>
<pre>sudo apt-get install mcrypt php7.0-mcrypt </pre>

####Project Recovery
SSH : 
<pre>git clone git@github.com:WildCodeSchool/lyon_1116_the_booster_v2.git</pre>
HTTPS : 
<pre>https://github.com/WildCodeSchool/lyon_exam_final_012017.git </pre>
####One moves in the file of the project

<pre>cd lyon_1116_the_booster_v2 </pre>

####Installation of the project

<pre> composer install </pre>
#####At the end of the loading, they will ask you for parameters
<pre> 
      database_host : localhost
      database_port :  ~
      database_name : (Your database)
      database_user : (Username of mysql)
      database_password: (Your password mysql)
      
      mailer_transport : gmail (If it's gmail) (default : smtp)
      mailer_host : smtp.gmail.com (If it's gmail) (default : 127.0.0.1)
      mailer_to : (your email)
      mailer_user : (your email)
      mailer_password : (your password)
      
      public_key_captcha : (public key Google Recaptcha)
      private_key_captcha : (private key Google Recaptcha)
      
      secret_paypal : (generate keys with a command)
      
      username_paypal_api : (username api paypal)
      password_paypal_api : (password api paypal)
      signature_paypal_api : (signature api paypal)
      
</pre>

#####To modify this file parameter.yml

<pre>cd app/config/
nano parameters.yml</pre>


####For the public and private key Google Recaptcha

https://www.google.com/recaptcha/intro/comingsoon/invisiblebeta.html

Paste keys private and public in parameters.yml (public_key_captcha and private_key_captcha )

####For secret_paypal

<pre>
 php bin/console jms_payment_core:generate-key
</pre>
Paste secret key in parameters.yml (secret_paypal)

####For Paypal Api 
https://developer.paypal.com/docs/classic/api/apiCredentials/

Paste username, password and signature in parameters.yml(username_paypal_api ,  password_paypal_api, signature_paypal_api)

#####Create your database
<pre> php app/console database:create</pre>

#####Update database : 

<pre> php app/console doctrine:schema:update --force</pre>

#####Existing database (dump) : 

<pre>
 cd src/BoosterBundle/DumpSql/
 
 mysql -u your_username -p your_database_name    < faq.sql
 mysql -u your_username -p your_database_name    < admin.sql
</pre>

####Installing assets

<pre> php bin/console assets:install </pre>