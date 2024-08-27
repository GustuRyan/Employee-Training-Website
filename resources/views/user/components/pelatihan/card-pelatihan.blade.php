<!-- card-pelatihan.blade.php -->

@props(['training'])

<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <div class="relative">
        <img src="{{ $training->image_url }}" alt="{{ $training->title }}" class="w-full h-48 object-cover">
        <div class="absolute top-0 left-0 px-4 py-2 bg-blue-500 text-white rounded-br-lg">
            {{ $training->category }}
        </div>
    </div>
    <div class="p-6">
        <h3 class="text-xl font-semibold mb-2">{{ $training->title }}</h3>
        <p class="text-gray-700 mb-4">{{ $training->description }}</p>
        <div class="flex items-center justify-between">
            <span class="text-sm text-gray-500">{{ $training->duration }}</span>
            <a href="{{ $training->link }}" class="inline-block bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">Enroll</a>
        </div>
    </div>
</div>