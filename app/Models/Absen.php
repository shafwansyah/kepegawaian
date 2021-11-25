<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Absen extends Model
{
    use HasFactory;

    protected $table = "absens";

    protected $fillable = [
        'tanggal',
        'jamMasuk',
        'jamKeluar',
        'masuk',
        'keluar',
        'fotoMasuk',
        'fotoKeluar',
        'pegawaiId',
        'divisiId',
    ];

    /**
     * Get the user that owns the Absen
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pegawai(): BelongsTo
    {
        return $this->belongsTo(User::class, 'pegawaiId', 'id');
    }

    /**
     * Get the divisi that owns the Absen
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function divisi(): BelongsTo
    {
        return $this->belongsTo(Divisi::class, 'divisiId', 'id');
    }
}
