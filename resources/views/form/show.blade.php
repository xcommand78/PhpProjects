<x-layout>
    <div class="container mx-auto py-6 px-4">

        <!-- Pagination Links -->
        <div class="mb-4">
            <div class="flex justify-center">
                {{ $data->links() }}
            </div>
        </div>

        <!-- Add New One Button -->
        <div class="mb-4 flex justify-end">
            <a href="/create"
                class="bg-blue-500 text-white font-semibold hover:bg-blue-400 py-2 px-6 rounded-md inline-block shadow-lg hover:shadow-xl transition duration-300">
                Add New One
            </a>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto mt-6 bg-white shadow-lg rounded-md">
            <form action="/selected" method="POST">
                @csrf
                @method('delete')

                <table class="min-w-full border-separate border-spacing-0.5 text-sm">
                    <thead class="bg-gray-100">
                        <tr>
                            <!-- Select All Checkbox -->
                            <th class="px-4 py-2 border-b border-gray-300">
                                <input type="checkbox" id="selectAll" class="form-checkbox rounded-sm">
                            </th>
                            <th class="px-4 py-2 border-b border-gray-300">Sr.No</th>
                            <th class="px-4 py-2 border-b border-gray-300">Profile</th>
                            <th class="px-4 py-2 border-b border-gray-300">Name</th>
                            <th class="px-4 py-2 border-b border-gray-300">Age</th>
                            <th class="px-4 py-2 border-b border-gray-300">Job</th>
                            <th class="px-4 py-2 border-b border-gray-300">State</th>
                            <th class="px-4 py-2 border-b border-gray-300">Food</th>
                            <th class="px-4 py-2 border-b border-gray-300">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $father)
                        <tr class="hover:bg-gray-50 transition duration-200 ease-in-out">
                            <td class="px-4 py-2 border-b border-gray-300">
                                <input type="checkbox" name="selectedIds[]" value="{{ $father->id }}"
                                    class="selectCheckbox form-checkbox rounded-sm">
                            </td>
                            <td class="px-4 py-2 border-b border-gray-300">{{ $loop->iteration }}</td>
                            <td class="px-4 py-2 border-b border-gray-300">
                                <img src="{{ asset('storage/' . $father->image) }}" alt="Image of {{ $father->name }}"
                                    class="w-16 h-16 rounded-full object-cover">
                            </td>
                            <td class="px-4 py-2 border-b border-gray-300">{{ $father->name }}</td>
                            <td class="px-4 py-2 border-b border-gray-300">{{ $father->age }}</td>
                            <td class="px-4 py-2 border-b border-gray-300">{{ $father->job }}</td>
                            <td class="px-4 py-2 border-b border-gray-300">{{ $father->state }}</td>
                            <td class="px-4 py-2 border-b border-gray-300">{{ $father->food }}</td>
                            <td class="px-4 py-2 border-b border-gray-300">
                                <a href="edit/{{ $father->id }}" class="text-blue-500 hover:underline">Edit</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="mt-4 flex justify-end">
                    <input type="submit" value="Delete Selected"
                        class="bg-red-500 text-white py-2 px-6 rounded-md hover:bg-red-400 transition duration-300"
                        id="deleteButton" style="display: none;">
                </div>
            </form>
        </div>

        <!-- Pagination Links -->
        <div class="mt-4">
            <div class="flex justify-center">
                {{ $data->links() }}
            </div>
        </div>

        <!-- Row Count Limit -->
        <div class="mt-4 bg-white p-4 shadow-lg rounded-md">
            <form id="filterForm" action="" method="post" class="flex justify-between items-center">
                @csrf
                <div class="flex items-center space-x-2">
                    <label for="rowCount" class="font-semibold">Show</label>
                    <select name="rowCount" id="rowCount" class="border border-gray-300 rounded-md p-2">
                        <option value="10" {{request('rowCount') == '10' ?'selected':''}}>10</option>
                        <option value="20" {{request('rowCount') == '20' ?'selected':''}}>20</option>
                        <option value="50" {{request('rowCount') == '50' ?'selected':''}}>50</option>
                        <option value="100" {{request('rowCount') == '100' ?'selected':''}}>100</option>
                    </select>
                    <label for="rowCount" class="font-semibold">Records</label>
                </div>
            </form>
            
            <script>
                document.getElementById('rowCount').addEventListener('change', function () {
                    // Submit the form when the user selects an option
                    this.form.submit();
                });
            </script>
            
            
        </div>
    </div>

    <script>
        // Get elements
        const selectAllCheckbox = document.getElementById('selectAll');
        const checkboxes = document.querySelectorAll('.selectCheckbox');
        const deleteButton = document.getElementById('deleteButton');

        // Function to toggle select all checkboxes
        selectAllCheckbox.addEventListener('change', () => {
            checkboxes.forEach(checkbox => {
                checkbox.checked = selectAllCheckbox.checked;
            });
            toggleDeleteButton();
        });

        // Function to check if any checkbox is selected
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', () => {
                toggleDeleteButton();
                if (checkbox.checked === false) {
                    selectAllCheckbox.checked = false;
                    selectAllCheckbox.indeterminate = Array.from(checkboxes).some(checkbox => checkbox.checked);
                } else {
                    selectAllCheckbox.checked = Array.from(checkboxes).every(checkbox => checkbox.checked);
                }
            });
        });

        // Toggle delete button visibility
        function toggleDeleteButton() {
            const selectedCheckboxes = Array.from(checkboxes).filter(checkbox => checkbox.checked);
            deleteButton.style.display = selectedCheckboxes.length > 0 ? 'inline-block' : 'none';
        }
    </script>
</x-layout>
