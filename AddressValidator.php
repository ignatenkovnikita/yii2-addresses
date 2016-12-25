<?php
/**
 * Created by PhpStorm.
 * User: ignatenkovnikita
 * Date: 25/12/2016
 * Time: 16:09
 * Web Site: http://IgnatenkovNikita.ru
 */

namespace ignatenkovnikita\addresses;


use ignatenkovnikita\dadata\DadataFactory;
use ignatenkovnikita\dadata\DadataModel;
use yii\validators\Validator;

class AddressValidator extends Validator
{
    public function validateAttribute($model, $attribute)
    {
        $daDataModel = DadataFactory::fromJson($model->{$attribute});

        if ($daDataModel instanceof DadataModel && $daDataModel->validate()) {
            $town = Address::getExistOrNew($daDataModel);
            if ($town) {
                $attrId = str_replace('dadata', 'id', $attribute);
                $model->{$attrId} = $town->id;
            }
        }
    }
}