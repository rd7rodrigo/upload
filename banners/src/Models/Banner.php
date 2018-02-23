<?php

namespace Bredi\Banner\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Banner extends Model implements AuditableContract
{
    use SoftDeletes, Auditable;

    protected $fillable = ['nome', 'imagem', 'descricao', 'link', 'ativo', 'ordem'];

    protected $auditExclude = ['id', 'deleted_at'];

}
