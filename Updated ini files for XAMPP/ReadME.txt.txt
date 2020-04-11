You must replace these ini files with the ones in your xampp folder! These files allow us to send emails to users.

Insert php.ini : C://xampp/php
Insert sendmail.ini: C://xampp/sendmail

**Note: I created a new gmail account that we will use to send the mail to users. I had to use my phone number to sign up for the account, so if you have trouble accessing it, lmk.

	username: wordly.register@gmail.com
	password: pass1234#


*Also, i updated the accounts database:

accounts(id, username, password, firstName, lastName, email, vkey, verified, date_created);
id int(11) AUTO_INCREMENT
vkey varchar(45)
verified tinyint(1) DEFAULT 0
date_created timestamp(6) DEFAULT current_timestamp(6)

//vkey holds the verification key that is sent to the uer's email address. they use this key to verify their account

//verified hold values {0,1} 0 = user didnt verify account, 1 = account successfully verified

//date_created hold the time/date that the account was created
