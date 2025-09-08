<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;
use Filament\Support\Contracts\HasDescription;

enum StudyCaseStatus: string implements HasLabel, HasDescription
{
    case Proposal = 'proposal';
    case Closed = 'closed';
    case Development = 'development';
    case ReadyForReview = 'ready_for_review';
    case Reviewed = 'reviewed';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::Proposal => 'Proposal',
            self::Closed => 'Closed',
            self::Development => 'Development',
            self::ReadyForReview => 'Ready for review',
            self::Reviewed => 'Reviewed',
        };
    }

    public function getDescription(): ?string
    {
        // Proposal       : user created a new study case (assumes user will inform reviewer offline when the study case is ready for review)
        // Closed         : reviewer reviewed and decided NOT to further develop
        // Development    : reviewer reviewed and decided to further develop
        // ReadyForReview : user has filled in all necessary details; user request reviewer to review
        // Reviewed       : reviewer approved study case; study case is published on the website
        
        return match ($this) {
            self::Proposal => 'This has not finished being written yet.',
            self::Closed => 'This has been reviewed by reviewer, and decided NOT to further develop',
            self::Development => 'This has been reviewed by reviewer, and decided to further develop',
            self::ReadyForReview => 'This is ready for a reviewer to review',
            self::Reviewed => 'This has been approved by a reviewer. This has been published on the website',
        };
    }
}
