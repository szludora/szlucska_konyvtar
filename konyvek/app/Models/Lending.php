<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lending extends Model
{
    use HasFactory;

    //összetett kulcs megadása:
    protected function setKeysForSaveQuery($query)
    {
        $query
            ->where('user_id', '=', $this->getAttribute('user_id'))
            ->where('copy_id', '=', $this->getAttribute('copy_id'))
            ->where('start', '=', $this->getAttribute('start'));
        return $query;
    }

        protected $fillable = [
        'user_id',
        'copy_id',
        'start',
        'end',
        'extension',
        'notice'
    ];

    public function copies()
    {    return $this->belongsTo(Copy::class, 'copy_id', 'copy_id');   }

    public function users()
    {    return $this->belongsTo(User::class, 'id', 'user_id');   }
}
