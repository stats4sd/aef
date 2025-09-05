<?php

namespace App\Console\Commands;

use App\Models\StudyCase;
use App\Enums\StudyCaseStatus;
use Illuminate\Console\Command;

class FillStudyCaseStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:fill-study-case-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'A one-time command program to fill study case status';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('start');

        $studyCases = StudyCase::all();

        foreach ($studyCases as $studyCase) {
            if ($studyCase->reviewed) {
                $studyCase->status = StudyCaseStatus::Reviewed;
            } else if ($studyCase->ready_for_review) {
                $studyCase->status = StudyCaseStatus::ReadyForReview;
            } else {
                // Question: for existing study cases not yet ready for review, should we consider them as Proposal or Development?
                // Proposal means the study case creator does not ask for reviewer's approval
                // Development means the creator has asked reviewer for approval, and the reviewer has approved this study case

                $studyCase->status = StudyCaseStatus::Proposal;
                // $studyCase->status = StudyCaseStatus::Development;
            }
            
            $studyCase->save();
        }

        $this->info('end');
    }
}
