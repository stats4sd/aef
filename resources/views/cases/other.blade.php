<!-- Header Section -->
<div class="bg-dark-teal text-white py-6 px-12 md:px-20">
    <div class="flex flex-col items-start">
        <h1 class="text-2xl font-bold">{{ t("OTHER DETAILS") }}</h1>
    </div>
</div>

<!-- Main Section -->
<div class="bg-white mt-4 shadow-xl px-12 md:px-20">
    <!-- Photos -->
    @if($studycase->photos->isNotEmpty())
        <h1 class="text-xl font-bold text-dark-teal py-8">{{ t("Photos") }}</h1>
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap justify-center gap-8">
            @foreach ($studycase->photos as $photo)
                <div class="relative w-full sm:w-1/2 md:w-1/3 h-64">
                    <!-- Photo -->
                    <img
                        src="{{ $photo->getMedia('catalogue_photos')->first()->getUrl() }}"
                        alt="{{ $photo->description }}"
                        class="w-full h-full object-cover cursor-pointer"
                        onclick="openPhotoModal('{{ $photo->getMedia('catalogue_photos')->first()->getUrl() }}', '{{ $photo->description }}')">
                    <!-- Description -->
                    <div class="absolute bottom-0 w-full h-1/5 bg-dark-teal-70 flex items-center justify-center">
                        <p class="text-white text-center truncate max-w-full" style="max-width: calc(100% - 2rem);">{{ $photo->description }}</p>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    @endif

    <!-- Photo Modal -->
    <div id="photoModal" class="fixed inset-0 hidden bg-black bg-opacity-80 items-center justify-center p-4" onclick="closePhotoModal()">
        <div class="relative w-full sm:max-w-md md:max-w-3xl bg-white rounded-lg shadow-lg p-6 pt-8" onclick="stopPropagation()">
            <!-- Photo -->
            <img id="modalImage" class="max-h-screen max-w-full mx-auto" src="" alt="">
            <!-- Description -->
            <div class="bg-light-green mt-4 rounded-md p-4 text-center">
                <p id="modalDescription" class="text-dark-teal font-semibold"></p>
            </div>
            <!-- Close Button -->
            <button class="absolute top-2 right-2 text-gray-500 text-xl hover:text-gray-700 transition" onclick="closePhotoModal()">&times;</button>
        </div>
    </div>

    <!-- Leading Organisation -->
    <div class="py-8 md:py-16">
        <h1 class="text-xl font-bold text-dark-teal">{{ t("Leading organisation") }}</h1>
        <div class="flex flex-col md:flex-row items-start p-4 mt-4">
            <!-- Logo -->
            @php
                $lead_org_logo = $studycase->getMedia('logo_image')->isNotEmpty() 
                    ? $studycase->getMedia('logo_image')->first()->getUrl() 
                    : asset('/images/nologo.png');
            @endphp
            <div class="w-full md:w-1/4 flex items-center justify-center mb-4 md:mb-0">
                <img src={{ $lead_org_logo }} alt="lead-org-logo" class="h-8 w-auto">
            </div>

            <!-- Details -->
            <div class="w-full md:w-3/4">
                <div class="grid grid-cols-1 md:grid-cols-6 gap-x-2 items-center">
                    <div class="font-semibold text-lg text-left">{{ t("Name") }}</div>
                    <div class="col-span-5 text-left">{{ $studycase->team->name }}</div>

                    <div class="font-semibold text-lg text-left">{{ t("Website") }}</div>
                    <div class="col-span-5 text-ochre text-left flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5 4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244" />
                        </svg>
                        <a href="{{ $studycase->team->website }}" class="text-ochre hover:underline" target="_blank">{{ $studycase->team->website }}</a>
                    </div>

                    <div class="font-semibold text-lg text-left">{{ t("Contact") }}</div>
                    <div class="col-span-5 text-left flex items-center">
                        <span class="text-black inline">{{ $studycase->contact_person_name }} | </span>
                        <span class="text-ochre inline ml-1">{{ $studycase->contact_person_email }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Partner Organisation -->
    @if($studycase->organisations->isNotEmpty())
        <div class="py-8">
        @php
            $partnerOrganisationCount = $studycase->organisations->count();
            $partnerOrganisationText = $partnerOrganisationCount === 1 ? t('Partner organisation') : t('Partner organisations');
        @endphp
        <h1 class="text-xl font-bold text-dark-teal">{{ $partnerOrganisationText }}</h1>
        @foreach($studycase->organisations as $partner_org)
            <div class="flex flex-col md:flex-row items-start p-4 mt-4">
                <!-- Logo -->
                @php
                    $partner_org_logo = $partner_org->getMedia('logo')->isNotEmpty() 
                    ? $partner_org->getMedia('logo')->first()->getUrl() 
                    : asset('/images/nologo.png');
                @endphp
                <div class="w-full md:w-1/4 flex items-center justify-center mb-4 md:mb-0">
                    <img src={{ $partner_org_logo }} alt="partner-org-logo" class="h-12 w-auto">
                </div>

                <!-- Details -->
                <div class="w-full md:w-3/4">
                    <div class="grid grid-cols-1 md:grid-cols-6 gap-x-2 items-center">
                        <div class="font-semibold text-lg text-left">{{ t("Name") }}</div>
                        <div class="col-span-5 text-left">{{ $partner_org->name }}</div>

                        <div class="font-semibold text-lg text-left">{{ t("Website") }}</div>
                        <div class="col-span-5 text-ochre text-left flex items-center">
                            <svg xmlns="https://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 mr-2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5 4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244" />
                            </svg>
                            <a href="{{ $partner_org->website }}" class="text-ochre hover:underline" target="_blank">{{ $partner_org->website }}</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @endif
</div>

<script>
    function openPhotoModal(imageUrl, description) {
        // Set the image and description in the modal
        document.getElementById('modalImage').src = imageUrl;
        document.getElementById('modalDescription').textContent = description;

        // Show the modal
        document.getElementById('photoModal').classList.remove('hidden');
    }

    function closePhotoModal() {
        // Close the modal by adding the 'hidden' class
        document.getElementById('photoModal').classList.add('hidden');
    }

    function stopPropagation(event) {
        // Stop event propagation so that clicks inside the modal don't trigger the close function
        event.stopPropagation();
    }
</script>
