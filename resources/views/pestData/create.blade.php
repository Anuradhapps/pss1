<x-app-layout>
    <div class="flex justify-between">
        <h1 class="text-2xl font-bold mb-4 text-red-900">create</h1>
        <a href="{{ route('pestdata.index') }}" class="btn btn-primary ">Back</a>
    </div>
    {{-- <x-form method="POST" action="{{ route('admin.collector.update', $collector) }}"> --}}
    <x-form method="POST" action="">
        <div class="grid grid-cols-2 gap-4">
            <div class="col-span-2 sm:col-span-1">
                <x-form.input name="temperature" label="Temperature :"></x-form.input>
            </div>
            <div class="col-span-2 sm:col-span-1">
                <x-form.input name="numbrer_r_day" label="Number of ranny days :"></x-form.input>
            </div>
            <div class="col-span-2 sm:col-span-1">
                <x-form.select id="growth_s_c" label="Growth Stage Code" class="block mt-1 w-full" name="growth_s_c">
                    <option value="">-- Select code --</option>
                    @for ($i = 1; $i <= 10; $i++)
                        <option value="{{ $i }}" > {{ $i }}</option>
                    @endfor
                </x-form.select>

            </div>
            <div class="col-span-2 sm:col-span-1">
                <x-form.date name="date_collected" label="Date of Collected Data:"></x-form.date>
               
            </div>
        </div>
        <div class="grid grid-cols-4 gap-4">

            <div class="col-span-2 sm:col-span-1">
                <x-form.input name="numbrer_r_day" label="Number of ranny days :"></x-form.input>
            </div>
            <div class="col-span-2 sm:col-span-1">
                <x-form.select id="growth_s_c" label="Growth Stage Code" class="block mt-1 w-full" name="growth_s_c">
                    <option value="">-- Select code --</option>
                    @for ($i = 1; $i <= 10; $i++)
                        <option value="{{ $i }}" > {{ $i }}</option>
                    @endfor
                </x-form.select>

            </div>
            <div class="col-span-2 sm:col-span-1">
                <x-form.date name="date_collected" label="Date of Collected Data:"></x-form.date>
               
            </div>

            <div class="col-span-2 sm:col-span-1">

                <x-form.select id="district" label="District" class="block mt-1 w-full" name="district">
                    <option value="">-- Select District --</option>
                    {{-- @foreach ($districts as $district)
                        <option value="{{ $district->id }}"
                            {{ $district->id == $collector->district ? 'selected' : '' }}>
                            {{ $district->name }}</option>
                    @endforeach --}}
                </x-form.select>
            </div>
            <div class="col-span-2 sm:col-span-1">

                <x-form.select id="asc" label="ASC/Unit" class="block mt-1 w-full" name="asc">
                    <option value="">-- Select ASC --</option>
                    {{-- @foreach ($ascs as $asc)
                        <option value="{{ $asc->id }}"
                            {{ $asc->id == $selected_asc ? 'selected' : '' }}>
                            {{ $asc->name }}</option>
                    @endforeach --}}
                </x-form.select>
            </div>
            <div class="col-span-2 sm:col-span-1">
                {{-- <x-form.input name="ai_range" label="AI Range:">{{ old('ai_range', $collector->ai_range)}}</x-form.input> --}}

            </div>
            <div class="col-span-2 sm:col-span-1">
                <x-form.input name="village" label="Village:">test</x-form.input>

            </div>
            <div class="col-span-2 sm:col-span-1">
                <x-form.input name="gps_lati" label="GPS Latitude:">test2</x-form.input>

            </div>



            <div class="col-span-2 sm:col-span-1">

                <x-form.submit>Update</x-form.submit>

            </div>
        </div>
    </x-form>

</x-app-layout>
