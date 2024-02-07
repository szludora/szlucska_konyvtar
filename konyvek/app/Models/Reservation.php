<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_id',
        'user_id',
        'start',
        'message'
    ];

    // protected $hidden = [
    //     'created_at',
    //     'updated_at'
    // ];
    
    protected function setKeysForSaveQuery($query)
    {
        $query
            // az a lényeg, hogyan hívják őt a táblában --> user_id
            ->where('book_id', '=', $this->getAttribute('book_id'))
            ->where('user_id', '=', $this->getAttribute('user_id'))
            ->where('start', '=', $this->getAttribute('start'));
        return $query;
    }
}
