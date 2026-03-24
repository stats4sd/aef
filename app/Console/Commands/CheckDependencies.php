<?php

namespace App\Console\Commands;

use App\Mail\DependenciesEmail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Process;

class CheckDependencies extends Command
{
    protected $signature = 'app:check-dependencies';

    protected $description = 'Check if it is necessary to upgrade dependencies';

    public function handle()
    {
        $this->info('Start');

        $result = Process::timeout(3600)
                    // set working directory for running the executable
                    ->path(base_path())
                    ->run('composer audit');

        ray($result);

        ray('Running command "' . $result->command() . '"');

        if ($result->successful()) {
            ray('There is no package that needs to be upgraded');
        }

        if ($result->failed()) {
            ray('There are packages that need to be upgraded');
        }

        ray('Exit code: ' . $result->exitCode());
        
        ray('Output:');
        ray($result->output());


        // find email recipients
        $toRecipient = config('mail.to.support');

        // send email notification
        Mail::to($toRecipient)->send(new DependenciesEmail($result->output()));


        $this->info('End');
    }
}
