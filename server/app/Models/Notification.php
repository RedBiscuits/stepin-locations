<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = ['client_record_id', 'body'];

    protected $dates = ['created_at'];

    public function clientRecord()
    {
        return $this->belongsTo(ClientRecord::class);
    }
}
