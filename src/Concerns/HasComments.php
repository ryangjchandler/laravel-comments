<?php

namespace RyanChandler\Comments\Concerns;

use Illuminate\Database\Eloquent\Relations\MorphMany;

/**
 * @mixin \Illuminate\Database\Eloquent\Model
 */
trait HasComments
{
    public function comments(): MorphMany
    {
        return $this->morphMany(config('comments.model'), 'commentable');
    }
}
