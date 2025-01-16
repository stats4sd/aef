<header class="bg-white shadow-md px-4 sm:px-20" x-data="{ open: false }">
    <div class="container mx-auto flex justify-between items-center py-4">
        <!-- Logos -->
        <div class="flex items-center space-x-4">
        <a href="https://agroecologyfund.org/">
                <img src="/images/AEF_logo.png" alt="AEF logo" class="h-12  mt-2 w-auto">
            </a>
            <a href="https://stats4sd.org/">
                <img src="/images/Stats4SD_logo.png" alt="Stats4SD logo" class="h-4 w-auto">
            </a>
        </div>

        <!-- Hamburger Menu (visible on small screens) -->
        <button 
            class="sm:hidden text-gray-800 focus:outline-none" 
            x-on:click="open = !open">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-6 w-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>

        <!-- Nav Items (hidden on small screens) -->
        <nav class="hidden sm:flex">
            <ul class="flex space-x-6">
                <li><a href="/home" class="text-gray-800 hover:text-gray-600">{{ t("Home") }}</a></li>
                <li><a href="/about" class="text-gray-800 hover:text-gray-600">{{ t("About") }}</a></li>
                <li><a href="/home#cases" class="text-gray-800 hover:text-gray-600">{{ t("Cases") }}</a></li>
                <li class="relative nav-item dropdown hover:text-gray-600" x-data="{ open: false }">
                    <a class="nav-link dropdown-toggle" role="button" aria-expanded="false" x-on:click="open = !open">
                        {{ t("Change Language") }}
                    </a>
                    <div class="dropdown-menu" x-show="open" x-on:click.outside="open = false" style="display:none">
                        <a class="dropdown-item" href="{{ URL::current() . '?locale=en' }}">English</a>
                        <a class="dropdown-item" href="{{ URL::current() . '?locale=es' }}">Español</a>
                        <a class="dropdown-item" href="{{ URL::current() . '?locale=fr' }}">Français</a>
                    </div>
                </li>
            </ul>
        </nav>
    </div>

    <!-- Nav Items (visible on small screens) -->
    <div 
        class="sm:hidden" 
        x-show="open"
        x-on:click.outside="open = false" 
        style="display: none;">
        <nav class="bg-white text-right">
            <ul class="flex flex-col space-y-2 px-6 pb-4">
                <li><a href="/home" class="text-gray-800 hover:text-gray-600">{{ t("Home") }}</a></li>
                <li><a href="/about" class="text-gray-800 hover:text-gray-600">{{ t("About") }}</a></li>
                <li><a href="/home#cases" class="text-gray-800 hover:text-gray-600">{{ t("Cases") }}</a></li>
                <li class="relative nav-item pt-2 text-gray-800" x-data="{ open: false }">
                    <a class="nav-link" role="button" x-on:click="open = !open">
                        {{ t("Change Language") }}
                    </a>
                    <ul class="language-options" x-show="open" x-on:click.outside="open = false" style="display:none">
                        <li><a class="pt-2" href="{{ URL::current() . '?locale=en' }}">English</a></li>
                        <li><a class="py-2" href="{{ URL::current() . '?locale=es' }}">Español</a></li>
                        <li><a href="{{ URL::current() . '?locale=fr' }}">Français</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</header>