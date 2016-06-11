Tutor Marked Assignment

=======================



Building web Application using MySQL and PHP(W1) - Birkbeck University of London

 W1 Music Website - APPLICATION DESIGN 




Deploy Location

================


http://titan.dcs.bbk.ac.uk/~bgebre04/w1tma/index.php



Description

================================

Web Applications using MySQL and PHP

This is a prototype of web application which will use PHP to display data
stored 
in a MySQL database as HTML. with the included SQL statements 

required to create and populate the tables for a database of songs and artists which will act
as sample data for the application.


The website displays three different pages:

Home: Displays a short welcome message

Artist:Displays a list of the active artists in the database.
 For each artist shows their name and the number of songs accredited to them.


The application includes the following aspects:


================================


1. All of the views of the application provided  a single point of entry.



2. The default view for the application is a short welcome message 

(sampe Lorem Ipsum text)



3. The  second view  displays a list of all of the active artists in the

database accompanied by a suitable heading.
	
-The list is sorted by artists name in assending order. 
	
-aritis that do not have songs on the database are not included in the list.
	
-a short summary of total active artists and total songs are desplayed below the table.




4. The third view displays all of the songs in the database.
	
-display the title of the song, 
	
-the artist name and the duration of the song in the format: mm:ss 
	
-sorted first by artist, then by the song title, both in ascending order.
	
-a short summary of total active artists and total songs are desplayed below the table.



5. A summary of the songs and artists on the system are displayed on each
view. 
The summary  inform the user of the total number of songs and the total
number of active artists in the system.



Installation

============================

for the application to work the necessary database table needs to be created form the included sql.

(found in the install folder name:w1ma_tables 3.sql)
the config file contains all the credentials for the database to work.

the right credentials must be replaced. such as database host, database name, database user
and database password.


Configuration


===========================

Deploy the sql file included.

make sure all the included files are on the right path,
see the config file that is included.


the application contains the following files:



MySQLDatabase.php----(all the class and methods)

functions.php------- (second to minute and parse template function)

config.php ----------(credentials configuration)

footer.html ---------(footer for each page)

head.html -----------(header and navigation for each page)

w1ma_tables 3.sql ---(database deployment)

content.css ---------(css for tables and navigation list)

template.html--------(templates for rendering each page)

index.php------------(point to the apropriate page)

artist.php-----------(artist page, second view constaraction)

song.php-------------(artist page, second view constaraction)

redme.txt------------(all inforamtion about the application)





