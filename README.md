Starter site based on Yii 2 Basic Application Template
================================

Starter site is a skeleton Yii 2 application best for rapidly creating small projects.

The template contains the main features including: 
 - full user management including social login (dektrium/yii2-user)
 - multilanguage support
 - Article and Page controllers (trntv/yii2-starter-kit)
 - tinymce editor with elfinder
 - Administration controller based on admin-lte template
 - Backup/restore database
 - a few collapsed widgets on admin's dashboard page   
 - contact page

It includes all commonly used configurations that would allow you to focus on adding new
features to your application.


INSTALL
-----------

During installation you will be sure to make migration
- from app migration folder
- from yii2-user module 
($ php yii migrate/up --migrationPath=@vendor/dektrium/yii2-user/migrations) 


REQUIREMENTS
------------

The minimum requirement by this application template that your Web server supports PHP 5.4.0.


CONFIGURATION
-------------

### Database

Edit the file `config/db.php` with real data, for example:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=yii2basic',
    'username' => 'root',
    'password' => '1234',
    'charset' => 'utf8',
];
```
