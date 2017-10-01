<?php
namespace ignatenkovnikita\addresses;

/**
 * Created by PhpStorm.
 * User: ignatenkovnikita
 * Web Site: http://IgnatenkovNikita.ru
 */

class Address extends \yii\base\Module
{


    public static function backendControllerNamespace()
    {
        $class = new \ReflectionClass(static::class);
        return $class->getNamespaceName() . '\\backend\\controllers';
    }

    public static function frontendControllerNamespace()
    {
        $class = new \ReflectionClass(static::class);
        return $class->getNamespaceName() . '\\frontend\\controllers';
    }

}