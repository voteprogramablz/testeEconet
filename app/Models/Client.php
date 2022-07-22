<?php

namespace App\Models;

use App\Http\Requests\ClientStoreRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'cpf',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    protected $appends = ["cpf_formated"];

    public function getCpfFormatedAttribute()
    {
        $cpfArray = substr_replace($this->cpf, '.', 3, 0);
        $cpfArray = substr_replace($cpfArray, '.', 7, 0);
        $cpfArray = substr_replace($cpfArray, '-', 11, 0);
        return  $cpfArray;
    }

    public static function insert($attributes)
    {
        $attributes['cpf'] = preg_replace("/\D/", '', $attributes['cpf']);
        Self::create($attributes);
    }
}
