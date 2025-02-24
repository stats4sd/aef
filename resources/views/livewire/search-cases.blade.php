<div x-data="{ openDropdown: null }">
    <!-- Heading -->
    <div class="bg-white pb-8 px-12 md:px-20">
        <div class="text-2xl font-bold text-dark-teal pt-12">{{ t("BROWSE OR SEARCH CASES") }}</div>

        <!-- Search -->
        <div class="mt-6 flex items-center space-x-2 relative w-full">
            <input
                wire:model="query"
                wire:keydown.enter="searchCases"
                type="text"
                class="w-full border-2 border-dark-teal rounded-full px-4 md:px-8 py-3 md:py-4 focus:outline-none placeholder:text-sm md:placeholder:text-base placeholder-gray transition duration-300 focus:border-mint focus:ring-1 focus:ring-mint pr-12 md:pr-16"
                placeholder="SEARCH CASE TITLES, KEY WORDS, DESCRIPTION TEXT"
            >

            <!-- Clear Button -->
            @if($query)
            <svg xmlns="http://www.w3.org/2000/svg" wire:click="clearSearch" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="gray"
                class="absolute right-12 md:right-16 top-1/2 transform -translate-y-1/2 w-5 h-5 cursor-pointer hover:stroke-gray-700 transition-colors duration-200">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
            @endif

            <!-- Search Button -->
            <svg xmlns="http://www.w3.org/2000/svg" wire:click="searchCases" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                class="w-8 h-8 text-dark-teal cursor-pointer ml-4 transition-colors duration-200 hover:text-mint">
                <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
            </svg>
        </div>

        <!-- Filter Section -->
        <div class="mt-6 flex flex-col md:flex-row items-start md:items-center space-y-4 md:space-y-0 md:space-x-4">
            <!-- Filter Icon (Hidden on small screens) -->
            <div class="hidden md:block flex-shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6 text-dark-teal">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 4a1 1 0 0 1 1-1h16a1 1 0 0 1 1 1v2a1 1 0 0 1-.293.707l-7.414 7.414A2 2 0 0 0 12 16.828V20a1 1 0 0 1-1.447.894l-2-1A1 1 0 0 1 8 19v-2.172a2 2 0 0 0-.586-1.414L3.293 6.707A1 1 0 0 1 3 6V4z" />
                </svg>
            </div>

            <!-- Filters -->
            <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-4 gap-4">

                <!-- Language Filter -->
                <div class="relative" @click.outside="openDropdown = openDropdown === 'language' ? null : openDropdown">
                    <button @click="openDropdown = openDropdown === 'language' ? null : 'language'" class="inline-flex justify-center w-full md:w-auto rounded-full border border-dark-teal px-4 py-2 bg-dark-teal text-white font-medium">
                        {{ t("LANGUAGE") }}
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 ml-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <!-- Filter Dropdown Menu -->
                    <div x-show="openDropdown === 'language'" class="origin-top-left md:origin-top-right absolute left-0 md:right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-50">
                        <div class="py-1">
                            <a href="#" class="block px-4 py-2 text-sm text-dark-teal hover:bg-light-green hover:text-black">
                                {{ t("All Languages") }}
                            </a>
                            @foreach($languages as $language)
                                <a href="#" class="block px-4 py-2 text-sm text-dark-teal hover:bg-light-green hover:text-black"
                                wire:click.prevent="toggleFilter('language', {{ $language->id }})">
                                {{ $language->name }} 
                                @if(collect($selectedLanguages)->contains($language->id))
                                    <span class="ml-2 text-mint">&#x2714;</span> <!-- Adds a checkmark if selected -->
                                @endif
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Tag Filter -->
                <div class="relative" @click.outside="openDropdown = openDropdown === 'tag' ? null : openDropdown">
                    <button @click="openDropdown = openDropdown === 'tag' ? null : 'tag'" class="inline-flex justify-center w-full rounded-full border border-dark-teal px-4 py-2 bg-dark-teal text-white font-medium cursor-pointer">
                        {{ t("TAG") }}
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 ml-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <!-- Tag Dropdown Menu -->
                    <div x-show="openDropdown === 'tag'" class="origin-top-left md:origin-top-right absolute left-0 md:right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-50">
                        <div class="py-1">
                            <a href="#" class="block px-4 py-2 text-sm text-dark-teal hover:bg-light-green hover:text-black"
                            wire:click.prevent="toggleFilter('tag', null)">
                                {{ t("All Tags") }}
                            </a>
                            @foreach($tags as $tag)
                                <a href="#" class="block px-4 py-2 text-sm text-dark-teal hover:bg-light-green hover:text-black"
                                wire:click.prevent="toggleFilter('tag', {{ $tag->id }})">
                                {{ $tag->name }} 
                                @if(collect($selectedTags)->contains($tag->id))
                                    <span class="ml-2 text-mint">&#x2714;</span> <!-- Adds a checkmark if selected -->
                                @endif
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Indicator Filter -->
                <div class="relative" @click.outside="openDropdown = openDropdown === 'indicator' ? null : openDropdown">
                    <button @click="openDropdown = openDropdown === 'indicator' ? null : 'indicator'" class="inline-flex justify-center w-full md:w-auto rounded-full border border-dark-teal px-4 py-2 bg-dark-teal text-white font-medium cursor-pointer">
                        {{ t("INDICATOR") }}
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 ml-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <!-- Indicator Dropdown Menu -->
                    <div x-show="openDropdown === 'indicator'" class="origin-top-left md:origin-top-right absolute left-0 md:right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-50">
                        <div class="py-1">
                            <a href="#" class="block px-4 py-2 text-sm text-dark-teal hover:bg-light-green hover:text-black"
                            wire:click.prevent="toggleFilter('indicator', null)">
                                {{ t("All Indicators") }}
                            </a>
                            @foreach($indicators as $indicator)
                                <a href="#" class="block px-4 py-2 text-sm text-dark-teal hover:bg-light-green hover:text-black"
                                wire:click.prevent="toggleFilter('indicator', {{ $indicator->id }})">
                                {{ $indicator->name }} 
                                @if(collect($selectedIndicators)->contains($indicator->id))
                                    <span class="ml-2 text-mint">&#x2714;</span> <!-- Adds a checkmark if selected -->
                                @endif
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Country Filter -->
                <div class="relative" @click.outside="openDropdown = openDropdown === 'country' ? null : openDropdown">
                    <button @click="openDropdown = openDropdown === 'country' ? null : 'country'" class="inline-flex justify-center w-full md:w-auto rounded-full border border-dark-teal px-4 py-2 bg-dark-teal text-white font-medium cursor-pointer">
                        {{ t("COUNTRY") }}
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 ml-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <!-- Country Dropdown Menu -->
                    <div x-show="openDropdown === 'country'" class="origin-top-left md:origin-top-right absolute left-0 md:right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-50">
                        <div class="py-1">
                            <a href="#" class="block px-4 py-2 text-sm text-dark-teal hover:bg-light-green hover:text-black"
                            wire:click.prevent="toggleFilter('country', null)">
                                {{ t("All Countries") }}
                            </a>
                            @foreach($countries as $country)
                                <a href="#" class="block px-4 py-2 text-sm text-dark-teal hover:bg-light-green hover:text-black"
                                wire:click.prevent="toggleFilter('country', {{ $country->id }})">
                                {{ $country->name }} 
                                @if(collect($selectedCountries)->contains($country->id))
                                    <span class="ml-2 text-mint">&#x2714;</span> <!-- Adds a checkmark if selected -->
                                @endif
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Divider -->
        <hr class="border-t-2 border-dark-teal mt-8">
    </div>

    <!-- Search/Filter Info -->
    <div class="bg-light-yellow py-6 px-12 md:px-20">

        <!-- Selected Filters -->
        <div class="flex flex-wrap items-center gap-4">
            
            <!-- Selected Languages -->
            @foreach($selectedLanguages as $languageId)
                @if($languageId && $languages->find($languageId))
                    <div class="flex items-center bg-pale-green text-dark-teal rounded-full px-3 py-2">
                        <button wire:click.prevent="toggleFilter('language', {{ $languageId }})" class="mr-2 text-dark-teal">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                        <span class="font-semibold">{{ mb_strtoupper($languages->find($languageId)->name, 'UTF-8') }}</span>
                    </div>
                @endif
            @endforeach

            <!-- Selected Tags -->
            @foreach($selectedTags as $tagId)
                @if($tagId && $tags->find($tagId))
                    <div class="flex items-center bg-pale-green text-dark-teal rounded-full px-3 py-2">
                        <button wire:click.prevent="toggleFilter('tag', {{ $tagId }})" class="mr-2 text-dark-teal">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                        <span class="font-semibold">{{ mb_strtoupper($tags->find($tagId)->name, 'UTF-8') }}</span>
                    </div>
                @endif
            @endforeach

            <!-- Selected Indicators -->
            @foreach($selectedIndicators as $indicatorId)
                @if($indicatorId && $indicators->find($indicatorId))
                    <div class="flex items-center bg-pale-green text-dark-teal rounded-full px-3 py-2">
                        <button wire:click.prevent="toggleFilter('indicator', {{ $indicatorId }})" class="mr-2 text-dark-teal">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                        <span class="font-semibold">{{ mb_strtoupper($indicators->find($indicatorId)->name, 'UTF-8') }}</span>
                    </div>
                @endif
            @endforeach

            <!-- Selected Countries -->
            @foreach($selectedCountries as $countryId)
                @if($countryId && $countries->find($countryId))
                    <div class="flex items-center bg-pale-green text-dark-teal rounded-full px-3 py-2">
                        <button wire:click.prevent="toggleFilter('country', {{ $countryId }})" class="mr-2 text-dark-teal">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                        <span class="font-semibold">{{ mb_strtoupper($countries->find($countryId)->name, 'UTF-8') }}</span>
                    </div>
                @endif
            @endforeach

            <!-- Clear All Filters Button -->
            @if($selectedLanguages || $selectedTags || $selectedCountries)
                <button wire:click="clearAllFilters" class="border-2 border-dark-teal text-dark-teal px-4 py-2 rounded-full hover:bg-light-green transition-colors duration-200">
                    {{ t("CLEAR FILTERS") }}
                </button>
            @endif
        </div>

        <!-- Results Count -->
        <div class="w-full pt-6">
            @if($caseCount > 0)
                <p class="text-dark-teal text-xl font-semibold">
                    {{ t("SHOWING ") }}{{ $caseCount }} {{ t("CASE") }}{{ $caseCount > 1 ? 'S' : '' }}
                </p>
            @endif
        </div>

    </div>

    <!-- Cases -->
    <div class="bg-light-yellow pb-20 px-12 md:px-20">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 py-4">
            @forelse($cases as $case)
                @php
                    $cover_photo = $case->getMedia('cover_photo')->first();
                    $cover_photo_url = $cover_photo ? $cover_photo->getUrl() : null;
                @endphp
                <a href="{{ url('/cases/'.$case->id) }}" class="shadow-xl bg-white overflow-hidden flex flex-col hover-effect">
                    <!-- Image -->
                    <div class="h-48 bg-cover bg-center" style="background-image: url('{{ $cover_photo_url }}');"></div>

                    <!-- Content -->
                    <div class="bg-white p-6 flex flex-col justify-between ">
                        <div class=" flex flex-col justify-start cases_heading">
                            <p class="text-ochre font-semibold">{{ t("CASE") }}</p>
                            <h2 class="text-teal font-bold text-lg uppercase mb-1">{{ $case->title }}</h2>
                            <p class="text-black">{{ $case->team->name }}, {{ $case->year_of_development }}</p>
                        </div>
                        <!-- Divider -->
                        <div class="h-1 w-full bg-teal mt-3 mb-6"></div>

                        <!-- Languages -->
                        <div class="flex items-start mb-4 ">
                            <div class="flex-shrink-0 mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="var(--mint)" class="w-8 h-8 text-gray-600">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 20.25c4.97 0 9-3.694 9-8.25s-4.03-8.25-9-8.25S3 7.444 3 12c0 2.104.859 4.023 2.273 5.48.432.447.74 1.04.586 1.641a4.483 4.483 0 0 1-.923 1.785A5.969 5.969 0 0 0 6 21c1.282 0 2.47-.402 3.445-1.087.81.22 1.668.337 2.555.337Z" />
                                </svg>
                            </div>
                            <div class="flex flex-col">
                                <div class="font-semibold text-left">{{ t("Languages") }}</div>
                                <div class="text-black text-left">{{ $case->languages->pluck('name')->implode(', ') }}</div>
                            </div>
                        </div>

                        <!-- Countries Covered -->
                        <div class="flex items-start">
                            <div class="flex-shrink-0 mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="var(--mint)" class="w-8 h-8 text-gray-600">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m20.893 13.393-1.135-1.135a2.252 2.252 0 0 1-.421-.585l-1.08-2.16a.414.414 0 0 0-.663-.107.827.827 0 0 1-.812.21l-1.273-.363a.89.89 0 0 0-.738 1.595l.587.39c.59.395.674 1.23.172 1.732l-.2.2c-.212.212-.33.498-.33.796v.41c0 .409-.11.809-.32 1.158l-1.315 2.191a2.11 2.11 0 0 1-1.81 1.025 1.055 1.055 0 0 1-1.055-1.055v-1.172c0-.92-.56-1.747-1.414-2.089l-.655-.261a2.25 2.25 0 0 1-1.383-2.46l.007-.042a2.25 2.25 0 0 1 .29-.787l.09-.15a2.25 2.25 0 0 1 2.37-1.048l1.178.236a1.125 1.125 0 0 0 1.302-.795l.208-.73a1.125 1.125 0 0 0-.578-1.315l-.665-.332-.091.091a2.25 2.25 0 0 1-1.591.659h-.18c-.249 0-.487.1-.662.274a.931.931 0 0 1-1.458-1.137l1.411-2.353a2.25 2.25 0 0 0 .286-.76m11.928 9.869A9 9 0 0 0 8.965 3.525m11.928 9.868A9 9 0 1 1 8.965 3.525" />
                                </svg>
                            </div>
                            <div class="flex flex-col">
                                <div class="font-semibold text-left">{{ t("Countries covered") }}</div>
                                <div class="text-black text-left">{{ $case->countries->pluck('name')->implode(', ') }}</div>
                            </div>
                        </div>
                    </div>
                </a>
            @empty
                <div class="py-2 text-dark-teal font-semibold">{{ t("No cases found matching your search criteria.") }}</div>
            @endforelse
        </div>
    </div>
</div>

<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script> 