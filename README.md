# sports-field-booking
Mini system for sports field booking (insert, fetch, show data)
![screenshot](https://image.prntscr.com/image/QGN_oqduQKaw3-oW-4B3iQ.png)


## Getting started
First we need to install localhost with some of the following softwares:
- [XAMPP](https://www.apachefriends.org/index.html)
- [MAMP](https://www.mamp.info/en/)
- [WAMP](http://www.wampserver.com/en/)
- ...

### Create Database
After installing you need to reach phpmyadmin page.<br>
I using **XAMPP** and in my case I need to write in browser **localhost/phpmyadmin** <br>
After you reach phpmyadmin page click on **-->new** then enter *Database name* and click **-->create**<br>
I set 'sf_booking_sys' for Database name.<br>
Now you find your pre-created database on the left side of the page and click on it then click on SQL on top of the page.

### Make table
Now we need to create a table where we'll save data.<br>
Write following code:
```mysql
CREATE TABLE sf_booked(id INTEGER PRIMARY KEY AUTO_INCREMENT,field_num INTEGER, day DATE, stat TIME, end TIME, book_time DATETIME, user TEXT));
```
```
---------------------------------------------------------
| ID | FIELD_NUM | DAY | STRAT | END | BOOK_TIME | USER |
+----+-----------+-----+-------+-----+-----------+------+
|    |           |     |       |     |           |      |
---------------------------------------------------------
```

### Set params
Go to *config/db.php* and set the following variables
```php
const host="localhost";	//localhost
const user="root";	//username
const pass="";	//password
const dbName="sf_booking_sys"; //datababe name
const charset="utf8";	//charset
```

## The logic for one *if* in book_process.php 
```php
if(
    (strtotime($start) <= strtotime($key['start']) && strtotime($end) > strtotime($key['start'])) ||
    (strtotime($start) >= strtotime($key['start']) && strtotime($start) < strtotime($key['end']))
  ){	
    $notIn=0;					
  }
```
This *if* checks if time period($start - $end) is free to be booked.<br>
We have 4 possibilities to check<br>
![#79c375](https://placehold.it/15/79c375/000000?text=+) $start and $end - **Trying to book**<br>
![#af1919](https://placehold.it/15/af1919/000000?text=+) $key['start'] and $key['end'] - **Booked**<br><br>

First:
<br>
![screenshot](https://image.prntscr.com/image/0OWyBlvGTtW0jVMWvJSsDQ.png)

Second:
<br>
![screenshot](https://image.prntscr.com/image/ZHpnlB3dT9mRrHRGAsqztQ.png)

Third:
<br>
![screenshot](https://image.prntscr.com/image/mxReTJCiT5q8mCLclZxqVA.png)

Fourth:
<br>
![screenshot](https://image.prntscr.com/image/g_ph7d55RbeCfNGj-Yg4rw.png)

This part solves the first and third situation
```php
(strtotime($start) <= strtotime($key['start']) && strtotime($end) > strtotime($key['start']))
```

This part solves the second and fourth situation
```php
(strtotime($start) >= strtotime($key['start']) && strtotime($start) < strtotime($key['end']))
```

## The knowledge I used for developing this mini system
- MYSQL
- PHP
  - PDO
- JS
  - JQuery
- CSS
  - CSS Grid

