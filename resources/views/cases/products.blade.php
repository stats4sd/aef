<!-- Header Section -->
<div class="bg-dark-teal text-white py-6 px-6 sm:px-12 md:px-20">
    <div class="flex flex-col items-start">
        @php
            $productCount = $studycase->communicationProducts()->count();
            $productText = $productCount === 1 ? t('Communication product') : t('Communication products');
        @endphp
        <h1 class="text-2xl font-bold uppercase">{{ $productText }}</h1>
        <p class="text-base md:text-lg mt-4">{{ t("Communication products developed to present the case to the target audience.
                                These may be videos, presentations, documents or other relevant formats.") }}</p>
    </div>
</div>

<!-- Main Section -->
<div class="bg-white shadow-xl p-4 mb-4 px-6 sm:px-12 md:px-20">

    <!-- Communication Product -->
    @foreach($studycase->communicationProducts as $communicationProduct)
        @php
            $media = $communicationProduct->getMedia('comms_products')->first();
            if($media) {
                $file_name = $media->file_name;
                $file_size = Number::fileSize($media->size);
                $file_url = $media->getUrl();

                $mime_map = [
                    "application/msword" => "doc",
                    "application/vnd.openxmlformats-officedocument.wordprocessingml.document" => "docx",
                    "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" => "xlsx"
                ];

                $file_type = $mime_map[$media->mime_type] ?? basename($media->mime_type);
            }
        @endphp

        <div class="pt-2 md:pt-8 pb-2 mt-4 flex flex-col sm:flex-row items-start">
            <!-- Description -->
            <div class="flex-grow mb-4 sm:mb-0">
                <div class="text-black text-xl font-bold">{{ $communicationProduct->description }}</div>
            </div>

            <!-- Buttons -->
            <div class="flex flex-col gap-4">
                <!-- Download Button -->
                @if($media)
                    <a href="{{ $file_url }}" target="_blank" class="bg-ochre hover-effect text-white rounded-lg px-8 py-2 h-12 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-8 w-8 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m9 12.75 3 3m0 0 3-3m-3 3v-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        {{ t("Download ")}} {{ $file_type }} | {{ $file_size }}
                    </a>
                @endif
                <!-- Visit Link Button -->
                @if($communicationProduct->url)
                    <a href="{{ $communicationProduct->url }}" target="_blank" class="bg-ochre hover-effect text-white rounded-lg px-8 py-2 h-12 flex items-center">
                        <svg xmlns="https://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-8 w-8 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5 4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244" />
                        </svg>
                        {{ t("Visit link") }}
                    </a>
                @endif
            </div>
        </div>

        <!-- Embedded Youtube Video -->
        <div class="pb-8">
            @if($communicationProduct->youtube_id)
                <div class="iframe-container items-center mt-8">
                    <iframe
                        width="560"
                        height="315"
                        src="https://www.youtube.com/embed/{{ $communicationProduct->youtube_id }}"
                        frameborder="0"
                        allow="accelerometer; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen
                    ></iframe>
                </div>
            @endif
        </div>

        <!-- Divider -->
        @unless ($loop->last)
            <div class="h-1 bg-dark-teal w-full"></div>
        @endunless

    @endforeach
</div>
