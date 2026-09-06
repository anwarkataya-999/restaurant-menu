<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Categories</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-gray-100 text-gray-800">

    <div class="mx-auto max-w-6xl px-4 py-10 sm:px-6 lg:px-8">

        <!-- Header -->
        <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

            <div>
                <h1 class="text-3xl font-bold text-gray-900">
                    Categories
                </h1>

                <p class="mt-1 text-sm text-gray-500">
                    Manage your restaurant categories
                </p>
            </div>

            <a
                href="{{ route('categories.create') }}"
                class="inline-flex items-center justify-center rounded-lg bg-gray-900 px-5 py-3 text-sm font-semibold text-white transition hover:bg-gray-700"
            >
                + Add Category
            </a>

        </div>


        <!-- Success Message -->
        @if(session('success'))

            <div class="mb-6 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700">
                {{ session('success') }}
            </div>

        @endif


        <!-- Categories Table -->
        <div class="overflow-hidden rounded-xl bg-white shadow-sm ring-1 ring-gray-200">

            <div class="overflow-x-auto">

                <table class="min-w-full divide-y divide-gray-200">

                    <thead class="bg-gray-50">

                        <tr>

                            <th
                                scope="col"
                                class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500"
                            >
                                #
                            </th>

                            <th
                                scope="col"
                                class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500"
                            >
                                Name
                            </th>

                            <th
                                scope="col"
                                class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500"
                            >
                                Description
                            </th>

                            <th
                                scope="col"
                                class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500"
                            >
                                Status
                            </th>

                            <th
                                scope="col"
                                class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500"
                            >
                                Actions
                            </th>

                        </tr>

                    </thead>


                    <tbody class="divide-y divide-gray-200 bg-white">

                        @forelse($categories as $category)

                            <tr class="transition hover:bg-gray-50">

                                <!-- ID -->
                                <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">
                                    {{ $category->id }}
                                </td>


                                <!-- Name -->
                                <td class="whitespace-nowrap px-6 py-4">

                                    <div class="text-sm font-semibold text-gray-900">
                                        {{ $category->name }}
                                    </div>

                                </td>


                                <!-- Description -->
                                <td class="max-w-xs px-6 py-4">

                                    <div class="truncate text-sm text-gray-600">
                                        {{ $category->description ?? '-' }}
                                    </div>

                                </td>


                                <!-- Status -->
                                <td class="whitespace-nowrap px-6 py-4">

                                    @if($category->is_active)

                                        <span class="inline-flex rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">
                                            Active
                                        </span>

                                    @else

                                        <span class="inline-flex rounded-full bg-red-100 px-3 py-1 text-xs font-semibold text-red-700">
                                            Inactive
                                        </span>

                                    @endif

                                </td>


                                <!-- Actions -->
                                <td class="whitespace-nowrap px-6 py-4">

                                    <div class="flex items-center gap-2">

                                        <!-- Edit -->
                                        <a
                                            href="{{ route('categories.edit', $category) }}"
                                            class="rounded-lg bg-blue-50 px-3 py-2 text-xs font-semibold text-blue-600 transition hover:bg-blue-100"
                                        >
                                            Edit
                                        </a>


                                        <!-- Delete -->
                                        <form
                                            action="{{ route('categories.destroy', $category) }}"
                                            method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this category?');"
                                        >

                                            @csrf

                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="rounded-lg bg-red-50 px-3 py-2 text-xs font-semibold text-red-600 transition hover:bg-red-100"
                                            >
                                                Delete
                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="5"
                                    class="px-6 py-12 text-center"
                                >

                                    <div class="text-gray-500">

                                        <p class="text-lg font-semibold">
                                            No categories found
                                        </p>

                                        <p class="mt-1 text-sm">
                                            Start by creating your first category.
                                        </p>

                                        <a
                                            href="{{ route('categories.create') }}"
                                            class="mt-4 inline-block text-sm font-semibold text-blue-600 hover:text-blue-800"
                                        >
                                            + Add Category
                                        </a>

                                    </div>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</body>
</html>