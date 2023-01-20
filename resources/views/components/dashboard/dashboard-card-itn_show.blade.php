@if (Session::has('itn'))
    <div id="alert-border-3" class="flex p-4 mb-4 bg-green-100 border-t-4 border-green-500 dark:bg-green-200"
        role="alert">
        <svg class="flex-shrink-0 w-5 h-5 text-green-700" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                clip-rule="evenodd"></path>
        </svg>
        <div class="ml-3 text-sm font-medium text-green-700">
            {{ Session::get('itn') }}
        </div>
        <button type="button"
            class="ml-auto -mx-1.5 -my-1.5 bg-green-100 dark:bg-green-200 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 dark:hover:bg-green-300 inline-flex h-8 w-8"
            data-dismiss-target="#alert-border-3" aria-label="Close">
            <span class="sr-only">Dismiss</span>
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                    clip-rule="evenodd"></path>
            </svg>
        </button>
    </div>
@elseif (Session::has('itn_hapus'))
    <div id="alert-border-3" class="flex p-4 mb-4 bg-green-100 border-t-4 border-green-500 dark:bg-green-200"
        role="alert">
        <svg class="flex-shrink-0 w-5 h-5 text-green-700" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                clip-rule="evenodd"></path>
        </svg>
        <div class="ml-3 text-sm font-medium text-green-700">
            {{ Session::get('itn_hapus') }}
        </div>
        <button type="button"
            class="ml-auto -mx-1.5 -my-1.5 bg-green-100 dark:bg-green-200 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 dark:hover:bg-green-300 inline-flex h-8 w-8"
            data-dismiss-target="#alert-border-3" aria-label="Close">
            <span class="sr-only">Dismiss</span>
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                    clip-rule="evenodd"></path>
            </svg>
        </button>
    </div>
@endif

<div class="col-span-full xl:col-span-6 bg-white shadow-lg rounded-sm border border-slate-200">
    <header class="px-5 py-4 border-b border-slate-100">
        <h2 class="font-semibold text-slate-800">{{ $itn->name }}</h2>
    </header>
    <div class="p-3">

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="table-auto w-full justify-center">
                <!-- Table header -->
                <thead class="text-xs uppercase text-slate-400 bg-slate-50 rounded-sm flex justify-center">
                    <tr>
                        <th class="p-2">
                            <div class="font-semibold text-left">Profile</div>
                        </th>
                    </tr>
                </thead>
                <!-- Table body -->
                <tbody class="text-sm font-medium divide-y divide-slate-100 content-center">
                    <!-- Row -->
                    <tr>
                        <td class="p-2 flex justify-center">
                            <div class="text-slate-800 font-bold">Nama Instansi</div>
                        </td>
                        <td class="p-2 flex justify-center">
                            <div class="text-slate-800">{{ $itn->name }}</div>
                        </td>
                    </tr>
                    <!-- Row -->
                    <tr>
                        <td class="p-2 flex justify-center">
                            <div class="text-slate-800 font-bold">Sektor Instansi</div>
                        </td>
                        <td class="p-2 flex justify-center">
                            <div class="text-slate-800">{{ $itn->itn_sektor }}</div>
                        </td>
                    </tr>
                    <!-- Row -->
                    <tr>
                        <td class="p-2 flex justify-center">
                            <div class="text-slate-800 font-bold">Nomor Telepon</div>
                        </td>
                        <td class="p-2 flex justify-center">
                            <a href="https://wa.me/{{ $itn->itn_notel }}" target="_blank">{{ $itn->itn_notel }}</a>
                        </td>
                    </tr>
                </tbody>

                <thead class="text-xs uppercase text-slate-400 bg-slate-50 rounded-sm flex justify-center">
                    <tr>
                        <th class="p-2">
                            <div class="font-semibold text-left">Address</div>
                        </th>
                    </tr>
                </thead>

                <!-- Table body -->
                <tbody class="text-sm font-medium divide-y divide-slate-100 content-center">
                    <!-- Row -->
                    @if (count($addr) > 0)
                        @foreach ($addr->sortBy('id') as $index => $addr)
                            <tr>
                                <td class="p-2 flex justify-center">
                                    <div class="text-slate-800 font-bold">Alamat {{ $index + 1 }}</div>
                                </td>
                                <td class="p-2 flex justify-center">
                                    <div class="text-slate-800">{{ $addr->name }}</div>
                                </td>
                                <td class="py-4 flex justify-center">
                                    <a href="#"
                                        class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-xs px-1.5 py-1 text-center mr-2 mb-2"
                                        data-modal-toggle="popup-pbatch{{ $addr->id }}">Delete </a>

                                    <div id="popup-pbatch{{ $addr->id }}" tabindex="-1"
                                        class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                                        <div class="relative w-full h-full max-w-md md:h-auto">
                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                <button type="button"
                                                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                                    data-modal-toggle="popup-pbatch{{ $addr->id }}">
                                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                                <div class="p-6 text-center">
                                                    <svg aria-hidden="true"
                                                        class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200"
                                                        fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                                        </path>
                                                    </svg>
                                                    <h3
                                                        class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                                                        Yakin menghapus Alamat {{ $index + 1 }} ?
                                                    </h3>
                                                    <a href="/addr_hapus/{{ $addr->id }}"
                                                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                        Yes
                                                    </a>
                                                    <button data-modal-toggle="popup-pbatch{{ $addr->id }}"
                                                        type="button"
                                                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                                                        cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </td>
                            </tr>
                        @endforeach
                    @else
                        <p>Belum ada alamat</P>
                    @endif

                    <tr>
                        <td class="p-2 flex justify-center">
                            <button type="button"
                                class="text-gray-800 border border-gray-300 hover:bg-gray-200 hover:text-white focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-full text-sm p-2 text-center inline-flex items-center dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:focus:ring-blue-800"
                                data-modal-toggle="popup-create">
                                <img src="{{ url('/images/plus2.svg') }}" alt="Image"
                                    class="rounded-full h-12 w-12" />
                            </button>

                            <div id="popup-create" tabindex="-1" aria-hidden="true"
                                class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                                <div class="relative w-full h-full max-w-md md:h-auto">
                                    <!-- Modal content -->
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <button type="button"
                                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                            data-modal-toggle="popup-create">
                                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                        <div class="px-6 py-6 lg:px-8">
                                            <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">
                                                Input
                                                Alamat Instansi</h3>
                                            {!! Form::open([
                                                'action' => ['App\Http\Controllers\ItnsController@addr_input', $itn->id],
                                                'method' => 'POST',
                                                'enctype' => 'multipart/form-data',
                                            ]) !!}
                                            <div class="overflow-hidden shadow sm:rounded-md">
                                                <div class="bg-white px-4 py-5 sm:p-6">
                                                    <div class="grid grid-cols-6 gap-6">
                                                        <div class="col-span-6 sm:col-span-3">
                                                            {{ Form::label('addr', 'Alamat Instansi', ['class' => 'block text-sm font-medium text-gray-700']) }}
                                                            {{ Form::text('addr', '', ['class' => 'mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm']) }}
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                                                    {{ form::submit('Create', ['class' => 'py-2 px-3 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700', 'name' => 'batch_input']) }}
                                                </div>

                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>
