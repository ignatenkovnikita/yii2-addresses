<?php

use yii\db\Migration;

class m161222_094846_init extends Migration
{
    public $tableName = '{{%address}}';

    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'json' => $this->text(),
            'postal_code' => $this->string(),
            'country' => $this->string(),
            'region_fias_id' => $this->string(),
            'region_kladr_id' => $this->string(),
            'region_with_type' => $this->string(),
            'region_type' => $this->string(),
            'region_type_full' => $this->string(),
            'region' => $this->string(),
            'area_fias_id' => $this->string(),
            'area_kladr_id' => $this->string(),
            'area_with_type' => $this->string(),
            'area_type' => $this->string(),
            'area_type_full' => $this->string(),
            'area' => $this->string(),
            'city_fias_id' => $this->string(),
            'city_kladr_id' => $this->string(),
            'city_with_type' => $this->string(),
            'city_type' => $this->string(),
            'city_type_full' => $this->string(),
            'city' => $this->string(),
            'city_area' => $this->string(),
            'city_district' => $this->string(),
            'city_district_fias_id' => $this->string(),
            'city_district_kladr_id' => $this->string(),
            'city_district_with_type' => $this->string(),
            'city_district_type' => $this->string(),
            'city_district_type_full' => $this->string(),
            'settlement_fias_id' => $this->string(),
            'settlement_kladr_id' => $this->string(),
            'settlement_with_type' => $this->string(),
            'settlement_type' => $this->string(),
            'settlement_type_full' => $this->string(),
            'settlement' => $this->string(),
            'street_fias_id' => $this->string(),
            'street_kladr_id' => $this->string(),
            'street_with_type' => $this->string(),
            'street_type' => $this->string(),
            'street_type_full' => $this->string(),
            'street' => $this->string(),
            'house_fias_id' => $this->string(),
            'house_kladr_id' => $this->string(),
            'house_type' => $this->string(),
            'house_type_full' => $this->string(),
            'house' => $this->string(),
            'block_type' => $this->string(),
            'block_type_full' => $this->string(),
            'block' => $this->string(),
            'flat_type' => $this->string(),
            'flat_type_full' => $this->string(),
            'flat' => $this->string(),
            'flat_area' => $this->string(),
            'square_meter_price' => $this->string(),
            'flat_price' => $this->string(),
            'postal_box' => $this->string(),
            'fias_id' => $this->string(),
            'fias_level' => $this->string(),
            'kladr_id' => $this->string(),
            'capital_marker' => $this->string(),
            'okato' => $this->string(),
            'oktmo' => $this->string(),
            'tax_office' => $this->string(),
            'tax_office_legal' => $this->string(),
            'timezone' => $this->string(),
            'geo_lat' => $this->string(),
            'geo_lon' => $this->string(),
            'beltway_hit' => $this->string(),
            'beltway_distance' => $this->string(),
            'qc_geo' => $this->string(),
            'qc_complete' => $this->string(),
            'qc_house' => $this->string(),
            'unparsed_parts' => $this->string(),
            'qc' => $this->string()
        ],$tableOptions);
    }

    public function down()
    {
        $this->dropTable($this->tableName);
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
