Forecast App
======

To be able to forecast the cost of our infrastructure based on customer usage and
expected growth. The number of servers required for our platform is based on the number of
studies send to our environment such as x-ray, CT Scan and MRI.

Frameworks and Plugins Used
======

PHP Framework : Laravel <br/>
CSS Library : Bootstrap <br/>
Javascript : jQuery <br/>
Javascript Plugins : Datatables,Mustache,SweetAlert,WaitMe <br/>


How to install
=============

You must first have Composer installed. Get installer here : https://getcomposer.org/download/<br/>
Once composer is installed, download laravel using Composer.  <code>composer global require laravel/installer</code><br/>
Clone or Download this repo <code>https://github.com/rjmcbdev/techtest.git</code> <br/>
After downloading, open your favorite terminal application and go to the directory of your downloaded repo.<br/>
Copy the ".env.example" file and rename it as ".env"<br/>
On the directory of the app, use your favorite terminal application and then type : <code>php artisan key:generate</code><br/>
Once done, type <code>php artisan serve</code> on your terminal to be able to start the Laravel server.<br/>
When Laravel server starts, it will prompt "Laravel development server started: <http://127.0.0.1:8000>"<br/>
You may now access the web application thru this link : http://127.0.0.1:8000







