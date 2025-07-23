<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\EncryptHelper;

class Donatur extends Model
{
    protected $fillable = [
        'nama',
        'email',
        'email_enkripsi',
        'no_hp',
        'no_hp_enkripsi',
        'alamat',
    ];

    // Mutator untuk email
    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = $value;
        $this->attributes['email_enkripsi'] = EncryptHelper::encrypt($value);
    }

    // Mutator untuk no_hp
    public function setNoHpAttribute($value)
    {
        $this->attributes['no_hp'] = $value;
        $this->attributes['no_hp_enkripsi'] = EncryptHelper::encrypt($value);
    }
    
    // Accessor contoh kalau mau decrypt versi enkripsi
    public function getEmailEnkripsiDecryptedAttribute()
    {
        return EncryptHelper::decrypt($this->email_enkripsi);
    }

    public function getNoHpEnkripsiDecryptedAttribute()
    {
        return EncryptHelper::decrypt($this->no_hp_enkripsi);
    }
}
