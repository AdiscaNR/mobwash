<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'client_id',
        'date',
        'check_in',
        'check_out',
        'created_user',
    ];

    public function client() {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function crews() {
        return $this->belongsToMany(Crew::class, 'transaction_crews', 'tx_id', 'crew_id');
    }
}
