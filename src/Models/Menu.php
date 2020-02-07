<?php

namespace Kipl\Moduleadmin\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Kipl\Moduleadmin\Helpers\CAHelper;

class Menu extends Model
{
    protected $table = 'ca_menus';

    protected $guarded = [

    ];
}
