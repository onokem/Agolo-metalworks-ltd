<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $quote_id
 * @property string $direction  admin|client
 * @property string $body
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read Quote $quote
 */
class QuoteMessage extends Model
{
    /** @var array<int,string> */
    protected $fillable = ['quote_id','direction','body'];

    public function quote(): BelongsTo
    {
        return $this->belongsTo(Quote::class);
    }
}
