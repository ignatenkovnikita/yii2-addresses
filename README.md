Yii2 Module Addresses 
======================
Yii2 Module Addresses 

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist ignatenkovnikita/yii2-addresses "*"
```

or add

```
"ignatenkovnikita/yii2-addresses": "*"
./console/yii migrate --migrationPath=@vendor/ignatenkovnikita/yii2-addresses/

```

to the require section of your `composer.json` file.


Usage
-----

Add  line to backend config
```php
'address' => [
            'class' => \ignatenkovnikita\addresses\Address::class,
            'controllerNamespace' => \ignatenkovnikita\addresses\Address::backendControllerNamespace(),
            'viewPath' => '@vendor/ignatenkovnikita/yii2-addresses/backend/views',
]
```
    
Add  line to frontend config
```php
'address' => [
            'class' => \ignatenkovnikita\addresses\Address::class,
            'controllerNamespace' => \ignatenkovnikita\addresses\Address::frontendControllerNamespace(),
]
```


// todo
* refactoring
* add dependence
