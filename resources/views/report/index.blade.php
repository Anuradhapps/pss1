<x-app-layout>
    <div class="flex justify-between border-b border-gray-200 py-1">
        <h1 class="text-2xl font-bold text-gray-300">Report</h1>
        <div>
            <a href="{{ route('export.users') }}" class="bg-red-800 text-white font-bold py-2 px-4 rounded hover:bg-red-900 text-sm mr-1">Download</a>
        </div>
    </div>
</x-app-layout>