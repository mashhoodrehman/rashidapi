<?php

namespace App\Models;

use App\Models\Auth\User\Traits\Ables\Protectable;
use App\Models\Auth\User\Traits\Attributes\UserAttributes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Auth\User\Traits\Ables\Rolable;
use App\Models\Auth\User\Traits\Scopes\UserScopes;
use App\Models\Auth\User\Traits\Relations\UserRelations;
use Kyslik\ColumnSortable\Sortable;
use Laravel\Passport\HasApiTokens;

class Appointment extends Model
{
    use Sortable;

    public $sortable = ['scheduled_on', 'status'];

    protected $table = 'appointments';

    protected $fillable = ['user_id', 'status', 'scheduled_on', 'service_id'];

    public function user()
    {
        return $this->belongsTo('App\Models\Auth\User\User');
    }

    public function service()
    {
        return $this->belongsTo('App\Models\Service');
    }
}
