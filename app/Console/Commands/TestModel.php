<?php

namespace App\Console\Commands;

use App\Models\StudyCase;
use App\Models\Organisation;
use Illuminate\Console\Command;

class TestModel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:test-model';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'A testing command to verify relationships of a StudyCase model';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('start');

        $studyCase = StudyCase::find(2);
        $this->comment('Study case ID: ' . $studyCase->id);
        $this->comment('Study case leading organisation: ' . $studyCase->leadingOrganisation->name);

        $organisation = Organisation::find(1);
        $this->comment('==========');
        $this->comment('Organisation id: ' . $organisation->id);

        $leadingStudyCases = $organisation->leadingStudyCases;

        foreach ($leadingStudyCases as $leadingStudyCase) {
            $this->comment('Organisation leading study cases ID: ' . $leadingStudyCase->id);
        }

        $this->info('end');
    }
}
