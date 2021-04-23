# PHP-Reflection
My PHP Reflection for the Netmatters SCS training course.

## Set-Up
- Includes a `.sql` database dump file in `dist/data` to be imported as MySQL.
- To connect to MySQL, an `sql_credentials.php` file must be created in the `dist/data` folder, structured like so:
```
$mysql = "mysql:host=HOSTNAME;dbname=netmatters;port=PORT"; // Adjust as per your configs
$sql_user = "USERNAME"; // Where USERNAME is your MySQL admin account
$sql_pass "PASSWORD"; // Where PASSWORD is your MySQL admin password
```

## Dependencies
- None (yet)

## Dev Dependencies
Details in `package.json`.
- Gulp (+ addons)
- Babel (+ addons)

## To Do
- [ ] Finish styling the contact page.
- [ ] Add form functionality to the newsletter sign-up.
- [ ] Secure the MySQL credentials.
