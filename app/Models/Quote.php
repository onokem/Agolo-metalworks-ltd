<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $service
 * @property string|null $timeline
 * @property string|null $budget
 * @property string $location
 * @property string|null $access
 * @property string $details
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string|null $phone
 * @property bool $subscribe
 * @property string $status
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, QuoteMessage> $messages
 */
class Quote extends Model
{
    use HasFactory;

    /** @var array<int,string> */
    protected $fillable = [
        'service','timeline','budget','location','access','details','first_name','last_name','email','phone','subscribe','status'
    ];

    /** @var array<string,string> */
    protected $casts = [
        'subscribe' => 'boolean',
    ];

    public function messages(): HasMany
    {
        return $this->hasMany(QuoteMessage::class);
    }
}
 
