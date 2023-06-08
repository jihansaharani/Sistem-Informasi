<?php

namespace App\Models;

use App\Models\User;
use App\Models\kategori;
use App\Models\fotoproduks;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class produk extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'namapromo',
        'deskripsipromo',
        'kategoripromo',
        'namamerek',
        'limit',
        'masapromo',
        'used_by_guest',
        'sampul',
        'user_id',
        'status',
        'pesan',
        'views',
        'bookmark'
    ];

    /**
     * Get the user that owns the produk
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function kategoris()
    {
        return $this->belongsTo(kategori::class, 'kategoripromo', 'id');
    }

    public function fotoproduks()
    {
        return $this->belongsTo(fotoproduks::class);
    }

    public function firstitem()
    {
        return $this->first();
    }

    // set locale ke bahasa Indonesia
        // public function getMasapromoAttribute($value)
        // {
        //     return Carbon::parse($value)->translatedFormat('d F Y');
        // }

//     public function setPublishedAtAttribute($date) {
//     $this->attributes['masapromo'] = Carbon::createFromFormat('d F Y', $date, 'Asia/Jakarta')->format('Y-m-d');
// }
}
