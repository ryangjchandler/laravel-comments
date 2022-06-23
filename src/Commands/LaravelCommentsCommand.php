<?php

namespace RyanChandler\LaravelComments\Commands;

use Illuminate\Console\Command;

class LaravelCommentsCommand extends Command
{
    public $signature = 'laravel-comments';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
