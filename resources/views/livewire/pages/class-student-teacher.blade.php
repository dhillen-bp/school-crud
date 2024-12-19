<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <h1 class="my-5 text-center text-2xl font-semibold">List Kelas, Siswa dan Guru</h1>

    <table class="w-full text-left text-sm text-gray-500 rtl:text-right dark:text-gray-400">
        <thead class="border-b text-center text-xs uppercase text-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="bg-gray-50 px-6 py-3 dark:bg-gray-800">
                    Kelas
                </th>
                <th scope="col" class="px-6 py-3">
                    Nama Siswa
                </th>
                <th scope="col" class="bg-gray-50 px-6 py-3 dark:bg-gray-800">
                    Nama Guru
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($classes as $class)
                @foreach ($class->students as $index => $student)
                    <tr class="border-b border-gray-200 dark:border-gray-700">

                        {{-- Menampilkan kelas hanya untuk siswa pertama --}}
                        @if ($index == 0)
                            <td class="bg-gray-50 px-6 py-4 dark:bg-gray-800" rowspan="{{ $class->students->count() }}">
                                <span class="text-2xl font-bold">{{ $class->class_name . '-' . $class->code }}</span>
                            </td>
                        @endif

                        {{-- Menampilkan nama siswa dengan nomor urut --}}
                        <td class="px-6 py-4">
                            <div class="flex justify-between">
                                <span>{{ $index + 1 }}.
                                    {{ $student->name . ' (' . $student->student_number . ')' }}</span>
                                <a href="{{ route('student.detail', $student) }}" wire:navigate
                                    class="rounded-lg bg-blue-700 px-2 py-1 text-center text-xs font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Detail</a>
                            </div>
                        </td>

                        {{-- Menampilkan nama guru hanya pada baris pertama setiap kelas --}}
                        @if ($index == 0)
                            <td class="bg-gray-50 px-6 py-4">
                                @if ($class->teachers->isEmpty())
                                    -
                                @else
                                    @foreach ($class->teachers as $teacherIndex => $teacher)
                                        <div class="flex justify-between">
                                            <span>{{ $teacherIndex + 1 }}.
                                                {{ $teacher->name . ' (' . $teacher->teacher_number . ')' }}</span>
                                            <a href="{{ route('teacher.detail', $teacher) }}" wire:navigate
                                                class="rounded-lg bg-blue-700 px-2 py-1 text-center text-xs font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                Detail</a>
                                        </div>
                                        {{-- Pisahkan antar guru --}}
                                        @if (!$loop->last)
                                            <hr class="my-2">
                                        @endif
                                    @endforeach
                                @endif
                            </td>
                        @else
                            {{-- Baris siswa berikutnya tidak perlu menampilkan guru --}}
                            <td class="bg-gray-50 px-6 py-4"></td>
                        @endif
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>

    <div class="my-5 px-5">
        {{ $classes->links() }}
    </div>
</div>
