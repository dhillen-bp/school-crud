<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <h1 class="my-5 text-center text-2xl font-semibold">List Guru Berdasarkan Kelas</h1>

    <table class="w-full text-left text-sm text-gray-500 rtl:text-right dark:text-gray-400">
        <thead class="border-b text-center text-xs uppercase text-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="bg-gray-50 px-6 py-3 dark:bg-gray-800">
                    Kelas
                </th>
                <th scope="col" class="px-6 py-3">
                    Nama Guru
                </th>
                <th scope="col" class="bg-gray-50 px-6 py-3 dark:bg-gray-800">
                    No Induk Guru
                </th>
                <th scope="col" class="bg-gray-50 px-6 py-3 dark:bg-gray-800">
                    Gender
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($classes as $class)
                <tr class="border-b border-gray-200 dark:border-gray-700">
                    <td class="bg-gray-50 px-6 py-4 dark:bg-gray-800"
                        rowspan="{{ $class->teachers->count() > 0 ? $class->teachers->count() : 1 }}">
                        <div class="flex items-center justify-center">
                            <span class="text-2xl font-bold">{{ $class->class_name . '-' . $class->code }}</span>
                        </div>
                    </td>

                    @if ($class->teachers->isEmpty())
                        <td class="px-6 py-4">-</td>
                        <td class="bg-gray-50 px-6 py-4">-</td>
                    @else
                        @foreach ($class->teachers as $index => $teacher)
                            @if ($index > 0)
                </tr>
                <tr class="border-b border-gray-200 dark:border-gray-700">
            @endif
            <td class="px-6 py-4">
                {{ $index + 1 }}. {{ $teacher->name }}
            </td>
            <td class="bg-gray-50 px-6 py-4">
                {{ $teacher->teacher_number }}
            </td>
            <td class="px-6 py-4">
                {{ $teacher->gender }}
            </td>
            @endforeach
            @endif
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="my-5 px-5">
        {{ $classes->links() }}
    </div>
</div>
