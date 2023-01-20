<div>
    {!! Form::open([
        'action' => 'App\Http\Controllers\PartcController@partc_input',
        'method' => 'POST',
        'enctype' => 'multipart/form-data',
    ]) !!}
    <div class="mt-10 sm:mt-0">
        <div class="md:grid md:grid-cols-3 md:gap-6">

            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Personal Information</h3>
                    <p class="mt-1 text-sm text-gray-600">Data diri peserta pelatihan Ahli K3 Umum</p>
                </div>
            </div>

            <div class="mt-5 md:col-span-2 md:mt-0">
                <div class="overflow-hidden shadow sm:rounded-md">
                    <div class="bg-white px-4 py-5 sm:p-6">
                        <div class="grid grid-cols-6 gap-6">

                            <div class="col-span-6 sm:col-span-3">
                                {{ Form::label('id_batch', 'Batch', ['class' => 'block text-sm font-medium text-gray-700']) }}
                                <select id="id_batch" name="id_batch"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @if (count($batch_drop) > 0)
                                        @foreach ($batch_drop as $shopping)
                                            <option value="{{ $shopping->id }}"
                                                class="overflow-y-auto py-1 h-48 text-gray-700 dark:text-gray-200"
                                                {{ $shopping->id ? 'selected' : '' }}>{{ $shopping->name }}</option>
                                        @endforeach
                                    @else
                                        <p>No Batches</P>
                                    @endif
                                </select>
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                {{ Form::label('name', 'Nama', ['class' => 'block text-sm font-medium text-gray-700']) }}
                                {{ Form::text('name', '', ['class' => 'mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm']) }}
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                {{ Form::label('ttl', 'Tempat, Tanggal Lahir', ['class' => 'block text-sm font-medium text-gray-700']) }}
                                {{ Form::text('ttl', '', ['class' => 'mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm']) }}
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                {{ Form::label('nik', 'Nomor Induk Kependudukan', ['class' => 'block text-sm font-medium text-gray-700']) }}
                                {{ Form::text('nik', '', ['class' => 'mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm']) }}
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                {{ Form::label('pddk', 'Pendidikan Terakhir', ['class' => 'block text-sm font-medium text-gray-700']) }}
                                <select id="pddk" name="pddk"
                                    class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                    <option>D3</option>
                                    <option>D4</option>
                                    <option>S1</option>
                                    <option>S2</option>
                                </select>
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                {{ Form::label('id_itn', 'Instansi', ['class' => 'block text-sm font-medium text-gray-700']) }}
                                <div class="flex">
                                    <select id="id_itn" name="id_itn"
                                        class="mt-1 mr-1 w-1/3 rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                        @if (count($itn_drop) > 0)
                                            @foreach ($itn_drop as $itn)
                                                <option value="{{ $itn->id }}" {{ $itn->id ? 'selected' : '' }}>
                                                    {{ $itn->name }} - {{ $itn->itn_sektor }}</option>
                                            @endforeach
                                        @else
                                            <p>No Instansi</P>
                                        @endif
                                    </select>
                                    {{ Form::text('itn_addr', '', ['class' => 'mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm', 'placeholder' => 'Alamat Instansi']) }}
                                </div>
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                {{ Form::label('notel', 'Nomor Telepon / WA', ['class' => 'block text-sm font-medium text-gray-700']) }}
                                {{ Form::text('notel', '', ['class' => 'mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm']) }}
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                {{ Form::label('email', 'E-Mail', ['class' => 'block text-sm font-medium text-gray-700']) }}
                                {{ Form::text('email', '', ['class' => 'mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm']) }}
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                {{ Form::label('size', 'Ukuran Baju PDL Safety', ['class' => 'block text-sm font-medium text-gray-700']) }}
                                <select id="size" name="size"
                                    class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                    <option>S</option>
                                    <option>M</option>
                                    <option>L</option>
                                    <option>XL</option>
                                </select>
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                {{ Form::label('addr', 'Alamat kirim paket', ['class' => 'block text-sm font-medium text-gray-700']) }}
                                {{ Form::text('addr', '', ['class' => 'mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm']) }}
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="hidden sm:block" aria-hidden="true">
        <div class="py-5">
            <div class="border-t border-gray-200"></div>
        </div>
    </div>

    <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium leading-6 text-gray-900">File</h3>
                <p class="mt-1 text-sm text-gray-600">Data Kelengkapan Berkas</p>
            </div>
        </div>

        <div class="mt-5 md:col-span-2 md:mt-0">
            <div class="shadow sm:overflow-hidden sm:rounded-md">
                <div class="space-y-6 bg-white px-4 py-5 sm:p-6">

                    <div class="col-span-6 sm:col-span-3">
                        {{ Form::label('ktp', 'Kartu Tanda Penduduk', ['class' => 'block mb-2 text-sm font-medium text-gray-900 dark:text-white']) }}
                        {{ Form::file('ktp', ['class' => 'block w-full mb-1 text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400']) }}
                        <p class="text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG (MAX.
                            800x400px).</p>
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        {{ Form::label('ijazah', 'Ijazah', ['class' => 'block mb-2 text-sm font-medium text-gray-900 dark:text-white']) }}
                        {{ Form::file('ijazah', ['class' => 'block w-full mb-1 text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400']) }}
                        <p class="text-sm text-gray-500 dark:text-gray-300" id="file_input_help">PDF (MAX. 10MB).</p>
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        {{ Form::label('skb', 'Surat Keterangan Bekerja', ['class' => 'block mb-2 text-sm font-medium text-gray-900 dark:text-white']) }}
                        {{ Form::file('skb', ['class' => 'block w-full mb-1 text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400']) }}
                        <p class="text-sm text-gray-500 dark:text-gray-300" id="file_input_help">PDF (MAX. 10MB).</p>
                    </div>

                    <div class="col-span-6 sm:col-span-3">
                        {{ Form::label('foto4x6', 'Foto 4x6', ['class' => 'block mb-2 text-sm font-medium text-gray-900 dark:text-white']) }}
                        {{ Form::file('foto4x6', ['class' => 'block w-full mb-1 text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400']) }}
                        <p class="text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG (MAX.
                            10MB).</p>
                    </div>


                    <div class="col-span-6 sm:col-span-3">
                        {{ Form::label('foto2x3', 'Foto 2x3', ['class' => 'block mb-2 text-sm font-medium text-gray-900 dark:text-white']) }}
                        {{ Form::file('foto2x3', ['class' => 'block w-full mb-1 text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400']) }}
                        <p class="text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG (MAX.
                            10MB).</p>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
        {{ form::submit('Create', ['class' => 'py-2 px-3 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700', 'name' => 'batch_input']) }}
    </div>

    <div class="hidden sm:block" aria-hidden="true">
        <div class="py-5">
            <div class="border-t border-gray-200"></div>
        </div>
    </div>

    {!! Form::close() !!}
</div>
