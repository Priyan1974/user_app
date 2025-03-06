<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Gallery') }}
            </h2>
            <div class="d-flex gap-3">
                <a href="{{ route('gallery.create') }}" class="px-4 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600">
                    Add Gallery
                </a>
            </div>
        </div>
    </x-slot>

    <div class="container mx-auto p-6">
        <h3 class="text-lg font-semibold mb-4">Gallery Images</h3>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @foreach($galleries as $gallery)
            @php
                $images = json_decode($gallery->images, true);
            @endphp
        
            @if(is_array($images) && count($images) > 0)
                @foreach($images as $image)
                    <div class="border rounded-lg overflow-hidden shadow-md">
                        <img src="{{ asset($image) }}" alt="Gallery Image" class="w-40 h-40 object-cover">
                        <div class="p-2 text-center">
                            <p class="text-sm font-medium">{{ $gallery->gallery_name }}</p>
                        </div>
                    </div>
                @endforeach
            @else
                <p class="text-gray-500">No images available.</p>
            @endif
        @endforeach
        
        </div>
    </div>
</x-app-layout>
