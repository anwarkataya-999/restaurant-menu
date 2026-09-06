<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Menu Items</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="min-h-screen bg-gray-100 text-gray-800">

<div class="mx-auto max-w-6xl px-4 py-10 sm:px-6 lg:px-8">

    <!-- Header -->
    <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

        <div>

            <h1 class="text-3xl font-bold text-gray-900">
                Menu Items
            </h1>

            <p class="mt-1 text-sm text-gray-500">
                Manage your restaurant menu items.
            </p>

        </div>

        <a
            href="{{ route('menu-items.create') }}"
            class="inline-flex items-center justify-center rounded-lg bg-gray-900 px-5 py-3 text-sm font-semibold text-white transition hover:bg-gray-700"
        >
            + Add Menu Item
        </a>

    </div>


    <!-- Success Message -->
    @if(session('success'))

        <div class="mb-6 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700">
            {{ session('success') }}
        </div>

    @endif


    <!-- Validation Errors -->
    @if($errors->any())

        <div class="mb-6 rounded-lg border border-red-200 bg-red-50 p-4">

            <ul class="list-inside list-disc space-y-1 text-sm text-red-600">

                @foreach($errors->all() as $error)

                    <li>
                        {{ $error }}
                    </li>

                @endforeach

            </ul>

        </div>

    @endif


    <!-- Menu Items -->
    <div class="overflow-hidden rounded-xl bg-white shadow-sm ring-1 ring-gray-200">

        <div class="overflow-x-auto">

            <table class="min-w-full divide-y divide-gray-200">

                <thead class="bg-gray-50">

                    <tr>

                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                            Image
                        </th>

                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                            Item
                        </th>

                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                            Category
                        </th>

                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                            Price
                        </th>

                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                            Status
                        </th>

                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                            Actions
                        </th>

                    </tr>

                </thead>


                <tbody class="divide-y divide-gray-200 bg-white">

                    @forelse($menuItems as $menuItem)

                        <tr class="transition hover:bg-gray-50">

                            <!-- Image -->
                            <td class="px-6 py-4">

                                @if($menuItem->image)

                                    <img
                                        src="{{ asset('storage/' . $menuItem->image) }}"
                                        alt="{{ $menuItem->title }}"
                                        class="h-16 w-16 rounded-lg object-cover"
                                    >

                                @else

                                    <div class="flex h-16 w-16 items-center justify-center rounded-lg bg-gray-100">

                                        <span class="text-xs text-gray-400">
                                            No image
                                        </span>

                                    </div>

                                @endif

                            </td>


                            <!-- Item -->
                            <td class="max-w-xs px-6 py-4">

                                <div class="text-sm font-semibold text-gray-900">
                                    {{ $menuItem->title }}
                                </div>

                                @if($menuItem->description)

                                    <div class="mt-1 truncate text-sm text-gray-500">
                                        {{ $menuItem->description }}
                                    </div>

                                @endif

                            </td>


                            <!-- Category -->
                            <td class="whitespace-nowrap px-6 py-4">

                                <span class="text-sm text-gray-700">
                                    {{ $menuItem->category->name ?? '-' }}
                                </span>

                            </td>


                            <!-- Price -->
                            <td class="whitespace-nowrap px-6 py-4">

                                <span class="text-sm font-semibold text-gray-900">
                                    ${{ number_format($menuItem->price, 2) }}
                                </span>

                            </td>


                            <!-- Status -->
                            <td class="whitespace-nowrap px-6 py-4">

                                @if($menuItem->is_available)

                                    <span class="inline-flex rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">
                                        Available
                                    </span>

                                @else

                                    <span class="inline-flex rounded-full bg-red-100 px-3 py-1 text-xs font-semibold text-red-700">
                                        Unavailable
                                    </span>

                                @endif

                            </td>


                            <!-- Actions -->
                            <td class="whitespace-nowrap px-6 py-4">

                                <div class="flex items-center gap-2">

                                    <a
                                        href="{{ route('menu-items.edit', $menuItem) }}"
                                        class="rounded-lg bg-blue-50 px-3 py-2 text-xs font-semibold text-blue-600 transition hover:bg-blue-100"
                                    >
                                        Edit
                                    </a>


                                    <form
                                        action="{{ route('menu-items.destroy', $menuItem) }}"
                                        method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this menu item?');"
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
                                colspan="6"
                                class="px-6 py-12 text-center"
                            >

                                <div class="text-gray-500">

                                    <p class="text-lg font-semibold">
                                        No menu items found
                                    </p>

                                    <p class="mt-1 text-sm">
                                        Start by creating your first menu item.
                                    </p>

                                    <a
                                        href="{{ route('menu-items.create') }}"
                                        class="mt-4 inline-block text-sm font-semibold text-blue-600 hover:text-blue-800"
                                    >
                                        + Add Menu Item
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