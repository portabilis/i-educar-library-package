<?php

namespace iEducar\Packages\Library\Models;

use App\Models\LegacyUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LegacyUserLibrary extends Model
{
    protected $table = 'pmieducar.biblioteca_usuario';

    public $timestamps = false;

    protected $fillable = [
        'ref_cod_biblioteca',
        'ref_cod_usuario',
    ];

    /**
     * @return BelongsTo<LegacyUser, $this>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(LegacyUser::class, 'ref_cod_usuario');
    }
}
