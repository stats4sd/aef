@extends('layouts.app')

@section('content')
<!-- Banner Section -->
<div class="relative w-full h-auto md:h-[75vh] grid grid-cols-1 md:grid-cols-2">
    <!-- Image -->
    <div class="hidden md:block w-full h-64 md:h-full">
        <img src="{{ asset('/images/home_header.JPG') }}" alt="Background Image" class="w-full h-full object-cover">
    </div>
    <!-- Info -->
    <div class="bg-dark-teal text-white flex flex-col justify-center py-8 px-6 md:px-16 text-center md:text-left items-center md:items-start">
        <h1 class="text-4xl md:text-6xl font-bold mb-4 md:pr-40">
            {{ t("GRASSROOTS EVIDENCE FOR AGROECOLOGY") }}
        </h1>
        <h2 class="text-xl md:text-2xl text-ochre mb-6 md:mb-8">
            {{ t("CASES AND EVIDENCE") }}
        </h2>
        <div class="flex flex-col md:flex-row md:space-x-4 pt-6 md:pt-12 items-center md:items-start">
            <a href="#cases" class="bg-ochre hover-effect text-white font-semibold py-2 px-4 w-fit mb-4 md:mb-0">
                {{ t("BROWSE CASES") }}
            </a>
            <a href="/about" class="bg-mint hover-effect text-white font-semibold py-2 px-4 w-fit">
                {{ t("FIND OUT MORE") }}
            </a>
        </div>
    </div>
</div>

    <!-- Main Section -->
    <div class="bg-white pt-12 md:py-12">

        <!-- Description -->
        <div class="text-xl font-bold text-black pb-8 px-12 md:px-20">{{ t("An evidence base to support and promote agroecological policies 
            and practices, working towards more sustainable food systems worldwide.") }}
        </div>

        <div class="py-8">
            <!-- Include components-->
            <div class="mt-0 md:mt-4 px-12 md:px-20"> @include('home.recent-cases')</div>
            <div class="mt-8">@include('home.info')</div>
            <div id="cases" class="mt-0 md:mt-4">@livewire('search-cases')</div>
        </div>

    </div>
@endsection