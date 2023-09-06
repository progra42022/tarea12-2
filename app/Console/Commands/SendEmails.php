<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-emails {--opcion=test}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        
        $this->line('Display this on the screen');
        $this->error('Something went wrong!');
        $this->info('The command was successful!');
        $this->table(
            ['Name', 'Email'],
            [['Luis', 'luis@dominio.com'],['Juan', 'juan@dominio.com']]
        );
    }
}
