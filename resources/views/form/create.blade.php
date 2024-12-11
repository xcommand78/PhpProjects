<x-layout>
    <div class="flex justify-center items-center min-h-screen bg-gray-100">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-lg">
            <h1 class="text-2xl font-semibold mb-6 text-center">Add New Member</h1>

            <form action="/store" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <!-- Name Field -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="name" id="name" 
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 p-2"
                        placeholder="Enter name">
                    @error('name')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Age Field -->
                <div>
                    <label for="age" class="block text-sm font-medium text-gray-700">Age</label>
                    <input type="text" name="age" id="age" 
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 p-2"
                        placeholder="Enter age">
                    @error('age')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Job Radio Buttons -->
                <div>
                    <label for="job" class="block text-sm font-medium text-gray-700">Job</label>
                    <div class="flex items-center gap-4 mt-2">
                        <label class="inline-flex items-center">
                            <input type="radio" name="job" value="govt" class="form-radio text-indigo-600">
                            <span class="ml-2 text-gray-700">Govt</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" name="job" value="corporate" class="form-radio text-indigo-600">
                            <span class="ml-2 text-gray-700">Corporate</span>
                        </label>
                    </div>
                </div>

                <!-- State Dropdown -->
                <div>
                    <label for="state" class="block text-sm font-medium text-gray-700">State</label>
                    <select id="state" name="state"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 p-2 bg-white">
                        <option value="">Select a state</option>
                        <option value="Andhra Pradesh">Andhra Pradesh</option>
                        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                        <option value="Assam">Assam</option>
                        <option value="Bihar">Bihar</option>
                        <option value="Chhattisgarh">Chhattisgarh</option>
                        <option value="Goa">Goa</option>
                        <option value="Gujarat">Gujarat</option>
                        <option value="Haryana">Haryana</option>
                        <option value="Himachal Pradesh">Himachal Pradesh</option>
                        <option value="Jharkhand">Jharkhand</option>
                        <option value="Karnataka">Karnataka</option>
                        <option value="Kerala">Kerala</option>
                        <option value="Madhya Pradesh">Madhya Pradesh</option>
                        <option value="Maharashtra">Maharashtra</option>
                        <option value="Manipur">Manipur</option>
                        <option value="Meghalaya">Meghalaya</option>
                        <option value="Mizoram">Mizoram</option>
                        <option value="Nagaland">Nagaland</option>
                        <option value="Odisha">Odisha</option>
                        <option value="Punjab">Punjab</option>
                        <option value="Rajasthan">Rajasthan</option>
                        <option value="Sikkim">Sikkim</option>
                        <option value="Tamil Nadu">Tamil Nadu</option>
                        <option value="Telangana">Telangana</option>
                        <option value="Tripura">Tripura</option>
                        <option value="Uttar Pradesh">Uttar Pradesh</option>
                        <option value="Uttarakhand">Uttarakhand</option>
                        <option value="West Bengal">West Bengal</option>
                        <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                        <option value="Chandigarh">Chandigarh</option>
                        <option value="Dadra and Nagar Haveli and Daman and Diu">Dadra and Nagar Haveli and Daman and Diu</option>
                        <option value="Lakshadweep">Lakshadweep</option>
                        <option value="Delhi">Delhi</option>
                        <option value="Puducherry">Puducherry</option>
                    </select>
                </div>

                <!-- Food Checkboxes -->
                <div>
                    <label for="food" class="block text-sm font-medium text-gray-700">Select What You Like</label>
                    <div class="grid grid-cols-2 gap-2 mt-2">
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="food[]" value="Biryani" class="form-checkbox text-indigo-600">
                            <span class="ml-2 text-gray-700">Biryani</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="food[]" value="Butter Chicken" class="form-checkbox text-indigo-600">
                            <span class="ml-2 text-gray-700">Butter Chicken</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="food[]" value="Samosa" class="form-checkbox text-indigo-600">
                            <span class="ml-2 text-gray-700">Samosa</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="food[]" value="Burger" class="form-checkbox text-indigo-600">
                            <span class="ml-2 text-gray-700">Burger</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="food[]" value="Pizza" class="form-checkbox text-indigo-600">
                            <span class="ml-2 text-gray-700">Pizza</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="food[]" value="Pasta" class="form-checkbox text-indigo-600">
                            <span class="ml-2 text-gray-700">Pasta</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="food[]" value="Tacos" class="form-checkbox text-indigo-600">
                            <span class="ml-2 text-gray-700">Tacos</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="food[]" value="Fried Rice" class="form-checkbox text-indigo-600">
                            <span class="ml-2 text-gray-700">Fried Rice</span>
                        </label>
                    </div>
                </div>

                <!-- Image Upload -->
                <div>
                    <label for="image" class="block text-sm font-medium text-gray-700">Upload Profile Image</label>
                    <input type="file" name="image" 
                        class="mt-2 block w-full text-sm text-gray-500 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 file:bg-indigo-100 file:border-0 file:rounded-md file:text-indigo-600">
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit" 
                        class="w-full bg-indigo-600 text-white px-4 py-2 rounded-lg shadow hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
