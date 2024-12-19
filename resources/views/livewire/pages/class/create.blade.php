<div>
    <h1 class="text-2xl font-bold">Create Class</h1>
    <form class="mt-5 max-w-sm" wire:submit='save'>
        <div class="mb-5">
            <label for="class_name" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Class
                Name</label>
            <input type="text" id="class_name" wire:model='form.class_name'
                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                placeholder="Type 1, 2, or 3, etc..." required />
            @error('form.class_name')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-5">
            <label for="code" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Class
                Code</label>
            <input type="text" id="code" wire:model='form.code'
                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                placeholder="Type A, B, or C, ...etc" required />
            @error('form.code')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit"
            class="w-full rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 sm:w-auto">Submit</button>
    </form>
</div>
