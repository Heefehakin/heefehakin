<x-layout>

    <x-slot:heading>
       Edit Job: {{ $job->title }}
    </x-slot:heading>

    <!-- The <p> tag has been removed from around the form -->
    <form method="POST" action="/jobs/{{ $job->id }}">
        @csrf
        @method('PATCH')

        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <!-- Title Input Field -->
                    <div class="sm:col-span-4">
                        <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                        <div class="mt-2">
                            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input
                                    id="title"
                                    type="text"
                                    name="title"
                                    placeholder="Shift Leader"
                                    value="{{ $job->title }}" required
                                    class="block flex-1 border-0 bg-transparent py-1.5 pl-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" />
                            </div>
                            @error('title')
                                <p class="mt-1 text-xs font-semibold text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Salary Input Field -->
                    <div class="sm:col-span-4">
                        <label for="salary" class="block text-sm font-medium leading-6 text-gray-900">Salary</label>
                        <div class="mt-2">
                            <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                <input
                                    id="salary"
                                    type="text"
                                    name="salary"
                                    placeholder="$50,000 Per Year"
                                    value="{{ $job->salary }}"
                                    required
                                    class="block flex-1 border-0 bg-transparent py-1.5 pl-3 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" />
                            </div>
                            @error('salary')
                                <p class="mt-1 text-xs font-semibold text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div>
                  <!-- ⬇️ THE FIX IS IN THIS SECTION ⬇️ -->
                <div class="mt-6 flex items-center justify-between">
                    <!-- Left Side: Delete Button -->
                    <div>
                        <button form="delete-form" class="text-sm font-bold text-red-500">
                            Delete
                        </button>
                    </div>

                    <!-- Right Side: Cancel and Update Buttons -->
                    <div class="flex items-center gap-x-6">
                        <a href="/jobs/{{ $job->id }}" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>

                        <!-- The extra <div> around this button was removed -->
                        <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            Update
                        </button>
                    </div>
                </div>
                 <!-- ⬆️ END OF THE FIX ⬆️ -->
      </div>


    <!-- This separate form for the delete button is correct -->
    <form method="POST" action="/jobs/{{ $job->id }}" id="delete-form" class="hidden">
        @csrf
        @method('DELETE')
    </form>

</x-layout>