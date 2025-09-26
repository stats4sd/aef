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
        <h3 class="text-xl lg:text-2xl text-ochre mb-6 lg:mb-8">
            {{ t("Register an account to make your case for agroecology") }}
        </h3>
    </div>
</div>

    <!-- Main Section -->
    <div class="bg-white pt-12 md:py-12 xl:container xl:mx-auto">

        <div class="text-lg text-black pb-8 px-12 md:px-20">
            {!! t("We welcome new proposals for evidence-based cases. To register on this site, you must be a participant in our online training course 
            <a href=\"https://courses.stats4sd.org\" class=\"text-ochre hover:underline\" target=\"_blank\">Grassroots Evidence for Agroecology</a>.") !!}
        </div>

        <div class="text-lg text-black pb-8 px-12 md:px-20">
            {!! t("When you have enrolled in the course, return here and register an account below. You will need your email address and the code provided to you in the course. ") !!}
        </div>

        <div class="container mx-auto text-center px-4 sm:px-0">
            <p><br/></p>
            <a href="app/register" class="bg-ochre hover-effect text-white font-semibold py-2 px-4 w-fit mb-4 lg:mb-0">
                {{ t("Register Now") }}
            </a>
            <p><br/></p>
            <a href="app/login" class="text-ochre hover:underline">{{ t("Login with an existing account") }}</a>
        </div>

    </div>
@endsection