<div>
    <div class="flex h-auto items-center justify-between gap-3">
        <a href="{{ route('class.create') }}" wire:navigate class="btn-info btn-md rounded-full">Create
            Class</a>
    </div>

    <div class="relative mt-8 overflow-x-auto shadow-md sm:rounded-lg">

        <table id="classTable">
            <thead>
                <tr>
                    <th>
                        <span class="flex items-center">
                            No
                            <svg class="ms-1 h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                            </svg>
                        </span>
                    </th>
                    <th>
                        <span class="flex items-center">
                            Class Name
                            <svg class="ms-1 h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                            </svg>
                        </span>
                    </th>
                    <th>
                        <span class="flex items-center">
                            Code
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
                @forelse($classes as $class)
                    <tr class="odd:bg-white even:bg-blue-50">
                        <td class="text-gray-900 dark:text-white">{{ $loop->iteration }}</td>
                        <td class="text-gray-900 dark:text-white">{{ $class->class_name }}</td>
                        <td class="text-gray-900 dark:text-white">{{ $class->code }}</td>
                        <td class="flex gap-3">
                            <a href="{{ route('class.detail', $class) }}" wire:navigate
                                class="btn-info btn-sm rounded-full">Detail</a>

                            <a href="{{ route('class.edit', $class) }}" wire:navigate
                                class="btn-warning btn-sm rounded-full">Edit</a>

                            <button data-modal-target="modal-delete-{{ $class->id }}"
                                data-modal-toggle="modal-delete-{{ $class->id }}"
                                class="btn-danger btn-sm rounded-full" type="button">
                                Delete
                            </button>
                            <x-modal-delete :dataId="$class->id" :dataDesc="$class->class_name . $class->code" />
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
        if (document.getElementById("classTable") && typeof simpleDatatables.DataTable !== 'undefined') {
            const dataTable = new simpleDatatables.DataTable("#classTable", {
                searchable: true,
                sortable: true,
                paging: true,
                perPage: 10,
                perPageSelect: [10, 15, 20, 25],
            });
        }
    </script>
@endpush
