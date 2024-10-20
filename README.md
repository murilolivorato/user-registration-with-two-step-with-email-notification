<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>


## About Laravel User Registration with Two-Step Email Notification
This project demonstrates a user registration system implemented in Laravel that includes a two-step verification process using email notifications. The main features of the project are:  
User Registration: Users can register by providing their email address. This triggers the first step of the registration process.
Email Notification: Upon registration, an email is sent to the user with a verification link or instructions to complete the registration.
Token Validation: The system validates the token sent in the email to ensure the authenticity of the user.
User Information Update: After email verification, users can update their registration details, such as name, phone number, and a custom message.
Middleware Protection: The update route is protected by middleware to ensure that only users with a valid token can access it.
This project serves as a tutorial for implementing a secure and user-friendly registration process in Laravel applications.

## More info at
https://medium.com/@murilolivorato/mastering-polymorphic-relationships-in-laravel-a-comprehensive-guide-ff3bc3ef2b64

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
