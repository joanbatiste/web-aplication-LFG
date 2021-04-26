<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<h1 align="center"> First project using the ORM - Laravel</h1><a name="TOP"></a>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## First project using the ORM - Laravel

This is our first project using the ORM of LARAVEL.

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

## Tecnologies 👨‍💻
- **[SQL](https://www.w3schools.com/sql/)**
- **[PHP](https://www.php.net/manual/es/intro-whatis.php)**
- **[Laravel](https://laravel.com/) - [Passport](https://laravel.com/docs/8.x/passport)**
- **[Docker](https://www.docker.com/)**
- **[Gitflow](https://www.atlassian.com/es/git/tutorials/comparing-workflows/gitflow-workflow)**
- **[Postman](https://www.postman.com/)**

## UML - SQL 📌
![image](https://user-images.githubusercontent.com/56218293/115999078-a7bc5500-a5ea-11eb-9aed-adf1de41247a.png)


## Testing with Postman 🎈 
<h3 style="color">Player</h3>

Action | Method | URL
| :--- | ---: | :---:
Register | POST | http://127.0.0.1:8000/api/players/register
Login | POST | http://127.0.0.1:8000/api/players/register
Logout | POST | http://127.0.0.1:8000/api/players/logout
Update | PUT | http://127.0.0.1:8000/api/players/{id}

![Crud-players](https://user-images.githubusercontent.com/74936966/116004826-de06ce00-a604-11eb-9e97-b240ed5abe2b.gif)

<h3>Membership</h3>

Action | Method | URL
| :--- | ---: | :---:
Login-Party | POST | http://127.0.0.1:8000/api/parties/login
Logout-Party | DELETE | http://127.0.0.1:8000/api/parties/logout

![Membership](https://user-images.githubusercontent.com/74936966/116004887-13132080-a605-11eb-9aef-77606eba089c.gif)

<h3>Game</h3>
    
Action | Method | URL
| :--- | ---: | :---:
CREATE | POST | http://127.0.0.1:8000/api/game/register

![Game](https://user-images.githubusercontent.com/74936966/116004932-3a69ed80-a605-11eb-81f0-41c87270eb75.gif)


<h3>Parties</h3>

Action | Method | URL
| :--- | ---: | :---:
CREATE | POST | http://127.0.0.1:8000/api/games/{idgame}/parties
FIND | GET | http://127.0.0.1:8000/api/games/{id}/parties
DELETE | DELETE | http://127.0.0.1:8000/api/parties/{id}

![Parties](https://user-images.githubusercontent.com/74936966/116005033-992f6700-a605-11eb-8af3-e60e62f0a14a.gif)


<h3>Message</h3>

Action | Method | URL
| :--- | ---: | :---:
CREATE | POST | http://127.0.0.1:8000/api/parties/{id}/messages
ALL    | GET  | http://127.0.0.1:8000/api/parties/{id}/messages
UPDATE | PUT  | http://127.0.0.1:8000/api/messages/{id}
DELETE | DELETE | http://127.0.0.1:8000/api/messages/{id}

![Messages](https://user-images.githubusercontent.com/74936966/116005097-cb40c900-a605-11eb-8d3a-eddd422a6e21.gif) 


## Git Flow ⛏️

![Grabación de pantalla 2021-04-26 a las 9 53 27](https://user-images.githubusercontent.com/56218293/116048420-6fae2400-a675-11eb-8c04-ecc98899f659.gif) 

## Authors <a name = "authors"> ✍️</a>

- [@Joan](https://github.com/joanbatiste) - Idea & Initial development work
- [@gianrondo91](https://github.com/GianRondo91) - Idea & Initial development work

## Security Vulnerabilities 🔒	

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License 👮‍♂️

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).


[Go To TOP](#TOP)
