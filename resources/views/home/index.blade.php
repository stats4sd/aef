@extends('layouts.app')

@section('content')
    <!-- Banner Section -->
    <div class="relative w-full h-[75vh]">
        <!-- Image -->
        <img src="{{ asset('/images/home_header.JPG') }}" alt="Background Image" class="w-full h-full object-cover">
        <!-- Info -->
        <div class="absolute top-0 right-0 w-1/2 h-full bg-dark-teal text-white flex flex-col justify-center py-8 pl-16">
            <h1 class="text-6xl font-bold pr-40 mb-4">GRASSROOTS EVIDENCE FOR AGROECOLOGY</h1>
            <h2 class="text-2xl text-ochre mb-8 pt-6">CASES AND EVIDENCE</h2>
            <div class="flex space-x-4 pt-12">
                <a href="#cases" class="bg-ochre hover-effect text-white font-semibold py-2 px-6">BROWSE CASES</a>
                <a href="/about" class="bg-mint hover-effect text-white font-semibold py-2 px-6">FIND OUT MORE</a>
            </div>
        </div>
    </div>

    <!-- Main Section -->
    <div class="bg-white py-12">

        <!-- Description -->
        <div class="text-xl font-bold text-black pb-8 px-20">An evidence base to support and promote agroecological policies 
            and practices, working towards more sustainable food systems worldwide.
        </div>

        <div class="py-8">
            <!-- Include components-->
            <div class="mt-4 px-20"> @include('home.recent-cases')</div>
            <div class="mt-8">@include('home.info')</div>
            <div id="cases" class="mt-4">@livewire('search-cases')</div>
        </div>

    </div>
@endsection