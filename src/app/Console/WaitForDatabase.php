<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Throwable;

class WaitForDatabase extends Command
{
    protected $signature = 'db:wait';
    protected $description = 'Wait until the database connection is available';

    public function handle()
    {
        $this->info('Checking database connection...');

        $retries = 20;
        while ($retries > 0) {
            try {
                DB::connection()->getPdo();
                $this->info('Database is up!');
                return 0;
            } catch (Throwable $e) {
                $this->warn('Waiting for database...');
                sleep(2);
                $retries--;
            }
        }

        $this->error('Could not connect to the database.');
        return 1;
    }
}
