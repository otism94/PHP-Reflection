# PHP-Reflection
My PHP Reflection for the Netmatters SCS training course.

## Set-Up
- Includes a `.sql` database dump file in `dist/data` to be imported as MySQL.
- Environment variables must be set up to connect to the database. See `dist/data/.env.example` for more details.

## Dependencies
Details in `composer.json`.
**Note:** Composer packages should be installed in `dist`.
- phpdotenv (Composer)

## Dev Dependencies
Details in `package.json`.
**Note:** npm packages should be installed in the root folder.
- Gulp (npm)
- Babel (npm)

## To Do
- [ ] Finish styling the contact page
- [ ] Add a form redirect page
- [ ] Improve production build error handling
- [X] ~~Add form functionality to the newsletter sign-up~~
- [X] ~~Secure the MySQL credentials~~
