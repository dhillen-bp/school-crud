<div>
    <div class="flex h-auto items-center justify-between gap-3">
        <a href="{{ route('teacher.create') }}" wire:navigate class="btn-info btn-md rounded-full">Create
            Teacher</a>
    </div>

    <div class="relative mt-8 overflow-x-auto shadow-md sm:rounded-lg">
        <div class="mt-5 flex items-center gap-3 px-5">
            <label for="selectedClass" class="font-medium text-slate-500">Filter</label>
            <select wire:model.live="selectedClass" id="selectedClass"
                class="block rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                <option value="">Select Class</option>
                @foreach ($classes as $class)
                    <option value="{{ $class->id }}">{{ $class->class_name . '-' . $class->code }}</option>
                @endforeach
            </select>
        </div>

        <table id="teacherTable{{ $selectedClass }}">
            <thead>
                <tr>
                    <th>
                        <span class="flex items-center">
                            No
                            <svg class="ms-1 h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                            </svg>
                        </span>
                    </th>
                    <th>
                        <span class="flex items-center">
                            NISN
                            <svg class="ms-1 h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                            </svg>
                        </span>
                    </th>
                    <th>
                        <span class="flex items-center">
                            Teacher Name
                            <svg class="ms-1 h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                            </svg>
                        </span>
                    </th>
                    <th>
                        <span class="flex items-center">
                            Gender
                            <svg class="ms-1 h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                            </svg>
                        </span>
                    </th>
                    <th>
                        <span class="flex items-center">
                            Class
                            <svg class="ms-1 h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                            </svg>
                        </span>
                    </th>
                    <th>
                        <span class="flex items-center">
                            Action
                            <svg class="ms-1 h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                            </svg>
                        </span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse($teachers as $teacher)
                    <tr class="odd:bg-white even:bg-blue-50">
                        <td class="text-gray-900 dark:text-white">{{ $loop->iteration }}</td>
                        <td class="text-gray-900 dark:text-white">{{ $teacher->teacher_number }}</td>
                        <td class="text-gray-900 dark:text-white">{{ $teacher->name }}</td>
                        <td class="text-gray-900 dark:text-white">{{ $teacher->gender }}</td>
                        <td class="text-gray-900 dark:text-white">
                            {{ $teacher->class->class_name . '-' . $teacher->class->code }}</td>
                        <td class="flex gap-3">
                            <a href="{{ route('teacher.edit', $teacher) }}" wire:navigate
                                class="btn-warning btn-sm rounded-full">Edit</a>

                            <button data-modal-target="modal-delete-{{ $teacher->id }}"
                                data-modal-toggle="modal-delete-{{ $teacher->id }}"
                                class="btn-danger btn-sm rounded-full" type="button">
                                Delete
                            </button>
                            <x-modal-delete :dataId="$teacher->id" :dataDesc="$teacher->name" />
                        </td>
                    </tr>
                @empty
                    <div>Tidak ada Data</div>
                @endforelse
            </tbody>
        </table>

    </div>
</div>

@push('after-script')
    <script type="module">
        let dataTable;

        function initializeDataTable(selectedClass = null) {
            const tableId = selectedClass ? `teacherTable${selectedClass}` : "teacherTable";

            if (document.querySelector(`#${tableId}`) && typeof simpleDatatables.DataTable !== 'undefined') {

                dataTable = new simpleDatatables.DataTable(`#${tableId}`, {
                    searchable: true,
                    sortable: true,
                    paging: true,
                    perPage: 10,
                    perPageSelect: [10, 15, 20, 25],
                });
            }
        }

        initializeDataTable();

        Livewire.on('filterUpdated', (selectedClass) => {
            setTimeout(() => {
                if (dataTable) {
                    dataTable.destroy();
                }
                initializeDataTable(selectedClass);
            }, 300);
        });
    </script>
@endpush
