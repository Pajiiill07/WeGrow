<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function meja(){
        return $this->belongsTo(Desk::class, 'meja_id');
    }

    public function branchOutlet(){
        return $this->belongsTo(BranchOutlet::class, 'branch_id');
    }

    public function customer(){
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
