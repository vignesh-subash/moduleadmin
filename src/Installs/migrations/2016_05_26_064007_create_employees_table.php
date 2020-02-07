<?php


use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Kipl\Moduleadmin\Models\Module;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Module::generate("Employees", 'employees', 'name', 'fa-group', [
            [
                "colname" => "name",
                "label" => "Name",
                "field_type" => "Name",
                "unique" => false,
                "defaultvalue" => "",
                "minlength" => 5,
                "maxlength" => 250,
                "required" => true,
                "listing_col" => true
            ], [
                "colname" => "designation",
                "label" => "Designation",
                "field_type" => "String",
                "unique" => false,
                "defaultvalue" => "",
                "minlength" => 0,
                "maxlength" => 50,
                "required" => true,
                "listing_col" => true
            ], [
                "colname" => "gender",
                "label" => "Gender",
                "field_type" => "Radio",
                "unique" => false,
                "defaultvalue" => "Male",
                "minlength" => 0,
                "maxlength" => 0,
                "required" => true,
                "listing_col" => false,
                "popup_vals" => ["Male","Female"],
            ], [
                "colname" => "mobile",
                "label" => "Mobile",
                "field_type" => "Mobile",
                "unique" => false,
                "defaultvalue" => "",
                "minlength" => 10,
                "maxlength" => 20,
                "required" => true,
                "listing_col" => true
            ], [
                "colname" => "mobile2",
                "label" => "Alternative Mobile",
                "field_type" => "Mobile",
                "unique" => false,
                "defaultvalue" => "",
                "minlength" => 10,
                "maxlength" => 20,
                "required" => false,
                "listing_col" => false
            ], [
                "colname" => "email",
                "label" => "Email",
                "field_type" => "Email",
                "unique" => true,
                "defaultvalue" => "",
                "minlength" => 5,
                "maxlength" => 250,
                "required" => true,
                "listing_col" => true
            ], [
                "colname" => "dept",
                "label" => "Department",
                "field_type" => "Dropdown",
                "unique" => false,
                "defaultvalue" => "0",
                "minlength" => 0,
                "maxlength" => 0,
                "required" => true,
                "listing_col" => true,
                "popup_vals" => "@departments",
            ], [
                "colname" => "city",
                "label" => "City",
                "field_type" => "String",
                "unique" => false,
                "defaultvalue" => "",
                "minlength" => 0,
                "maxlength" => 50,
                "required" => false,
                "listing_col" => false
            ], [
                "colname" => "address",
                "label" => "Address",
                "field_type" => "Address",
                "unique" => false,
                "defaultvalue" => "",
                "minlength" => 0,
                "maxlength" => 1000,
                "required" => false,
                "listing_col" => false
            ], [
                "colname" => "about",
                "label" => "About",
                "field_type" => "String",
                "unique" => false,
                "defaultvalue" => "",
                "minlength" => 0,
                "maxlength" => 0,
                "required" => false,
                "listing_col" => false
            ], [
                "colname" => "date_birth",
                "label" => "Date of Birth",
                "field_type" => "Date",
                "unique" => false,
                "defaultvalue" => "NULL",
                "minlength" => 0,
                "maxlength" => 0,
                "required" => false,
                "listing_col" => false
            ], [
                "colname" => "date_hire",
                "label" => "Hiring Date",
                "field_type" => "Date",
                "unique" => false,
                "defaultvalue" => "NULL",
                "minlength" => 0,
                "maxlength" => 0,
                "required" => false,
                "listing_col" => false
            ], [
                "colname" => "date_left",
                "label" => "Resignation Date",
                "field_type" => "Date",
                "unique" => false,
                "defaultvalue" => "NULL",
                "minlength" => 0,
                "maxlength" => 0,
                "required" => false,
                "listing_col" => false
            ], [
                "colname" => "salary_cur",
                "label" => "Current Salary",
                "field_type" => "Decimal",
                "unique" => false,
                "defaultvalue" => "0.0",
                "minlength" => 0,
                "maxlength" => 2,
                "required" => false,
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
        if (Schema::hasTable('employees')) {
            Schema::drop('employees');
        }
    }
}
