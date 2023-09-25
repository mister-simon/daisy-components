<?php

namespace MisterSimon\DaisyComponents\Commands;

use Illuminate\Console\Command;

class DaisyComponentsCommand extends Command
{
    public $signature = 'daisy-components';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
