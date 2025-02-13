<!-- Heading -->
<div class="text-2xl font-bold text-dark-teal pt-8 px-12 md:px-20 text-left">
    {{ t("Grassroots Evidence for Agroecology: A Growing Collection of Impactful Cases") }}
</div>

<div class="py-8 px-12 md:px-20">
        <p class="mb-4">{!! t("Welcome to our <b>Catalogue of Evidence-Based Cases for Agroecology</b> — a collaborative platform showcasing real-world experiences 
            from grassroots organisations worldwide.") !!}
        </p>

        <p class="mb-4">{{ t("Building and using evidence to drive agroecological transformation was highlighted as a key focus of the ") }}     
            <a href="https://agroecologyfund.org/" class="text-ochre font-bold hover:underline"  target='_blank'>{{ t("Agroecology Fund (AEF)") }}</a>
            {{ t("and its grantees since the Global Learning Exchange in India in 2020. In response to the need for a more inclusive and participatory approach to 
            evidence gathering, the Grassroots Evidence for Agroecology (GEA) initiative was launched as a partnership between the AEF, AEF grantees, and ") }}
            <a href="https://stats4sd.org/"class="text-ochre font-bold hover:underline"  target='_blank'>{{ t("Statistics for Sustainable Development (Stats4SD)") }}</a>.
        </p>

        <p class="mb-4">{{ t("Through this initiative, grassroots organisations have developed compelling, evidence-based cases that highlight what 
            agroecology has enabled them to achieve. As a result, they argue for a variety of audiences to embrace agroecological approaches. 
            With technical support from Stats4SD and small grants from the Agroecology Fund, these organisations have 
            built a growing body of knowledge that informs and inspires agroecological transitions worldwide.") }}
        </p>

        <p class="mb-4">{{ t("This catalogue presents the cases developed in 2024 and remains open for future contributions. We invite you to explore, learn, 
            and share as we continue building a collective vision for sustainable and just food systems.") }}
        </p>

        <p class="mb-4">{!! t("We extend our gratitude to the farmers, Indigenous communities, and grassroots groups whose experiences shape 
            this work. <b>Join us in sharing and building up the evidence for agroecology!</b>") !!}
        </p>
    </div>

<!-- Info Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 h-full w-full">
    <!-- EVIDENCE BASE -->
    <div id="evidence-base-case" class="sm:order-1 order-1 bg-light-yellow flex flex-col items-start justify-center p-6 md:py-28 md:px-16">
        <img src="/images/icon_evidencebase.png" alt="Icon Evidence Base" class="w-16 h-16">
        <div class="text-teal text-xl font-bold mt-4">{{ t("WHAT IS AN EVIDENCE-BASED CASE?") }}</div>
        <div class="text-black mt-2 pb-8">
            <h2 class="font-bold text-dark-teal mb-4">{{ t("What is a Case?") }}</h2>
            <p class="mb-4">{!! t("In this collection, a case is more than just information; it is a <b>persuasive argument</b> designed to <b>change minds</b> or 
                <b>influence decisions.</b> Unlike general reports or narratives that aim to inform, a case is built to convince a <b>target audience</b> to take 
                action—whether by supporting agroecological initiatives, adopting sustainable practices, or influencing policies.") !!}</p>
            
            <h2 class="font-bold text-dark-teal mb-4">{{ t("Structure of the Cases") }}</h2>
            <p class="mb-4">{!! t("Each case follows a structured approach to ensure <b>clarity, coherence, and impact.</b> The cases presented in this 
                catalogue are built around:") !!}</p>
            <ul class="pl-5 mb-4">
                <li>{!! t("<b>A clear claim</b> - a specific statement or argument that demonstrates the value of agroecology.") !!}</li>
                <li>{!! t("<b>A defined target audience</b> - shaping the case based on the values and priorities of the intended audience.") !!}</li>
                <li>{!! t("<b>A strategic approach</b> - outlining how the case will be argued effectively.") !!}</li>
                <li>{!! t("<b>Supporting evidence</b> - carefully selected information that substantiates the claim.") !!}</li>
                <li>{!! t("<b>Context and interpretation</b> - explaining how the evidence is relevant and compelling for the audience.") !!}</li>
                <li>{!! t("<b>A call to action</b> - a targeted message encouraging a concrete response.") !!}</li>
            </ul>
            
            <p class="mb-4">{!! t("To effectively communicate these cases, participants developed <b>tailored communication products</b> for the target 
                audiences. These materials are showcased throughout the catalogue.") !!}</p>

            <h2 class="font-bold text-dark-teal mb-4">{{ t("What is Considered Evidence?") }}</h2>
            <p class="mb-4">{{ t("Not all information qualifies as evidence. In the context of this catalogue, evidence is information actively 
                used to support a claim. Information only becomes evidence when it serves this function.") }}</p>
            
            <p class="mb-4">{{ t("Evidence in these cases:") }}</p>
            <ul class="pl-5 mb-4">
                <li>{!! t("<b>Is purposeful</b> - compiled specifically to support a claim and persuade an audience.") !!}</li>
                <li>{!! t("<b>Is integrated</b> - presented in context, alongside other relevant information.") !!}</li>
                <li>{!! t("<b>Is cumulative</b> - drawn from multiple sources to strengthen credibility.") !!}</li>
                <li>{!! t("<b>Is interpreted</b> - not just raw data but analyzed and explained to reinforce the argument.") !!}</li>
                <li>{!! t("<b>Is coherent</b> - linking context, framework, and supporting information into a compelling narrative.") !!}</li>
            </ul>

            <p class="mb-4">{!! t("By following this approach, the cases in this catalogue provide <b>strong, evidence-based arguments</b> that 
                support agroecology and advocate for meaningful change.") !!}</p>
        </div>

        <a href="#cases" class="bg-mint hover-effect text-white font-bold px-6 py-3 mt-8">
            {{ t("BROWSE CASES") }}
        </a>
    </div>

    <!-- Photo 1 -->
    <div class="sm:order-2 order-2 bg-cover bg-center h-64 md:h-auto" style="background-image: url('/images/about_1.jpg');"></div>

    <!-- Photo 2 -->
    <div class="sm:order-3 order-4 bg-cover bg-center h-64 md:h-auto" style="background-image: url('/images/about_2.JPG');"></div>

    <!-- DEVELOPING CASES -->
    <div id="developing-cases" class="sm:order-4 order-3 bg-light-yellow flex flex-col items-start justify-center p-6 md:py-28 md:px-16">
        <img src="/images/icon_developingcases.png" alt="Icon Developing Cases" class="w-16 h-16">
        <div class="text-teal text-xl font-bold mt-4">{{ t("DEVELOPING CASES") }}</div>
        <p class="mt-2">
            {!! t("Building strong, evidence-based cases for agroecology requires <b>critical thinking, structured argumentation,</b> 
                and <b>effective communication.</b> From the experience of developing the methodology for building evidence-based cases for 
                agroecology in partnership with grassroots organisations, we have developed an online training course to support building new cases. 
                This course provides a clear framework to help you create compelling cases that persuade target audiences about the <b>value and 
                impact of agroecology.</b>") !!}
        </p>
        <p class="mt-2">
            {!! t("The course is <b>free of charge</b> and available online, allowing you to take it at your own convenience.") !!}
        </p>
        <p class="mt-2">
            {!! t("Those who have taken part in this process describe it as both <b>challenging and rewarding:</b>") !!}
        </p>
        <p class="mt-2">
                <ul class="italic">
                    <li>{{ t("“We gained a broader understanding of how to collect and present evidence around a case.”") }}</li>
                    <li>{{ t("“It has helped us motivate the youth practising agroecology… They feel appreciated when their work is shared and their testimonies are highlighted.”") }}</li>
                    <li>{{ t("“I got lost in the details… It was a hard mental exercise to keep all the aspects together. But this was also the best part of the entire learning process.”") }}</li>
                </ul>
        </p>
        <p class="mt-2">
            {{ t("The course objectives are:") }}
        </p>
        <p class="mt-2">
            <ul>
                <li>{!! t("To explore <b>real-world examples</b> of evidence-based cases and understand how they were developed.") !!}</li>
                <li>{!! t("To learn how to <b>tailor a case to a specific audience</b> for maximum impact.") !!}</li>
                <li>{!! t("To develop skills to <b>select and present evidence</b> effectively.") !!}</li>
                <li>{!! t("To follow a <b>step-by-step process</b> for developing an evidence-based case.") !!}</li>
                <li>{!! t("And to be prepared to <b>use their case for advocacy</b> and awareness-raising.") !!}</li>
            </ul>
        </p>
        <p class="mt-2 text-dark-teal font-bold">
            {{ t("Register Today") }}
        </p>
        <p class="mt-2">
            {!! t("You are invited to <b>register now</b> and benefit from the experiences of AEF grantees shared throughout the course. Visit ") !!}
            <a href='https://courses.stats4sd.org/' class='text-ochre hover:underline font-bold' target='_blank'>courses.stats4sd.org</a>
            {{ t("and register for the “Grassroots Evidence for Agroecology” course.") }}
        </p>
        <p class="mt-2">
            {!! t("In the future, AEF plans to continue supporting the development of these types of cases, and applicants may be required to have a 
                <b>certificate of completion</b> of the course.") !!}
        </p>
        <a href="https://courses.stats4sd.org/" target="_blank" class="bg-mint hover-effect text-white font-bold px-6 py-3 mt-8">
            {{ t("REGISTER") }}
        </a>
    </div>

    <!-- ADVOCATING FOR AGROECOLOGY -->
    <div id="advocating-agroecology" class="sm:order-5 order-5 bg-light-yellow flex flex-col items-start justify-center p-6 md:py-28 md:px-16">
        <img src="/images/icon_advocating.png" alt="Icon Advocating" class="w-16 h-16">
        <div class="text-teal text-xl font-bold mt-4">{{ t("ADVOCATING FOR AGROECOLOGY") }}</div>
        <p class="mt-2">
            {{ t("Agroecology is essential today because it provides a holistic approach to food production that addresses pressing global challenges such 
                as climate change, food insecurity, biodiversity loss, and social inequity. By integrating ecological principles throughout the food system—from 
                plot to plate—agroecology fosters sustainable, resilient food systems while promoting social justice and empowering communities.") }}
        </p>
        <p class="mt-2">
            {{ t("We believe that the experience and knowledge accumulated by millions of grassroots organisation members are crucial in advocating for agroecology as a 
                means of transforming food systems. Strong, logical arguments, supported by diverse and relevant evidence, are essential for encouraging changes in how 
                we produce, exchange, and consume food. Such arguments will help influencing the minds of agents of change and decision-makers.") }}
        </p>
        <p class="mt-2">
            {{ t("Evidence-based advocacy for agroecology raises awareness, engages people in working toward healthier food systems, influences decision-makers, and 
                sustains or restores healthier ecosystems impacted by the unsustainable exploitation of natural resources.") }}
        </p>
        <a href="#cases" class="bg-mint hover-effect text-white font-bold px-6 py-3 mt-8">
            {{ t("BROWSE CASES") }}
        </a>
    </div>

    <!-- Photo 3 -->
    <div class="sm:order-6 order-6 bg-cover bg-center h-64 md:h-auto" style="background-image: url('/images/about_3.JPG');"></div>
</div>

