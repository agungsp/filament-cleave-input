<?php

namespace Agungsp\FilamentCleaveInput\Commands;

use Illuminate\Console\Command;

class FilamentCleaveInputCommand extends Command
{
    public $signature = 'filament-cleave-input';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
