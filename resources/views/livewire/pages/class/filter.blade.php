<div>
    <h1 class="mb-8 text-center text-4xl font-bold">KELAS {{ $class->class_name . '-' . $class->code }}</h1>
    <div class="grid h-auto items-start justify-between gap-6 md:grid-cols-2">
        <div class="w-full">
            <h1 class="text-center text-2xl font-bold">Daftar Siswa</h1>
            <div class="relative mt-8 overflow-x-auto shadow-md sm:rounded-lg">
                <table id="studentTable">
                    <thead>
                        <tr>
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
                                    Name
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
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($class->students as $student)
                            <tr class="odd:bg-white even:bg-blue-50">
                                <td class="text-gray-900 dark:text-white">{{ $student->student_number }}</td>
                                <td class="text-gray-900 dark:text-white">{{ $student->name }}</td>
                                <td class="text-gray-900 dark:text-white">{{ $student->gender }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="w-full">
            <h1 class="text-center text-2xl font-bold">Daftar Guru</h1>
            <div class="relative mt-8 overflow-x-auto shadow-md sm:rounded-lg">
                <table id="teacherTable">
                    <thead>
                        <tr>
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
                                    Name
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
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($class->teachers as $teacher)
                            <tr class="odd:bg-white even:bg-blue-50">
                                <td class="text-gray-900 dark:text-white">{{ $teacher->teacher_number }}</td>
                                <td class="text-gray-900 dark:text-white">{{ $teacher->name }}</td>
                                <td class="text-gray-900 dark:text-white">{{ $teacher->gender }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>


</div>

@push('after-script')
    <script type="module">
        if (document.getElementById("studentTable") && typeof simpleDatatables.DataTable !== 'undefined') {
            const dataTable = new simpleDatatables.DataTable("#studentTable", {
                searchable: true,
                sortable: true,
                paging: true,
                perPage: 10,
                perPageSelect: [10, 15, 20, 25],
            });
        }

        if (document.getElementById("teacherTable") && typeof simpleDatatables.DataTable !== 'undefined') {
            const dataTable = new simpleDatatables.DataTable("#teacherTable", {
                searchable: true,
                sortable: true,
                paging: true,
                perPage: 10,
                perPageSelect: [10, 15, 20, 25],
            });
        }
    </script>
@endpush
