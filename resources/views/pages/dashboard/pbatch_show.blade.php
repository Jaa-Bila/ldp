<x-app-layout>

    <div id="myTabContent">
        <div class="p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="profile" role="tabpanel"
            aria-labelledby="profile-tab">
            @include('components.dashboard.dashboard-card-pbatch_show')
        </div>
    </div>

    <div id="myTabContent">
        <div class="p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="profile" role="tabpanel"
            aria-labelledby="profile-tab">
            @include('components.dashboard.dashboard-card-pbatchpartc')
        </div>

    </div>

    <script src="https://unpkg.com/flowbite@1.5.4/dist/flowbite.js"></script>

</x-app-layout>
