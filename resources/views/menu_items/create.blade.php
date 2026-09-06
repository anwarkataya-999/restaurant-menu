<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Add Menu Item</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="min-h-screen bg-gray-100 text-gray-800">

<div class="mx-auto max-w-3xl px-4 py-10 sm:px-6 lg:px-8">

    <div class="mb-8">

        <a
            href="{{ route('menu-items.index') }}"
            class="text-sm font-medium text-gray-500 hover:text-gray-900"
        >
            ← Back to Menu Items
        </a>

        <h1 class="mt-4 text-3xl font-bold text-gray-900">
            Add Menu Item
        </h1>

        <p class="mt-1 text-sm text-gray-500">
            Create a new restaurant menu item.
        </p>

    </div>


    @if($errors->any())

        <div class="mb-6 rounded-lg border border-red-200 bg-red-50 p-4">

            <ul class="list-inside list-disc space-y-1 text-sm text-red-600">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    <div class="rounded-xl bg-white p-6 shadow-sm ring-1 ring-gray-200 sm:p-8">

        <form
            action="{{ route('menu-items.store') }}"
            method="POST"
            enctype="multipart/form-data"
            class="space-y-6"
        >

            @csrf


            <div>

                <label
                    for="category_id"
                    class="mb-2 block text-sm font-semibold text-gray-700"
                >
                    Category
                </label>

                <select
                    id="category_id"
                    name="category_id"
                    required
                    class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm"
                >

                    <option value="">
                        Select category
                    </option>

                    @foreach($categories as $category)

                        <option
                            value="{{ $category->id }}"
                            {{ old('category_id') == $category->id ? 'selected' : '' }}
                        >
                            {{ $category->name }}
                        </option>

                    @endforeach

                </select>

            </div>


            <div>

                <label
                    for="title"
                    class="mb-2 block text-sm font-semibold text-gray-700"
                >
                    Title
                </label>

                <input
                    type="text"
                    id="title"
                    name="title"
                    value="{{ old('title') }}"
                    required
                    class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm"
                    placeholder="e.g. Chicken Burger"
                >

            </div>


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
                    class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm"
                    placeholder="Describe the menu item..."
                >{{ old('description') }}</textarea>

            </div>


            <div>

                <label
                    for="price"
                    class="mb-2 block text-sm font-semibold text-gray-700"
                >
                    Price
                </label>

                <input
                    type="number"
                    id="price"
                    name="price"
                    value="{{ old('price') }}"
                    min="0"
                    step="0.01"
                    required
                    class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm"
                    placeholder="10.00"
                >

            </div>


            <div>

                <label
                    for="image"
                    class="mb-2 block text-sm font-semibold text-gray-700"
                >
                    Image
                </label>

                <input
                    type="file"
                    id="image"
                    name="image"
                    accept="image/jpeg,image/png,image/jpg,image/webp"
                    class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm"
                >

                <p class="mt-2 text-xs text-gray-500">
                    Maximum size: 2MB. JPG, PNG, or WEBP.
                </p>

            </div>


            <div class="rounded-lg border border-gray-200 bg-gray-50 p-4">

                <label class="flex items-center gap-3">

                    <input
                        type="checkbox"
                        name="is_available"
                        value="1"
                        {{ old('is_available', true) ? 'checked' : '' }}
                        class="h-4 w-4"
                    >

                    <span class="text-sm font-semibold text-gray-800">
                        Available on public menu
                    </span>

                </label>

            </div>


            <div class="flex justify-end gap-3 border-t border-gray-200 pt-6">

                <a
                    href="{{ route('menu-items.index') }}"
                    class="rounded-lg border border-gray-300 px-5 py-3 text-sm font-semibold text-gray-700 hover:bg-gray-50"
                >
                    Cancel
                </a>

                <button
                    type="submit"
                    class="rounded-lg bg-gray-900 px-5 py-3 text-sm font-semibold text-white hover:bg-gray-700"
                >
                    Create Menu Item
                </button>

            </div>

        </form>

    </div>

</div>

</body>

</html>