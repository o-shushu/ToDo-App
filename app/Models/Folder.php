<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    public function tasks()
    {
        //省略しない$this->hasMany('App\Models\Task', 'folder_id', 'id');
        return $this->hasMany('App\Models\Task');
    }
}
