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
            <a href="app/register" class="bg-ochre hover-effect text-white font-semibold py-2 px-4 w-fit mb-4 lg:mb-0">
                {{ t("REGISTER NOW") }}
            </a>
        </div>

        <!-- Question: how to make it left align with the button above? -->
        <div class="flex flex-col lg:flex-row lg:space-x-4 pt-6 lg:pt-12 items-center lg:items-start">
            <a href="app/login" class="text-ochre hover:underline">{{ t("Login with an existing account") }}</a>
        </div>

    </div>
</div>

    <!-- Main Section -->
    <div class="bg-white pt-12 md:py-12 xl:container xl:mx-auto">

        <div class="text-lg text-black pb-8 px-12 md:px-20">
            {!! t("Register an account to make your case for agroecology") !!}
        </div>

        <div class="text-lg text-black pb-8 px-12 md:px-20">
            {!! t("We welcome new proposals for evidence-based cases. To start building your proposal, register an account through the link above. ") !!}
        </div>

        <div class="text-lg text-black pb-8 px-12 md:px-20">
            {!! t("If you are a participant in the online training course \"Grassroots Evidence for Agroecology\" during 2025-26, 
            you have come to the right place! Please register below, using the same email address you use for the course 
            on our <a href=\"https://courses.stats4sd.org\" class=\"text-ochre hover:underline\">Moodle site</a>") !!}
        </div>

    </div>
@endsection