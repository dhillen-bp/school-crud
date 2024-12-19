<div>
    <h1 class="text-2xl font-bold">Edit Teacher</h1>
    <form class="mt-5 max-w-sm" wire:submit='save'>
        <div class="mb-5">
            <label for="class_name" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Teacher
                Name</label>
            <input type="text" id="class_name" wire:model='form.name'
                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                placeholder="Example: John Doe" required />
            @error('form.class_name')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-5">
            <label for="teacher_number" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">No. Induk
                Guru</label>
            <input type="text" id="teacher_number" wire:model='form.teacher_number'
                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                placeholder="Example: 5882636617254773" required />
            @error('form.teacher_number')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-5">
            <label for="class" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Class</label>
            <select id="class" wire:model='form.class_id'
                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                <option selected disabled>Choose a class</option>
                @foreach ($classes as $class)
                    <option value="{{ $class->id }}">{{ $class->class_name . ' ' . $class->code }}</option>
                @endforeach
            </select>
            @error('form.class_id')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-5">
            <label for="gender" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Gender</label>
            <select id="class" wire:model='form.gender'
                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                <option selected disabled>Choose a gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
            @error('form.gender')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit"
            class="w-full rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 sm:w-auto">Submit</button>
    </form>
</div>
