<x-app-layout>
  <div x-data="{ open: 1 }" class="w-full">
    <div class="border-b">
      <div class="p-4">
        <button @click="open === 1 ? open = null : open = 1" class="w-full text-left">
          <h2 class="text-lg text-red-900 font-bold">pest1</h2>
        </button>
      </div>
      <div x-show="open === 1" class="p-4">
<p>hello</p>
      </div>
    </div>
  </div>
  
  
</x-app-layout>
