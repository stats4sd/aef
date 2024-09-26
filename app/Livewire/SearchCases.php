<?php

namespace App\Livewire;

use App\Models\Tag;
use App\Models\Country;
use Livewire\Component;
use App\Models\Language;
use App\Models\StudyCase;
use Livewire\WithPagination;

class SearchCases extends Component
{
    public $query = '';
    public $cases = [];
    public $caseCount = 0;

    // Filters
    public $languages = [];
    public $tags = [];
    public $countries = [];

    // Selected filters
    public $selectedLanguages = [];
    public $selectedTags = [];
    public $selectedCountries = [];

    public function mount()
    {
        // Retrieve all cases and the related languages, tags, and countries
        $this->cases = StudyCase::where('reviewed', 1)->get();
        $this->caseCount = $this->cases->count();

        // Retrieve languages, tags, and countries that have related reviewed cases
        $this->languages = Language::whereHas('studyCases', function ($query) {
            $query->where('reviewed', 1);
        })->orderBy('name')->get();

        $this->tags = Tag::whereHas('studyCases', function ($query) {
            $query->where('reviewed', 1);
        })->orderBy('name')->get();

        $this->countries = Country::whereHas('studyCases', function ($query) {
            $query->where('reviewed', 1);
        })->orderBy('name')->get();
    }

    public function searchCases()
    {
        // Setup the query and only retrieve reviewed cases
        $query = StudyCase::query()->where('reviewed', 1);

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
        $this->reset('query');
        $this->searchCases(); // update results
    }

    public function toggleItem(&$selectedArray, $itemId)
    {
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
        switch ($filterType) {
            case 'language':
                $this->toggleItem($this->selectedLanguages, $id);
                break;
            case 'tag':
                $this->toggleItem($this->selectedTags, $id);
                break;
            case 'country':
                $this->toggleItem($this->selectedCountries, $id);
                break;
        }
        $this->searchCases(); // update results
    }
    
    public function clearAllFilters()
    {
        $this->reset(['selectedLanguages', 'selectedTags', 'selectedCountries']);
        $this->searchCases(); // update results
    }

    public function render()
    {
        return view('livewire.search-cases', [
            'languages' => $this->languages,
            'tags' => $this->tags,
            'countries' => $this->countries,
        ]);
    }
}