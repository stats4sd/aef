<!-- Header Section -->
<div class="bg-dark-teal text-white py-6 px-20">
    <div class="flex flex-col items-start">
        <h1 class="text-2xl font-bold">{{ t("CLAIMS AND EVIDENCE") }}</h1>
        <p class="text-lg mt-4">{{ t("This section contains each claim made by the case, along with the evidence provided to prove that claim.
                                Evidence may be first or second hand, include any combination of qualitative and quantitative data, and can come from a variety of sources.") }}</p>
    </div>
</div>

<!-- Main Section -->
<!-- Claims-->
@foreach($studycase->claims as $claim)
    <div class="bg-white mt-4 shadow-xl px-20 py-8">

        <!-- Claim Header -->
        <div class="mb-4">
            <div class="text-2xl text-dark-teal font-bold border-l-4 border-dark-teal pl-4">
                {{ $claim->claim_statement }}
            </div>

            <!-- Evidence -->
            @foreach($claim->evidences as $evidence)
                <div class="text-xl pt-8 font-semibold">
                    {{ t("EVIDENCE") }}
                </div>
                <div class="pt-4">
                    {!! $evidence->matching_evidence !!}
                </div>
                
                <!-- Sources -->
                @if($evidence->evidenceAttachments->isNotEmpty())
                    <div class="pt-8">
                        <div class="bg-light-green rounded-3xl px-8 py-6">
                            <div class="text-xl text-dark-teal font-bold">
                                {{ t("Sources") }}
                            </div>

                            @foreach($evidence->evidenceAttachments as $evidenceAttachment)
                                <div class="pt-6">
                                    {{ $evidenceAttachment->description }}
                                </div>
                                @if($evidenceAttachment->is_communication_product===1)
                                    <div class="pt-2 flex items-center">
                                        {{ t("See section") }}
                                        &nbsp;
                                        <a href="#case-products" class="text-ochre"> {{ t("Communication products")}}</a>
                                        &nbsp;
                                        {{ t(" for source details") }}
                                    </div>
                                @else
                                    @if($evidenceAttachment->url)
                                        <div class="text-ochre pt-2 flex items-center">
                                            <svg xmlns="https://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 mr-2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5 4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244" />
                                            </svg>
                                            <a href="{{ $evidenceAttachment->url }}" class="text-ochre hover:underline" target="_blank">{{ $evidenceAttachment->url }}</a>
                                        </div>
                                    @endif
                                    @if($evidenceAttachment->getMedia('evidence')->first())
                                        <div class="text-ochre pt-2 flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 mr-2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m9 12.75 3 3m0 0 3-3m-3 3v-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                            <a href="{{ $evidenceAttachment->getMedia('evidence')->first()->getUrl() }}" class="text-ochre hover:underline" target="_blank">{{ $evidenceAttachment->getMedia('evidence')->first()->file_name }} | {{ round($evidenceAttachment->getMedia('evidence')->first()->size/1000,0) }}MB</a>
                                        </div>
                                    @endif
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Divider -->
                @unless ($loop->last)
                    <div class="h-1 bg-dark-teal w-full mt-12"></div>
                @endunless
            @endforeach

        </div>
    </div>
@endforeach