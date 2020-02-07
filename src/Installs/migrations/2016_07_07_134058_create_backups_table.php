<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Kipl\Moduleadmin\Models\Module;

class CreateBackupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Module::generate("Backups", 'backups', 'name', 'fa-hdd-o', [
            [
                "colname" => "name",
                "label" => "Name",
                "field_type" => "Name",
                "unique" => true,
                "defaultvalue" => "",
                "minlength" => 0,
                "maxlength" => 250,
                "required" => true,
                "listing_col" => true
            ], [
                "colname" => "file_name",
                "label" => "File Name",
                "field_type" => "String",
                "unique" => true,
                "defaultvalue" => "",
                "minlength" => 0,
                "maxlength" => 250,
                "required" => true,
                "listing_col" => true
            ], [
                "colname" => "backup_size",
                "label" => "File Size",
                "field_type" => "String",
                "unique" => false,
                "defaultvalue" => "0",
                "minlength" => 0,
                "maxlength" => 10,
                "required" => true,
                "listing_col" => false
            ]
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('backups')) {
            Schema::drop('backups');
        }
    }
}
