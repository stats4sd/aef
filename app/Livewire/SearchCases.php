<?php

namespace App\Livewire;

use App\Models\Tag;
use App\Models\Country;
use Livewire\Component;
use App\Models\Language;
use App\Models\Indicator;
use App\Models\StudyCase;
use Livewire\WithPagination;
use App\Enums\StudyCaseStatus;

class SearchCases extends Component
{
    public $query = '';
    public $cases = [];
    public $caseCount = 0;

    // Filters
    public $languages = [];
    public $tags = [];
    public $indicators = [];
    public $countries = [];

    // Selected filters
    public $selectedLanguages = [];
    public $selectedTags = [];
    public $selectedIndicators = [];
    public $selectedCountries = [];

    public function mount()
    {
        ray('SearchCases.mount()...');

        // Retrieve all cases and the related languages, tags, and countries
        $this->cases = StudyCase::where('status', StudyCaseStatus::Reviewed)
            ->orderBy('order', 'asc')
            ->get();
        $this->caseCount = $this->cases->count();

        // Retrieve languages, tags, and countries that have related reviewed cases
        $this->languages = Language::whereHas('studyCases', function ($query) {
            $query->where('status', StudyCaseStatus::Reviewed);
        })->orderBy('name')->get();

        $this->tags = Tag::whereHas('studyCases', function ($query) {
            $query->where('status', StudyCaseStatus::Reviewed);
        })->orderBy('name')->get();

        $this->indicators = Indicator::whereHas('evidence.claim.studyCase', function ($query) {
            $query->where('status', StudyCaseStatus::Reviewed);
        })->orderBy('name')->get();

        $this->countries = Country::whereHas('studyCases', function ($query) {
            $query->where('status', StudyCaseStatus::Reviewed);
        })->orderBy('name')->get();
    }

    public function searchCases()
    {
        ray('SearchCases.searchCases()...');

        // Setup the query and only retrieve reviewed cases
        $query = StudyCase::query()->where('status', StudyCaseStatus::Reviewed);

        // Handle the search term (if present)
        if ($this->query) {
            // Perform a Scout search if there is a search term
            $searchResults = StudyCase::search($this->query)->get();

            // Narrow down the query to those IDs if search results are found
            if ($searchResults->isNotEmpty()) {
                $ids = $searchResults->pluck('id');
                $query->whereIn('id', $ids);
            }
        }

        // Apply filters (regardless of the presence of a search term)
        // Languages
        if (!empty($this->selectedLanguages)) {
            $query->whereHas('languages', function ($q) {
                $q->whereIn('languages.id', $this->selectedLanguages);
            });
        }

        // Tags
        if (!empty($this->selectedTags)) {
            $query->whereHas('tags', function ($q) {
                $q->whereIn('tags.id', $this->selectedTags);
            });
        }

        // Indicators
        if (!empty($this->selectedIndicators)) {        
            $query->whereHas('claims.evidences.indicators', function ($q) {
                $q->whereIn('indicators.id', $this->selectedIndicators);
            });
        }
                
        // Countries
        if (!empty($this->selectedCountries)) {
            $query->whereHas('countries', function ($q) {
                $q->whereIn('countries.id', $this->selectedCountries);
            });
        }

        // Retrieve the final results
        $this->cases = $query->get();
        $this->caseCount = $this->cases->count();

    }

    public function clearSearch()
    {
        ray('SearchCases.clearSearch()...');

        $this->reset('query');
        $this->searchCases(); // update results
    }

    public function toggleItem(&$selectedArray, $itemId)
    {
        ray('SearchCases.toggleItem()...');

        if (is_null($itemId)) {
            // Clear the filter
            $selectedArray = [];
        } else {
            // Toggle the item
            if (($key = array_search($itemId, $selectedArray)) !== false) {
                // Remove the item if it exists and re-index the array
                unset($selectedArray[$key]);
                $selectedArray = array_values($selectedArray);
            } else {
                // Add the item if it doesn't exist
                $selectedArray[] = $itemId;
            }
        }
    }

    public function toggleFilter($filterType, $id)
    {
        ray('SearchCases.toggleFilter()...');

        switch ($filterType) {
            case 'language':
                $this->toggleItem($this->selectedLanguages, $id);
                break;
            case 'tag':
                $this->toggleItem($this->selectedTags, $id);
                break;
            case 'indicator':
                $this->toggleItem($this->selectedIndicators, $id);
                break;
            case 'country':
                $this->toggleItem($this->selectedCountries, $id);
                break;
        }
        $this->searchCases(); // update results
    }
    
    public function clearAllFilters()
    {
        ray('SearchCases.clearAllFilters()...');

        $this->reset(['selectedLanguages', 'selectedTags', 'selectedIndicators', 'selectedCountries']);
        $this->searchCases(); // update results
    }

    public function render()
    {
        ray('SearchCases.render()...');

        return view('livewire.search-cases', [
            'languages' => $this->languages,
            'tags' => $this->tags,
            'indicators' => $this->indicators,
            'countries' => $this->countries,
        ]);
    }
}