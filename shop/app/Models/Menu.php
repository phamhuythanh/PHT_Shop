<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Menu extends Model
{
    use HasRoles;

    protected $fillable = [
        'name',
        'parent_id',
        'description',
        'content',
        'active'
        ];
    /**
     * @var mixed
     */

}
