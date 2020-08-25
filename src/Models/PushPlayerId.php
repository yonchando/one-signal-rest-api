<?php

namespace Chando\OneSignalRestApi\Models;

use Illuminate\Database\Eloquent\Model;

class PushPlayerId extends Model
{
    protected $table = '';
    protected $fillable = [
        'player_id',
    ];

    public function __construct(array $attributes = [])
    {
        $this->table = config('onesignal.table_name');
        parent::__construct($attributes);
    }
}
