<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function branchOutlet(){
        return $this->belongsTo(BranchOutlet::class, 'branch_id');
    }
}
