@extends('layouts.app')

@section('content')
<!-- Banner Section -->
<div class="relative w-full h-auto lg:h-[75vh] grid grid-cols-1 lg:grid-cols-2">
    <!-- Image -->
    <div class="hidden md:block w-full h-64 lg:h-full">
        <img src="{{ asset('/images/home_header.JPG') }}" alt="Background Image" class="w-full h-full object-cover">
    </div>
    <!-- Info -->
    <div class="bg-dark-teal text-white flex flex-col justify-center py-8 px-6 lg:px-16 text-center lg:text-left items-center lg:items-start header_banner">
        <h1 class="text-4xl lg:text-6xl font-bold mb-4 lg:pr-40">
            {{ t("GRASSROOTS EVIDENCE FOR AGROECOLOGY") }}
        </h1>
        <h2 class="text-xl lg:text-2xl text-ochre mb-6 lg:mb-8">
            {{ t("CASES AND EVIDENCE") }}
        </h2>
        <div class="flex flex-col lg:flex-row lg:space-x-4 pt-6 lg:pt-12 items-center lg:items-start">
            <a href="#cases" class="bg-ochre hover-effect text-white font-semibold py-2 px-4 w-fit mb-4 lg:mb-0">
                {{ t("BROWSE CASES") }}
            </a>
            <a href="#info" class="bg-mint hover-effect text-white font-semibold py-2 px-4 w-fit">
                {{ t("FIND OUT MORE") }}
            </a>
        </div>
    </div>
</div>

    <!-- Main Section -->
    <div class="bg-white pt-12 md:py-12 xl:container xl:mx-auto">

        <!-- Description -->
        <div class="text-lg text-black pb-8 px-12 md:px-20">{!! t("The cases in this catalogue have been developed by grassroots organisations 
            using a structured approach to turn their knowledge and experiences into compelling arguments for agroecology. By using rigorous evidence to 
            support their claims, these cases aim to <b>influence farmers, communities, donors, policymakers, researchers and consumers</b>—key actors in the 
            transformation of food systems.") !!}
        </div>
        <div class="text-lg text-black pb-8 px-12 md:px-20">
            {!! t("This collection is an evolving resource, and we invite more contributions from grassroots organisations working to build the case for agroecology. 
            <b>Explore the cases, learn from their insights, and join us in strengthening the movement, the practice and the science that drives the quest for 
            sustainable and just food systems.</b>") !!}
        </div>

        <div class="py-8">
            <!-- Include components-->
            <div id="recent-cases" class="mt-0 md:mt-4 px-12 md:px-20"> @include('home.recent-cases')</div>
            <div id="info" class="mt-8">@include('home.info')</div>
            <div id="cases" class="mt-0 md:mt-4">@livewire('search-cases')</div>
        </div>

    </div>
@endsection