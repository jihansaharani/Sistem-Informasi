<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class komentar extends Model
{
    use HasFactory;

    protected $table="komentar";
    protected $guarded = ['id'];
    protected $fillable = [
        'name',
        'konten',
        'user_id',
        'forum_id',
        'parent',
    ];

    public function forum(){
        return $this->belongsTo(Forum::class);
    }

    public function childs()
    {
        return $this->hasMany(Komentar::class,'parent');
    }
    public function user()
    {
    return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
