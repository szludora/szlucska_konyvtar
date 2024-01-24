<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Copy extends Model
{
    use HasFactory;
    public $primaryKey = 'copy_id';

    protected $fillable = [
        'book_id',
        'hardcovered',
        'publication',
        'status'
    ];
    
    public function books(){
        return $this->belongsTo(Book::class,'book_id', 'book_id');
    }

    public function lendings(){
        return $this->belongsTo(Lending::class,'copy_id', 'copy_id');
    }
}
