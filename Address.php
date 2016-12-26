<?php

namespace ignatenkovnikita\addresses;

use ignatenkovnikita\dadata\DadataModel;
use Yii;

/**
 * This is the model class for table "{{%address}}".
 *
 * @property integer $id
 * @property string $fias_id
 * @property string $json
 */
class Address extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%address}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['json', 'fias_id'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Fias Id' => 'Fias Id',
            'json' => 'Json',
        ];
    }

    /**
     * @inheritdoc
     * @return \common\models\query\AddressQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AddressQuery(get_called_class());
    }

    public static function getExistOrNew(DadataModel $data)
    {
        $town = self::find()->where(['fias_id' => $data->fiasId])->one();
        if (!$town) {
            $town = new self();
            $town->fias_id = $data->fiasId;
            $town->json = $data->rawData;
            $town->save();
        }

        return $town;
    }

    public function getFull()
    {
        $r = $this->getMeta();
        return $this->getPostalCode() . ' ' . $this->getRegionWithType() . ' ' . $this->getCityWithType() . ' ' . $this->getStreetWithType() . ' ' . $this->getHouseWithType() . ' ' . $this->getFlatWithType();
    }

    public function getRaw()
    {
        return $this->meta;
    }

    protected function getMeta()
    {
        return json_decode($this->json);
    }

    public function getPostalCode()
    {
        return $this->meta->postal_code;
    }

    public function getRegionWithType()
    {
        return $this->meta->region_with_type;
    }

    public function getCityWithType()
    {
        return $this->meta->city_with_type;
    }

    public function getStreetWithType()
    {
        return $this->meta->street_with_type;
    }

    public function getHouseWithType()
    {
        return $this->meta->house_type . ' ' . $this->meta->house;
    }

    public function getFlatWithType()
    {
        return $this->meta->flat_type . ' ' . $this->meta->flat;
    }
}
