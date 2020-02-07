<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Kipl\Moduleadmin\Models\Module;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Module::generate("Roles", 'roles', 'name', 'fa-user-plus', [
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
                "colname" => "display_name",
                "label" => "Display Name",
                "field_type" => "String",
                "unique" => false,
                "defaultvalue" => "",
                "minlength" => 0,
                "maxlength" => 250,
                "required" => true,
                "listing_col" => true
            ], [
                "colname" => "description",
                "label" => "Description",
                "field_type" => "Textarea",
                "unique" => false,
                "defaultvalue" => "",
                "minlength" => 0,
                "maxlength" => 1000,
                "required" => false,
                "listing_col" => false
            ], [
                "colname" => "parent",
                "label" => "Parent Role",
                "field_type" => "Dropdown",
                "unique" => false,
                "defaultvalue" => "1",
                "minlength" => 0,
                "maxlength" => 0,
                "required" => false,
                "listing_col" => true,
                "popup_vals" => "@roles",
            ], [
                "colname" => "dept",
                "label" => "Department",
                "field_type" => "Dropdown",
                "unique" => false,
                "defaultvalue" => "1",
                "minlength" => 0,
                "maxlength" => 0,
                "required" => false,
                "listing_col" => true,
                "popup_vals" => "@departments",
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
        if (Schema::hasTable('roles')) {
            Schema::drop('roles');
        }
    }
}
