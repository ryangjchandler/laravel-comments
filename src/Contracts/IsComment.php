<?php

namespace RyanChandler\Comments\Contracts;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * @mixin \Illuminate\Database\Eloquent\Model
 */
interface IsComment
{
    public function commentable(): MorphTo;

    public function parent(): BelongsTo;

    public function children(): HasMany;

    public function user(): BelongsTo;
}
