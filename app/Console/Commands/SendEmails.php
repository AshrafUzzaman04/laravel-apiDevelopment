<?php

namespace App\Console\Commands;

use App\Models\Classs;
use Illuminate\Console\Command;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:class {count}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new class';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $count = $this->argument("count");
        for ($i = 0; $i < $count; $i++) {
            Classs::factory()->create();
        }
    }
}
