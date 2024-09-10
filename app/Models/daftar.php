<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Nicolaslopezj\Searchable\SearchableTrait;

class daftar extends Model
{
    use HasFactory, SearchableTrait;

    protected $guarded = [];

    protected $searchable = [
        'columns' => [
            'pasiens.nama' => 1,
            'pasiens.no_pasien' => 2,
            'polis.nama' => 3,
        ],
        'joins' => [
            'pasiens' => ['pasiens.id', 'daftars.pasien_id'],
            'polis' => ['polis.id', 'daftars.poli_id'],
        ],
    ];

    public function pasien(): BelongsTo
    {
        return $this->belongsTo(Pasien::class)->withDefault();
    }
    public function poli(): BelongsTo
    {
        return $this->belongsTo(Poli::class)->withDefault(); 
    }


}