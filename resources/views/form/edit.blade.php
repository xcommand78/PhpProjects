<x-layout>
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
            <h1 class="text-2xl font-bold mb-6 text-center text-gray-700">Update User</h1>

            <!-- Form Start -->
            <form action="{{ route('update', $data->id) }}" method="POST" class="space-y-6"
                enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <!-- Profile Image -->
                <div class="flex justify-center mb-6">
                    <!-- Profile Image -->
                    <label for="image-upload" class="cursor-pointer">
                        <img src="{{ asset('storage/' . $data->image) }}" alt="Profile Image of {{ $data->name }}"
                            class="w-24 h-24 rounded-full shadow-lg border border-gray-300" >
                    </label>

                    <!-- Hidden File Input (triggered by clicking the image) -->
                    <input type="file" id="image-upload" name="image" class="hidden" onchange="handleFileChange(event)">

                </div>
                <!-- Name Field -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="name" id="name" value="{{ $data->name }}"
                        class="mt-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 p-3">
                    @error('name')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Age Field -->
                <div>
                    <label for="age" class="block text-sm font-medium text-gray-700">Age</label>
                    <input type="text" name="age" id="age" value="{{ $data->age }}"
                        class="mt-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 p-3">
                    @error('age')
                    <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <!--job field-->
                <div>
                    <label for="job">Job:</label>
                    <strong>Govt:</strong>
                    <input type="radio" name="job" value="govt" {{ $data->job == 'govt' ? 'checked' : '' }}>
                    <strong>Corporate:</strong>
                    <input type="radio" name="job" value="corporate" {{ $data->job == 'corporate' ? 'checked' : '' }}>

                </div>
                <!-- Submit and Delete Buttons -->
                <div class="flex justify-between items-center">
                    <button type="submit"
                        class="bg-indigo-600 text-white px-6 py-2 rounded-lg shadow hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-400 focus:outline-none">
                        Update
                    </button>
                    <button form="deleteForm"
                        class="bg-red-600 text-white px-6 py-2 rounded-lg shadow hover:bg-red-700 focus:ring-2 focus:ring-red-400 focus:outline-none">
                        Delete
                    </button>
                </div>
            </form>

            <!-- Delete Form -->
            <form action="/delete/{{ $data->id }}" method="post" id="deleteForm" hidden>
                @csrf
                @method('delete')
            </form>
        </div>
    </div>
</x-layout>