<div
    class="block max-w-md rounded-lg border border-gray-200 bg-white p-6 shadow hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">

    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Teacher Profile</h5>

    <div class="flex flex-col space-y-4">
        <div class="flex items-center justify-between">
            <span class="font-semibold text-gray-700 dark:text-gray-300">Name:</span>
            <span class="text-gray-900 dark:text-white">{{ $teacher->name }}</span>
        </div>

        <div class="flex items-center justify-between">
            <span class="font-semibold text-gray-700 dark:text-gray-300">Teacher Number:</span>
            <span class="text-gray-900 dark:text-white">{{ $teacher->teacher_number }}</span>
        </div>

        <div class="flex items-center justify-between">
            <span class="font-semibold text-gray-700 dark:text-gray-300">Gender:</span>
            <span class="text-gray-900 dark:text-white">{{ $teacher->gender }}</span>
        </div>
        <div class="flex items-center justify-between">
            <span class="font-semibold text-gray-700 dark:text-gray-300">Class:</span>
            <span
                class="text-gray-900 dark:text-white">{{ $teacher->class->class_name . '-' . $teacher->class->code }}</span>
        </div>
    </div>

</div>
