## Laravel better notification

A flexible way to use laravel default database notifications to be able to change notification structure without errors.

This repo is based on this [Course](https://codecourse.com/courses/better-laravel-database-notifications).

## How to use

1. clone this repo & install dependencies using composer
2. copy `.env` from `.env.example`
3. add your application key
4. run migrations with seed
5. serve your project
6. login with `user@user.com` email & `password` password
7. you can view many-forms of notifications & add new ones
8. when you change any notification structure, run `notifications:restructure` to prevent errors
