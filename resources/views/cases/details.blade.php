<!-- Header Section -->
<div class="bg-dark-teal text-white py-6 px-20">
    <div class="flex flex-col items-start">
        <h1 class="text-2xl font-bold">CASE DETAILS</h1>
    </div>
</div>

<!-- Main Section -->
<div class="bg-white mt-4 shadow-xl px-20">

    <div class="py-6">
        <h1 class="text-xl font-bold pb-1">STATEMENT</h1>
        <h2 class="text-lg font-bold text-mint pb-4">What the case argues, framed as a hypothesis: "if the target audience does X then Y will happen".</h2>
        <div class="prose">{!! $studycase->statement !!}</div>
    </div>

    <div class="py-6">
        <h1 class="text-xl font-bold pb-1">TARGET AUDIENCE</h1>
        <h2 class="text-lg font-bold text-mint pb-4">Who the case aims to persuade.</h2>
        <div class="prose">{!! $studycase->target_audience !!}</div>
    </div>

    <div class="py-6">
        <h1 class="text-xl font-bold pt-4 pb-4">TARGET AUDIENCE'S PRIORITIES AND VALUES</h1>
        <div class="prose">{!! $studycase->target_audience_priorities_and_values !!}</div>
    </div>

    <div class="py-6">
        <h1 class="text-xl font-bold pb-1">FRAMING OF THE ARGUMENT</h1>
        <h2 class="text-lg font-bold text-mint pb-4">Background and logic of the case.</h2>
        <div class="prose">{!! $studycase->framing !!}</div>
    </div>

    <div class="py-6">
        <h1 class="text-xl font-bold pb-1">STRATEGY</h1>
        <h2 class="text-lg font-bold text-mint pb-4">How the case is argued.</h2>
        <div class="prose">{!! $studycase->strategy_to_argue !!}</div>
    </div>

    <div class="pt-6 pb-10">
        <h1 class="text-xl font-bold pb-1">CALLS TO ACTION</h1>
        <h2 class="text-lg font-bold text-mint pb-4">Changes or actions the case is trying to persuade the audience to take.</h2>
        <div class="prose">{!! $studycase->call_to_action !!}</div>
    </div>
</div>