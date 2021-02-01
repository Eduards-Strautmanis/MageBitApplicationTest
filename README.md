Junior/Mid - Web Developer Test
===============================

Eduards Strautmanis

## How to run it locally

Make sure you have Apache, PHP, and MySQL installed. I used XAMPP and MySQLWorkbench to run the project. 

Firstly, run setup.sql in your MySQL application of choice (like MySQLWorkbench). Also, make sure that you do not have a database/schema with the name "test_email_dtb" created that contains any vital information you would not like to lose. 

Next, place the files provided in this repository in the folder needed to display them when typing in "localhost" in a browser. Since I am on a Mac, that folder to me is /Library/WebServer/Documents, but on Windows, I believe it is XAMPP/htdocs, where XAMPP is simply the original location you installed the application to. 

Finally, simply type in "localhost" into a browser, and you should see index.php, which shows the HTML, CSS, and Vue.js programming in a visible format. The CSS was compiled from a LESS file, which is present in a folder titled "less" in the root directory. When an email is successfully entered, you will be brought to the backend page, "database.php", where you can look at the emails submitted, as well as sort and delete them. 
