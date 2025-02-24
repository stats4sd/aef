<!-- Header Section -->
<div class="bg-dark-teal text-white py-6 px-6 sm:px-12 md:px-20">
    <div class="flex flex-col items-start">
        <h1 class="text-2xl font-bold">{{ t("CASE DETAILS") }}</h1>
    </div>
</div>

<!-- Main Section -->
<div class="bg-white mt-4 shadow-xl px-6 sm:px-12 md:px-20">

    <div class="py-6">
        <h1 class="text-xl font-bold pb-1">{{ t("STATEMENT") }}</h1>
        <div class="prose">{!! $studycase->statement !!}</div>
    </div>

    <div class="py-6">
        <h1 class="text-xl font-bold pb-1">{{ t("TARGET AUDIENCE") }}</h1>
        <div class="prose">{!! $studycase->target_audience !!}</div>
    </div>

    <div class="py-6">
        <h1 class="text-xl font-bold pt-4 pb-4">{{ t("TARGET AUDIENCE'S PRIORITIES AND VALUES") }}</h1>
        <div class="prose">{!! $studycase->target_audience_priorities_and_values !!}</div>
    </div>

    <div class="py-6">
        <h1 class="text-xl font-bold pb-1">{{ t("FRAMING OF THE ARGUMENT") }}</h1>
        <div class="prose">{!! $studycase->framing !!}</div>
    </div>

    <div class="py-6">
        <h1 class="text-xl font-bold pb-1">{{ t("STRATEGY") }}</h1>
        <div class="prose">{!! $studycase->strategy_to_argue !!}</div>
    </div>

    <div class="pt-6 pb-10">
        <h1 class="text-xl font-bold pb-1">{{ t("CALLS TO ACTION") }}</h1>
        <div class="prose">{!! $studycase->call_to_action !!}</div>
    </div>
</div>