<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BranchOutlet extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function outlet(){
        return $this->belongsTo(Outlet::class, 'outlet_id');
    }
}