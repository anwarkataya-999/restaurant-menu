<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Admin Dashboard</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-gray-100 text-gray-800">

    <!-- Navigation -->
    <nav class="border-b border-gray-200 bg-white">
        <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-4 sm:px-6 lg:px-8">

            <a
                href="{{ route('admin.dashboard') }}"
                class="text-xl font-bold text-gray-900"
            >
                Restaurant Admin
            </a>

            <div class="flex items-center gap-3">

                <a
                    href="{{ route('menu') }}"
                    target="_blank"
                    class="rounded-lg px-3 py-2 text-sm font-medium text-gray-600 transition hover:bg-gray-100 hover:text-gray-900"
                >
                    View Menu
                </a>

                <form
                    action="{{ route('logout') }}"
                    method="POST"
                >
                    @csrf

                    <button
                        type="submit"
                        class="rounded-lg bg-gray-900 px-4 py-2 text-sm font-semibold text-white transition hover:bg-gray-700"
                    >
                        Logout
                    </button>
                </form>

            </div>

        </div>
    </nav>


    <!-- Dashboard -->
    <main class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8">

        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">
                Dashboard
            </h1>

            <p class="mt-1 text-sm text-gray-500">
                Manage your restaurant menu.
            </p>
        </div>


        @if(session('success'))
            <div class="mb-6 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700">
                {{ session('success') }}
            </div>
        @endif


        <!-- Statistics -->
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">

            <!-- Categories -->
            <div class="rounded-xl bg-white p-6 shadow-sm ring-1 ring-gray-200">

                <p class="text-sm font-medium text-gray-500">
                    Categories
                </p>

                <p class="mt-2 text-3xl font-bold text-gray-900">
                    {{ $stats['categories'] }}
                </p>

                <a
                    href="{{ route('categories.index') }}"
                    class="mt-4 inline-block text-sm font-semibold text-gray-700 hover:text-gray-900"
                >
                    Manage Categories →
                </a>

            </div>


            <!-- Menu Items -->
            <div class="rounded-xl bg-white p-6 shadow-sm ring-1 ring-gray-200">

                <p class="text-sm font-medium text-gray-500">
                    Menu Items
                </p>

                <p class="mt-2 text-3xl font-bold text-gray-900">
                    {{ $stats['menu_items'] }}
                </p>

                <a
                    href="{{ route('menu-items.index') }}"
                    class="mt-4 inline-block text-sm font-semibold text-gray-700 hover:text-gray-900"
                >
                    Manage Menu Items →
                </a>

            </div>


            <!-- Available Items -->
            <div class="rounded-xl bg-white p-6 shadow-sm ring-1 ring-gray-200">

                <p class="text-sm font-medium text-gray-500">
                    Available Items
                </p>

                <p class="mt-2 text-3xl font-bold text-gray-900">
                    {{ $stats['available_items'] }}
                </p>

                <a
                    href="{{ route('menu-items.index') }}"
                    class="mt-4 inline-block text-sm font-semibold text-gray-700 hover:text-gray-900"
                >
                    View Menu Items →
                </a>

            </div>

        </div>


        <!-- Quick Actions -->
        <div class="mt-8 rounded-xl bg-white p-6 shadow-sm ring-1 ring-gray-200">

            <h2 class="text-lg font-bold text-gray-900">
                Quick Actions
            </h2>

            <div class="mt-4 flex flex-col gap-3 sm:flex-row">

                <a
                    href="{{ route('categories.create') }}"
                    class="inline-flex items-center justify-center rounded-lg bg-gray-900 px-5 py-3 text-sm font-semibold text-white transition hover:bg-gray-700"
                >
                    + Add Category
                </a>

                <a
                    href="{{ route('menu-items.create') }}"
                    class="inline-flex items-center justify-center rounded-lg border border-gray-300 px-5 py-3 text-sm font-semibold text-gray-700 transition hover:bg-gray-50"
                >
                    + Add Menu Item
                </a>

            </div>

        </div>

    </main>

</body>
</html>