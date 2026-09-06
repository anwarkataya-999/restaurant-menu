<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-gray-100 text-gray-800">

    <div class="mx-auto max-w-3xl px-4 py-10 sm:px-6 lg:px-8">

        <!-- Header -->
        <div class="mb-8">
            <a
                href="{{ route('categories.index') }}"
                class="text-sm font-medium text-gray-500 hover:text-gray-900"
            >
                ← Back to Categories
            </a>

            <h1 class="mt-4 text-3xl font-bold text-gray-900">
                Edit Category
            </h1>

            <p class="mt-1 text-sm text-gray-500">
                Update the restaurant menu category.
            </p>
        </div>


        <!-- Validation Errors -->
        @if($errors->any())
            <div class="mb-6 rounded-lg border border-red-200 bg-red-50 p-4">

                <p class="mb-2 text-sm font-semibold text-red-700">
                    Please fix the following errors:
                </p>

                <ul class="list-inside list-disc space-y-1 text-sm text-red-600">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>

            </div>
        @endif


        <!-- Form -->
        <div class="rounded-xl bg-white p-6 shadow-sm ring-1 ring-gray-200 sm:p-8">

            <form
                action="{{ route('categories.update', $category) }}"
                method="POST"
                class="space-y-6"
            >

                @csrf
                @method('PUT')


                <!-- Category Name -->
                <div>

                    <label
                        for="name"
                        class="mb-2 block text-sm font-semibold text-gray-700"
                    >
                        Category Name
                    </label>

                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name', $category->name) }}"
                        placeholder="e.g. Appetizers"
                        required
                        class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm text-gray-900 outline-none transition placeholder:text-gray-400 focus:border-gray-900 focus:ring-2 focus:ring-gray-200"
                    >

                    @error('name')
                        <p class="mt-2 text-sm text-red-600">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                <!-- Description -->
                <div>

                    <label
                        for="description"
                        class="mb-2 block text-sm font-semibold text-gray-700"
                    >
                        Description
                    </label>

                    <textarea
                        id="description"
                        name="description"
                        rows="4"
                        placeholder="Enter a short description..."
                        class="w-full resize-none rounded-lg border border-gray-300 px-4 py-3 text-sm text-gray-900 outline-none transition placeholder:text-gray-400 focus:border-gray-900 focus:ring-2 focus:ring-gray-200"
                    >{{ old('description', $category->description) }}</textarea>

                    @error('description')
                        <p class="mt-2 text-sm text-red-600">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                <!-- Active Status -->
                <div class="rounded-lg border border-gray-200 bg-gray-50 p-4">

                    <label class="flex cursor-pointer items-start gap-3">

                        <input
                            type="checkbox"
                            name="is_active"
                            value="1"
                            {{ old('is_active', $category->is_active) ? 'checked' : '' }}
                            class="mt-1 h-4 w-4 rounded border-gray-300 text-gray-900 focus:ring-gray-500"
                        >

                        <span>

                            <span class="block text-sm font-semibold text-gray-800">
                                Active Category
                            </span>

                            <span class="mt-1 block text-sm text-gray-500">
                                Active categories can be displayed on the public restaurant menu.
                            </span>

                        </span>

                    </label>

                </div>


                <!-- Buttons -->
                <div class="flex flex-col-reverse gap-3 border-t border-gray-200 pt-6 sm:flex-row sm:justify-end">

                    <a
                        href="{{ route('categories.index') }}"
                        class="inline-flex items-center justify-center rounded-lg border border-gray-300 px-5 py-3 text-sm font-semibold text-gray-700 transition hover:bg-gray-50"
                    >
                        Cancel
                    </a>

                    <button
                        type="submit"
                        class="inline-flex items-center justify-center rounded-lg bg-gray-900 px-5 py-3 text-sm font-semibold text-white transition hover:bg-gray-700"
                    >
                        Update Category
                    </button>

                </div>

            </form>

        </div>

    </div>

</body>
</html>