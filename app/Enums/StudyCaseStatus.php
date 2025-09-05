<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;
use Filament\Support\Contracts\HasDescription;

enum StudyCaseStatus: string implements HasLabel, HasDescription
{
    case Proposal = 'proposal';
    case Development = 'development';
    case ReadyForReview = 'ready_for_review';
    case Reviewed = 'reviewed';

    public function getLabel(): ?string
    {
        return $this->name;
    }

    public function getDescription(): ?string
    {
        // Proposal       : user created a new study case; user fills in study case details; user will request reviewer to approve when it is ready
        // Development    : reviewer approved study case; user can further develop by filling in more details
        // ReadyForReview : user has filled in all necessary details; user request reviewer to review
        // Reviewed       : reviewer approved study case; study case is published on the website
        
        return match ($this) {
            self::Proposal => 'This has not finished being written yet.',
            self::Development => 'This has enough details. User requested reviewer to approve. This has been approved by reviewer to further develop',
            self::ReadyForReview => 'This is ready for a reviewer to review',
            self::Reviewed => 'This has been approved by a reviewer. This has been published on the website',
        };
    }
}
