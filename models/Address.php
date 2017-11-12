<?php

namespace ignatenkovnikita\addresses\models;

use ignatenkovnikita\addresses\models\query\AddressQuery;
use ignatenkovnikita\dadata\DadataModel;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%address}}".
 *
 * @property integer $id
 * @property string $fias_id
 * @property string $json
 * @property string $postal_code
 * @property string $country
 * @property string $region_fias_id
 * @property string $region_kladr_id
 * @property string $region_with_type
 * @property string $region_type
 * @property string $region_type_full
 * @property string $region
 * @property string $area_fias_id
 * @property string $area_kladr_id
 * @property string $area_with_type
 * @property string $area_type
 * @property string $area_type_full
 * @property string $area
 * @property string $city_fias_id
 * @property string $city_kladr_id
 * @property string $city_with_type
 * @property string $city_type
 * @property string $city_type_full
 * @property string $city
 * @property string $city_area
 * @property string $city_district
 * @property string $city_district_fias_id
 * @property string $city_district_kladr_id
 * @property string $city_district_with_type
 * @property string $city_district_type
 * @property string $city_district_type_full
 * @property string $settlement_fias_id
 * @property string $settlement_kladr_id
 * @property string $settlement_with_type
 * @property string $settlement_type
 * @property string $settlement_type_full
 * @property string $settlement
 * @property string $street_fias_id
 * @property string $street_kladr_id
 * @property string $street_with_type
 * @property string $street_type
 * @property string $street_type_full
 * @property string $street
 * @property string $house_fias_id
 * @property string $house_kladr_id
 * @property string $house_type
 * @property string $house_type_full
 * @property string $house
 * @property string $block_type
 * @property string $block_type_full
 * @property string $block
 * @property string $flat_type
 * @property string $flat_type_full
 * @property string $flat
 * @property string $flat_area
 * @property string $square_meter_price
 * @property string $flat_price
 * @property string $postal_box
 * @property string $fias_level
 * @property string $kladr_id
 * @property string $capital_marker
 * @property string $okato
 * @property string $oktmo
 * @property string $tax_office
 * @property string $tax_office_legal
 * @property string $timezone
 * @property string $geo_lat
 * @property string $geo_lon
 * @property string $beltway_hit
 * @property string $beltway_distance
 * @property string $qc_geo
 * @property string $qc_complete
 * @property string $qc_house
 * @property string $unparsed_parts
 * @property string $qc * @property string $ => $this->string()
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
            [[
                'postal_code',
                'country',
                'region_fias_id',
                'region_kladr_id',
                'region_with_type',
                'region_type',
                'region_type_full',
                'region',
                'area_fias_id',
                'area_kladr_id',
                'area_with_type',
                'area_type',
                'area_type_full',
                'area',
                'city_fias_id',
                'city_kladr_id',
                'city_with_type',
                'city_type',
                'city_type_full',
                'city',
                'city_area',
                'city_district',
                'city_district_fias_id',
                'city_district_kladr_id',
                'city_district_with_type',
                'city_district_type',
                'city_district_type_full',
                'settlement_fias_id',
                'settlement_kladr_id',
                'settlement_with_type',
                'settlement_type',
                'settlement_type_full',
                'settlement',
                'street_fias_id',
                'street_kladr_id',
                'street_with_type',
                'street_type',
                'street_type_full',
                'street',
                'house_fias_id',
                'house_kladr_id',
                'house_type',
                'house_type_full',
                'house',
                'block_type',
                'block_type_full',
                'block',
                'flat_type',
                'flat_type_full',
                'flat',
                'flat_area',
                'square_meter_price',
                'flat_price',
                'postal_box',
                'fias_id',
                'fias_level',
                'kladr_id',
                'capital_marker',
                'okato',
                'oktmo',
                'tax_office',
                'tax_office_legal',
                'timezone',
                'geo_lat',
                'geo_lon',
                'beltway_hit',
                'beltway_distance',
                'qc_geo',
                'qc_complete',
                'qc_house',
                'unparsed_parts',
                'qc',
                'json',
            ], 'string'],
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
        $address = self::find()->where(['fias_id' => $data->fias_id])->one();
        if (!$address) {
            $address = new self();
            $address->load($data->getAttributes(), '');
            $address->save();
        }

        return $address;
    }


    public static  function getFullById($id)
    {
        $model = self::findOne($id);
        return $model->getFull();

    }

    public function getFull()
    {
        $r = $this->getMeta();
        return $this->getRegionWithType() . ' ' . $this->getCityWithType() . ' ' . $this->getStreetWithType() . ' ' . $this->getHouseWithType() . ' ' . $this->getFlatWithType();
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

    public static function getCitiesAsList($q = false, $limit = 10, $id = 'city', $name = 'city'){
        $query =  Address::find()->select([ 'city'])->distinct('city')->limit($limit);
        if($q){
            $query->withCity($q);
        }
        return ArrayHelper::map($query->all() , $id, $name);

    }
}
