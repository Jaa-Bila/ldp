<x-app-layout>

    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        <!-- Dashboard actions -->
        <div class="sm:flex sm:justify-between sm:items-center mb-8">

            <!-- Cards -->
            <div class="grid grid-cols-12 gap-2">

                <!-- Table (Top Channels) -->
                <livewire:batch-list />

                <!-- Card (Customers)  -->
                <livewire:batchp-list />

            </div>

        </div>

        {{-- <div id="myTabContent">
        <div class="p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="profile" role="tabpanel"
            aria-labelledby="profile-tab">
            <livewire:batch-list />
        </div>
    </div>

    <div id="myTabContent">
        <div class="p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="profile" role="tabpanel"
            aria-labelledby="profile-tab">
            <livewire:batchp-list />
        </div>
    </div> --}}
    </div>

    <script src="https://unpkg.com/flowbite@1.5.4/dist/flowbite.js"></script>

</x-app-layout>
