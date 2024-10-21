<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>


## Building Custom User Registration Flow in Laravel Using Middleware to secure the registration process.
User registration is a fundamental part of most web applications, and there are many different ways to handle it — especially when it comes to verifying user emails. In Laravel, you could use built-in features like the MustVerifyEmail interface to simplify email verification. However, I’m going to show custom approach that gives more flexibility and control.

I’ll show you how to use Laravel middleware to secure the registration process by restricting access to key parts of the application until users have verified their email addresses. Along with that, I’ll use Laravel’s Notifiable class to send a custom verification email to users, allowing them to complete their registration only after clicking a link sent to their inbox.



## More info at
https://medium.com/@murilolivorato/building-custom-user-registration-flow-in-laravel-using-middleware-to-secure-the-registration-07423bdcf129

## Postman collection
```
{
"info": {
"name": "User Registration API",
"_postman_id": "unique-id",
"description": "Collection for User Registration API",
"schema": "https://schema.getpostman.com/json/collection/v2.1.0/collection.json"
},
"item": [
{
"name": "Register User",
"request": {
"method": "POST",
"header": [
{
"key": "Content-Type",
"value": "application/json"
}
],
"body": {
"mode": "raw",
"raw": "{\n  \"email\": \"user@example.com\"\n}"
},
"url": {
"raw": "{{base_url}}/register",
"host": ["{{base_url}}"],
"path": ["register"]
}
}
},
{
"name": "Update User Registration",
"request": {
"method": "PUT",
"header": [
{
"key": "Content-Type",
"value": "application/json"
},
{
"key": "Authorization",
"value": "Bearer {{token}}"
}
],
"body": {
"mode": "raw",
"raw": "{\n  \"name\": \"John Doe\",\n  \"email\": \"john.doe@example.com\",\n  \"phone\": \"1234567890\",\n  \"message\": \"This is a test message.\"\n}"
},
"url": {
"raw": "{{base_url}}/register",
"host": ["{{base_url}}"],
"path": ["register"]
}
}
}
]
}
```
