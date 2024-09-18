@extends('layouts.app')

@section('content')
    <!-- Banner Section -->
    <div class="relative w-full h-[75vh]">
        <!-- Image -->
        <img src="{{ asset('images/home_header.jpg') }}" alt="Background Image" class="w-full h-full object-cover">
        <!-- Dark Green Cover -->
        <div class="absolute top-0 right-0 w-1/2 h-full bg-dark-teal text-white flex flex-col justify-center py-8 pl-16">
            <h1 class="text-6xl font-bold pr-40 mb-4">GRASSROOTS EVIDENCE FOR AGROECOLOGY</h1>
            <h2 class="text-2xl text-ochre mb-8 pt-6">CASES AND EVIDENCE</h2>
            <div class="flex space-x-4 pt-12">
                <a href="#cases" class="bg-ochre text-white font-semibold py-2 px-6">BROWSE CASES</a>
                <a href="/about" class="bg-teal text-white font-semibold py-2 px-6">FIND OUT MORE</a>
            </div>
        </div>
    </div>

    <!-- Main Section -->
    <div class="bg-white py-12 px-20">
        <h2 class="text-l font-bold text-black mb-6 pb-8">An evidence base to support and promote agroecological policies and practices,
            working towards more sustainable food systems worldwide.
        </h2>
        <div class="h-1 bg-dark-teal w-full"></div>
        <div id="cases" class="text-2xl font-bold text-dark-teal pt-16">RECENTLY ADDED CASES</div>
        Coming soon...
    </div>
@endsection