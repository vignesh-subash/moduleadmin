<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Kipl\Moduleadmin\Models\Module;

class CreateDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Module::generate("Departments", 'departments', 'name', 'fa-tags', [
            [
                "colname" => "name",
                "label" => "Name",
                "field_type" => "Name",
                "unique" => true,
                "defaultvalue" => "",
                "minlength" => 1,
                "maxlength" => 250,
                "required" => true,
                "listing_col" => true
            ], [
                "colname" => "tags",
                "label" => "Tags",
                "field_type" => "Taginput",
                "unique" => false,
                "defaultvalue" => [],
                "minlength" => 0,
                "maxlength" => 0,
                "required" => false,
                "listing_col" => false
            ], [
                "colname" => "color",
                "label" => "Color",
                "field_type" => "String",
                "unique" => false,
                "defaultvalue" => "",
                "minlength" => 0,
                "maxlength" => 50,
                "required" => true,
                "listing_col" => true
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
        if (Schema::hasTable('departments')) {
            Schema::drop('departments');
        }
    }
}
