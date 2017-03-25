<?php

use yii\db\Migration;

class m170325_164148_init_base_tables extends Migration
{
    // Список комплектующих: processor, videocard, motherboard, ram_module, cooler, power_supply, case (корпус), hdd, ssd, audiocard

    private $PCParts = '{{%pc_parts}}';
    private $PartsType = '{{%pc_parts_types}}';
    private $Processors = '{{%component_processors}}';
    private $Motherboards = '{{%component_motherboards}}';
    private $VideoCards = '{{%component_video_cards}}';
    private $RamModules = '{{%component_ram_modules}}';
    private $Coolers = '{{%component_coolers}}';
    private $PowerSupplies = '{{%component_power_supplies}}';
    private $Cases = '{{%component_cases}}';
    private $HDDs = '{{%component_hdds}}';
    private $SSDs = '{{%component_ssds}}';
    private $AudioCards = '{{%component_audio_cards}}';

    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        foreach (get_class_vars(get_class($this)) as $property => $tableName) {
            $getMethod = 'get' . $property . 'Fields';
            $this->createTable($tableName, $this->$getMethod(), $tableOptions);
        }
    }

    public function safeDown()
    {
        foreach (get_class_vars(get_class($this)) as $tableName) {
            $this->dropTable($tableName);
        }
    }

    public function getPCPartsFields()
    {
        return [
            'id'           => $this->primaryKey(),
            'name'         => $this->string()->notNull(),
            'manufacturer' => $this->string()->notNull(),
            'description'  => $this->text()->notNull(),
            'image'        => $this->string(),
            'price'        => $this->float()->notNull(),
            'type_id'      => $this->integer(),
            'component_id' => $this->integer()->notNull(),
            'available'    => $this->boolean()->notNull()->defaultValue(true),
        ];
    }

    public function getPartsTypeFields()
    {
        return [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
        ];
    }

    public function getProcessorsFields()
    {
        return [
            'id' => $this->primaryKey(),
        ];
    }

    public function getMotherboardsFields()
    {
        return [
            'id' => $this->primaryKey(),
        ];
    }

    public function getVideoCardsFields()
    {
        return [
            'id' => $this->primaryKey(),
        ];
    }

    public function getRamModulesFields()
    {
        return [
            'id' => $this->primaryKey(),
        ];
    }

    public function getCoolersFields()
    {
        return [
            'id' => $this->primaryKey(),
        ];
    }

    public function getPowerSuppliesFields()
    {
        return [
            'id' => $this->primaryKey(),
        ];
    }

    public function getCasesFields()
    {
        return [
            'id' => $this->primaryKey(),
        ];
    }

    public function getHDDsFields()
    {
        return [
            'id' => $this->primaryKey(),
        ];
    }

    public function getSSDsFields()
    {
        return [
            'id' => $this->primaryKey(),
        ];
    }

    public function getAudioCardsFields()
    {
        return [
            'id' => $this->primaryKey(),
        ];
    }
}
