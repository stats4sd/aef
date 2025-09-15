<x-filament-panels::page>

    <x-filament::section
        class="mb-4"
        heading="How to complete this section"
        icon="heroicon-o-information-circle"
        icon-color="primary"
        collapsible>
        <p class="mb-4">
            On this page you can see any cases you or your team have started. From here, you can: 

            <ul>
                <li>&nbsp;&nbsp;&nbsp;- Start a new case with the "New Case" button.</li>
                <li>&nbsp;&nbsp;&nbsp;- Review and edit an existing case using the links in the table.</li>
                <li>&nbsp;&nbsp;&nbsp;- Go to the <a href="{{ 'teams/' . auth()->user()->latestTeam->id }}" class="text-ochre hover:underline">"My Team"</a> page to invite someone to collaborate. (make team page a link to the team page)</li>
            </ul>

            <br/>

            You can change the language of the site in the top-right of any page.
        </p>
    </x-filament::section>


    {{ $this->table }}

</x-filament-panels::page>
