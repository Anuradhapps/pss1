<x-app-layout>
    <div class="flex justify-between">
        <h1 class="text-2xl font-bold mb-4 text-red-900">Create Pest Data</h1>
        <a href="{{ route('pestdata.index') }}" class="btn btn-primary">Back</a>
    </div>

    <x-form method="POST" action="{{ route('pestdata.store') }}">
        @csrf <!-- Include CSRF token -->
        <div class="grid grid-cols-2 gap-4">
            <div class="col-span-2 sm:col-span-1">
                <x-form.date name="date_collected" label="Date of Collected Data:" />
            </div>
            <div class="col-span-2 sm:col-span-1">
                <x-form.select id="growth_s_c" label="Growth Stage Code" class="block mt-1 w-full" name="growth_s_c">
                    <option value="">-- Select code --</option>
                    @for ($i = 1; $i <= 10; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </x-form.select>
            </div>
            <div class="col-span-2 sm:col-span-1">
                <x-form.input name="temperature" label="Temperature:" >0</x-form.input>
            </div>
            <div class="col-span-2 sm:col-span-1">
                <x-form.input name="numbrer_r_day" label="Number of Rainy Days:" >0</x-form.input>
            </div>
        </div>
        <div class="grid grid-cols-1 gap-2">
            <h2 class="text-lg text-red-900 font-bold">Number Of Tillers</h2>
                <input type="text" hidden name="Number_Of_Tillers" value="Number_Of_Tillers">
                <div class="grid grid-cols-3 sm:grid-cols-4 md:grid-cols-5 lg:grid-cols-5 xl:grid-cols-10 gap-4">
                    @for ($i = 1; $i <= 10; $i++)
                        <div class="col-span-1">
                            <x-form.input name="Number_Of_Tillers_location_{{ $i }}" label="Location {{ $i }} :">0</x-form.input>
                        </div>
                    @endfor
                </div>
            @foreach ($pests as $pest)
                <h2 class="text-lg text-red-900 font-bold">{{ $pest->name }}</h2>
                <input type="text" hidden name="{{ $pest->name }}" value="{{ $pest->name }}">
                <div class="grid grid-cols-3 sm:grid-cols-4 md:grid-cols-5 lg:grid-cols-5 xl:grid-cols-10 gap-4">
                    @for ($i = 1; $i <= 10; $i++)
                        <div class="col-span-1">
                            <x-form.input name="{{ $pest->id }}_location_{{ $i }}" label="Location {{ $i }} :">0</x-form.input>
                        </div>
                    @endfor
                </div> 
            @endforeach
        </div>


        {{-- <div class="grid grid-cols-2 gap-4">
            <div x-data="{ open: 1 }" class="w-full">
                <div class="border-b">
                    <div class="p-4">
                        <button @click="open === 1 ? open = null : open = 1" class="w-full text-left">
                            <h2 class="text-lg text-red-900 font-bold">Pest 1</h2>
                        </button>
                    </div>
                    <div x-show="open === 1" class="p-4">
                        <div class="col-span-2 sm:col-span-1">
                            <x-form.input name="numbrer_r_day_1" label="Number of Rainy Days for Pest 1:" /> <!-- Changed the name to avoid duplicates -->
                        </div>
                    </div>
                </div>
            </div>

           
        </div> --}}
        <div class="col-span-2 sm:col-span-1">
            <x-form.submit>Submit</x-form.submit>
        </div>
    </x-form>
</x-app-layout>
