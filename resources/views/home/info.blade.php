<!-- Heading -->
<div class="text-2xl font-bold text-dark-teal py-8 px-6 md:px-28 text-center md:text-left">
    {{ t("FIND OUT MORE") }}
</div>

<!-- Info Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 h-full w-full">
    <!-- EVIDENCE BASE -->
    <div class="sm:order-1 order-1 bg-light-yellow flex flex-col items-start justify-center p-6 md:py-28 md:px-16">
        <img src="/images/icon_evidencebase.png" alt="Icon Evidence Base" class="w-16 h-16">
        <div class="text-teal text-xl font-bold mt-4">{{ t("EVIDENCE BASE") }}</div>
        <p class="mt-2">
            {{ t("Cases and evidence for agroecology from organisations and projects all over the world are collected in one searchable database.") }}
        </p>
        <a href="#cases" class="bg-mint hover-effect text-white font-bold px-6 py-3 mt-8">
            {{ t("BROWSE CASES") }}
        </a>
    </div>

    <!-- Photo 1 -->
    <div class="sm:order-2 order-2 bg-cover bg-center h-64 md:h-auto" style="background-image: url('/images/about_1.jpg');"></div>

    <!-- Photo 2 -->
    <div class="sm:order-3 order-4 bg-cover bg-center h-64 md:h-auto" style="background-image: url('/images/about_2.JPG');"></div>

    <!-- DEVELOPING CASES -->
    <div class="sm:order-4 order-3 bg-light-yellow flex flex-col items-start justify-center p-6 md:py-28 md:px-16">
        <img src="/images/icon_developingcases.png" alt="Icon Developing Cases" class="w-16 h-16">
        <div class="text-teal text-xl font-bold mt-4">{{ t("DEVELOPING CASES") }}</div>
        <p class="mt-2">
            {{ t("We provide grants and guidance to support grassroots organisations to develop and use strong, evidence-based cases for agroecology.") }}
        </p>
        <a href="/about" class="bg-mint hover-effect text-white font-bold px-6 py-3 mt-8">
            {{ t("FIND OUT MORE") }}
        </a>
    </div>

    <!-- ADVOCATING FOR AGROECOLOGY -->
    <div class="sm:order-5 order-5 bg-light-yellow flex flex-col items-start justify-center p-6 md:py-28 md:px-16">
        <img src="/images/icon_advocating.png" alt="Icon Advocating" class="w-16 h-16">
        <div class="text-teal text-xl font-bold mt-4">{{ t("ADVOCATING FOR AGROECOLOGY") }}</div>
        <p class="mt-2">
            {{ t("By providing knowledge and evidence for agroecology we aim to empower researchers, cooperatives, and policymakers to promote ecological balance and sustainable agriculture.") }}
        </p>
        <a href="#cases" class="bg-mint hover-effect text-white font-bold px-6 py-3 mt-8">
            {{ t("BROWSE CASES") }}
        </a>
    </div>

    <!-- Photo 3 -->
    <div class="sm:order-6 order-6 bg-cover bg-center h-64 md:h-auto" style="background-image: url('/images/about_3.JPG');"></div>
</div>

