<div class="bg-white pb-10 px-20">
    <!-- Heading -->
    <div class="text-2xl font-bold text-dark-teal pt-20">BROWSE OR SEARCH CASES</div>
    
    <!-- Search Bar -->
    <div class="mt-6 flex items-center space-x-4">
        <input 
            type="text" 
            class="w-full border-2 border-dark-teal rounded-full px-8 py-4 focus:outline-none placeholder-dark-teal" 
            placeholder="SEARCH CASE TITLES, KEY WORDS, DESCRIPTION TEXT"
        >
        <button class="p-3">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-10 w-10 text-dark-teal">
                <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
            </svg>
        </button>
    </div>
</div>


<!-- Cases -->
<div class="bg-light-yellow py-20 px-20">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 py-4">
        @foreach($cases as $case)
            @php
                $cover_photo = $case->getMedia('cover_photo')->first();
                $cover_photo_url = $cover_photo ? $cover_photo->getUrl() : null;
            @endphp
            <a href="{{ url('/cases/'.$case->id) }}" class="shadow-xl overflow-hidden flex flex-col hover-effect">
                <!-- Image -->
                <div class="h-48 bg-cover bg-center" style="background-image: url('{{ $cover_photo_url }}');"></div>

                <!-- Content -->
                <div class="bg-white p-6 flex-grow flex flex-col justify-between">
                    <p class="text-ochre font-semibold mb-2">CASE</p>
                    <h2 class="text-teal font-bold text-xl uppercase mb-2">{{ $case->title }}</h2>
                    <p class="text-black">{{ $case->team->name }}, {{ $case->year_of_development }}</p>

                    <!-- Divider -->
                    <div class="h-1 w-full bg-teal my-4"></div>

                    <!-- First Row Metadata-->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-8">
                        <!-- Languages -->
                        <div class="flex items-start">
                            <div class="flex-shrink-0 mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="var(--mint)" class="w-8 h-8 text-gray-600">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 20.25c4.97 0 9-3.694 9-8.25s-4.03-8.25-9-8.25S3 7.444 3 12c0 2.104.859 4.023 2.273 5.48.432.447.74 1.04.586 1.641a4.483 4.483 0 0 1-.923 1.785A5.969 5.969 0 0 0 6 21c1.282 0 2.47-.402 3.445-1.087.81.22 1.668.337 2.555.337Z" />
                                </svg>
                            </div>
                            <div class="flex flex-col">
                                <div class="font-semibold text-left">Languages</div>
                                <div class="text-black text-left">{{ $case->languages->pluck('name')->implode(', ') }}</div>
                            </div>
                        </div>

                        <!-- Tags -->
                        <div class="flex items-start">
                            <div class="flex-shrink-0 mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="var(--mint)" class="w-8 h-8 text-gray-600">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6Z" />
                                </svg>
                            </div>
                            <div class="flex flex-col">
                                <div class="font-semibold text-left">Tags</div>
                                <div class="text-black text-left">{{ $case->tags->pluck('name')->implode(', ') }}</div>
                            </div>
                        </div>
                    </div>

                    <!-- Second Row Metadata-->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Countries Covered -->
                        <div class="flex items-start">
                            <div class="flex-shrink-0 mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="var(--mint)" class="w-8 h-8 text-gray-600">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m20.893 13.393-1.135-1.135a2.252 2.252 0 0 1-.421-.585l-1.08-2.16a.414.414 0 0 0-.663-.107.827.827 0 0 1-.812.21l-1.273-.363a.89.89 0 0 0-.738 1.595l.587.39c.59.395.674 1.23.172 1.732l-.2.2c-.212.212-.33.498-.33.796v.41c0 .409-.11.809-.32 1.158l-1.315 2.191a2.11 2.11 0 0 1-1.81 1.025 1.055 1.055 0 0 1-1.055-1.055v-1.172c0-.92-.56-1.747-1.414-2.089l-.655-.261a2.25 2.25 0 0 1-1.383-2.46l.007-.042a2.25 2.25 0 0 1 .29-.787l.09-.15a2.25 2.25 0 0 1 2.37-1.048l1.178.236a1.125 1.125 0 0 0 1.302-.795l.208-.73a1.125 1.125 0 0 0-.578-1.315l-.665-.332-.091.091a2.25 2.25 0 0 1-1.591.659h-.18c-.249 0-.487.1-.662.274a.931.931 0 0 1-1.458-1.137l1.411-2.353a2.25 2.25 0 0 0 .286-.76m11.928 9.869A9 9 0 0 0 8.965 3.525m11.928 9.868A9 9 0 1 1 8.965 3.525" />
                                </svg>
                            </div>
                            <div class="flex flex-col">
                                <div class="font-semibold text-left">Countries covered</div>
                                <div class="text-black text-left">{{ $case->countries->pluck('name')->implode(', ') }}</div>
                            </div>
                        </div>

                        <!-- Geographic Area -->
                        <div class="flex items-start">
                            <div class="flex-shrink-0 mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="var(--mint)" class="w-8 h-8 text-gray-600">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                </svg>
                            </div>
                            <div class="flex flex-col">
                                <div class="font-semibold text-left">Geographic area</div>
                                <div class="text-black text-left">{{ $case->geographic_area }}</div>
                            </div>
                        </div>
                    </div>

                </div>

            </a>
        @endforeach
    </div>
</div>

