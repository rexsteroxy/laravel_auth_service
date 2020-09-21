
# Laravel-Multiple-Authentication Service

A Laravel application with user registration/login, admin login and token generation for subsequent user actions. 
This functionality helps to ensure a user is authenticated before using the application.

## Application Urls
`Hosted on Heroku and a free database from db4free.net`

[This test application is hosted online here](http://patricia-code-test.herokuapp.com/login)


## User Story
A two way multiple authentication system where a user and an admin is able to register and login to perform user and admin
specific actions. A user requires a verification token
from an admin in order to proceed with using the application functionality.

This app enables a user to register, login, then get a token from an admin in order to see details and perform other actions.
It also allows an Admin to have its own unique authentication.



## BreakDown
* User login view.
![2020-09-20 13_16_54-](https://user-images.githubusercontent.com/38590494/93711214-5c1d6680-fb44-11ea-89bc-de41f858f7b7.png)

* User registration view.
![2020-09-20 13_18_12-User](https://user-images.githubusercontent.com/38590494/93711215-5d4e9380-fb44-11ea-9e65-cd44f43bad5b.png)


* Token view after login or registration.
![2020-09-20 13_18_40-User](https://user-images.githubusercontent.com/38590494/93711216-5de72a00-fb44-11ea-8f72-4715da3381e0.png)

The user is expected to input the correct token which will be given by the admin.

 * NOTE: The token is always generated everytime the user logs in. So a user will always be expected to input a new token once authenticated.


* Once Token verification is complete, the user can now have access to the dashboard, then see user details displayed.
![2020-09-20 13_20_32-](https://user-images.githubusercontent.com/38590494/93711218-5e7fc080-fb44-11ea-8f87-9c155aa797a7.png)

## ADMIN BREAKDOWN
* Admin also have its own seperate authentication system.

In Laravel 5.4 we actually can natively support multiple User models (Sometimes called MultiAuth). This means we can have different users and manage these users independently using the Native Auth Facades without any packages or plugins. A very good example of this is implemented in this code test application, where admin is requered to login and get user unique token on every user log in. I used different tables to manage these types of users, and have different middleware and guards in place as well. Namely, guard("web")(which is default) and guard("admin) which I created.

`NOTE: A default admin is created on running migration with default admin details (Email="superadmin@gmail.com", Password= "secret")`


![2020-09-20 13_35_05-admin](https://user-images.githubusercontent.com/38590494/93711428-2bd6c780-fb46-11ea-9e91-5c61570e7872.png)


* Once Admin logs in successfully, Admin can now see all registed user details on the dashboard including the generated user token.
![2020-09-20 13_19_53-admin](https://user-images.githubusercontent.com/38590494/93711217-5de72a00-fb44-11ea-9666-20a70773af53.png)

`I also implemented the Logout functionality for both admin and user.`

## Installation

clone repository
Then install dependencies using [Composer](https://getcomposer.org/doc/00-intro.md)
```bash
$ composer install
```

Copy `.env.example` to `.env`
```bash
$ cp .env.example .env
```
Add your database credentials as appropriate

``` $ php artisan key:generate```

``` $ php artisan migrate```





## Run
Run the application with the following command
```bash
$ php artisan serve
```



## Packages used
Used default laravel packages.


## Use of best practice
* Good naming convention.
* Used named routes in my routing.
* Abstracted input request validation from my controller to a seperate Request Class, thereby keeping the controller clean and simple.
* Used middleware for user token verification.
* Proper code comments.
* Proper code indentation.
* Used group routing when needed.


## Unit Test
* Wrote a basic unit test to confirm application URL's return a 200 request.


## Future Work
Even though this is an MVC, the application can be refactured to make it an API service. This can be achieved by moving the web routes to the standard API routes, the logic for login and registration will be almost similiar but for the Token, a longer string can be generated.