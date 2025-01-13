<header class="bg-white shadow-md px-20">
    <div class="container mx-auto flex justify-between items-center py-4 px-6">
        
        <!-- Logos -->
        <div class="flex items-center space-x-4">
            <a href="https://agroecologyfund.org/">
                <img src="/images/AEF_logo.png" alt="AEF logo" class="h-12  mt-2 w-auto">
            </a>
            <a href="https://stats4sd.org/">
                <img src="/images/Stats4SD_logo.png" alt="Stats4SD logo" class="h-4 w-auto">
            </a>
        </div>

        <!-- Nav Items -->
        <nav>
            <ul class="flex space-x-6">
                <li><a href="/home" class="text-gray-800 hover:text-gray-600">{{ t("Home") }}</a></li>
                <li><a href="/about" class="text-gray-800 hover:text-gray-600">{{ t("About") }}</a></li>
                <li><a href="/home#cases" class="text-gray-800 hover:text-gray-600">{{ t("Cases") }}</a></li>
                <li
                    class="relative nav-item dropdown"
                    x-data="{open: false}"
                >
                    <a
                        class="nav-link dropdown-toggle"
                        role="button"
                        aria-expanded="false"
                        x-on:click="open = !open"
                    >
                        {{ t("Change Language") }}
                    </a>

                    <div
                        class="dropdown-menu"
                        x-show="open"
                        x-on:click.outside="open = false"
                        style="display:none"
                    >
                        <a class="dropdown-item" href="{{ URL::current() . '?locale=en' }}">English</a>
                        <a class="dropdown-item" href="{{ URL::current() . '?locale=es' }}">Español</a>
                        <a class="dropdown-item" href="{{ URL::current() . '?locale=fr' }}">Français</a>
                    </div>
                </li>
            </ul>
        </nav>
        
    </div>
</header>