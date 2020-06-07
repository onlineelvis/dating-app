## Dating app
My experimental dating app. With filters, like/dislike/match system, gallery multi-upload and so on. As well in this project are made factory and seed for better app testing.

## Functionality
1. All forms are with validations to prevent user mistakes (Age:min 18, filter slider, password confirmation and so on... ).
2. Like/Dislike/Match system. When two user matched each other they receive e-mail. Or when some user disliked other user there is special function for that if disliked user change profile picture then he will lose disliked status.
3. When user is registered he will receive welcome message on email or when user forgot password;
4. In a gallery is possible to upload multiple pictures in one time.
5. When user likes matched then user will be shown in other view where is possible to see all info about users.
6. Filter for user search - filtering by age and gender.

## Installation
1.Clone the repository-

> git clone 

2.Then cd into the folder with this command-

> cd datingApp

3.Then do a composer install and npm install-

> composer install
> npm install

4.Then create a environment file using this command-

> cp .env.example .env

5. Generate key and link storage

> php artisan key:generate
> php artisan storage:link

6.migrate DB (make sure you have connected to your db in .env file)

> php artisan migrate

7.Third party source mailtrap.

    7.1. go into .env file
    7.2. set mail_username
    7.3. set mail_password
    7.4. set mail_from_adress

8.Faker and seeder. (optional) To test dating app seeds logic is written.

> php artisan db:seed

## Run server

> php artisan serve

## Optional 

In this project in addition possible to add some modal window pop ups.

