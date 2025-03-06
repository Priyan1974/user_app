<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Gallery') }}
            </h2>
            <div class="d-flex gap-3">
                <a href="{{ route('gallery.index') }}" class="px-4 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600">
                    View Gallery
                </a>
            </div>
        </div>
    </x-slot>
<br><br>
        <form id="gallery-form" class="bg-white shadow-lg rounded-lg p-6 w-full max-w-md" enctype="multipart/form-data">
            @csrf
            <h3 class="text-xl font-semibold mb-4 text-center">Upload Gallery</h3>

            <label class="block text-gray-700">Gallery Name:</label>
            <input type="text" id="gallery-name" name="gallery_name" 
                   class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 mb-4" 
                   placeholder="Enter gallery name">
            
            <label class="block text-gray-700">Select Images:</label>
            <input type="file" name="file[]" id="file-input" multiple 
                   class="w-full border rounded-lg p-2 mb-4">
            
            <button type="button" id="upload-button">
                Upload Files
            </button>
        </form>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function () {
        $('#upload-button').click(function (e) {
            e.preventDefault();
            
            let formData = new FormData();
            formData.append('_token', '{{ csrf_token() }}');
            formData.append('gallery_name', $('#gallery-name').val());
    
            let files = $('#file-input')[0].files;
            for (let i = 0; i < files.length; i++) {
                formData.append('file[]', files[i]);
            }
    
            $.ajax({
                url: '{{ route("gallery.upload") }}',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    if (response.success) {
                        alert('Files uploaded successfully');
                    } else {
                        alert('Upload failed');
                    }
                },
                error: function (xhr) {
                    alert('Error: ' + xhr.responseText);
                }
            });
        });
    });
    </script>

</x-app-layout>
