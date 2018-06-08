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

class Setting extends Model
{
    protected $table = 'settings';

    protected $fillable = ['app_title', 'clinic_name', 'doctor_name', 'mobile_number', 'email', 'address',
        'latitude', 'longitude', 'about_1', 'about_2', 'about_count_1', 'about_count_2', 'about_count_3',
        'service_title', 'service_body'];
}
