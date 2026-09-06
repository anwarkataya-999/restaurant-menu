<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Restaurant Menu</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="min-h-screen bg-gray-100 text-gray-800">

    <header class="bg-gray-900 text-white">

        <div class="mx-auto max-w-6xl px-4 py-10 sm:px-6 lg:px-8">

            <div class="text-center">

                <h1 class="text-4xl font-bold">
                    Our Menu
                </h1>

                <p class="mt-2 text-gray-300">
                    Discover our delicious dishes.
                </p>

            </div>

        </div>

    </header>


    <main class="mx-auto max-w-6xl px-4 py-10 sm:px-6 lg:px-8">

        @forelse($categories as $category)

            @if($category->menuItems->count())

                <section class="mb-12">

                    <div class="mb-6">

                        <h2 class="text-2xl font-bold text-gray-900">
                            {{ $category->name }}
                        </h2>

                        @if($category->description)
                            <p class="mt-1 text-sm text-gray-500">
                                {{ $category->description }}
                            </p>
                        @endif

                    </div>


                    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">

                        @foreach($category->menuItems as $item)

                            <article class="overflow-hidden rounded-xl bg-white shadow-sm ring-1 ring-gray-200">

                                @if($item->image)

                                    <img
                                        src="{{ asset('storage/' . $item->image) }}"
                                        alt="{{ $item->title }}"
                                        class="h-52 w-full object-cover"
                                    >

                                @else

                                    <div class="flex h-52 w-full items-center justify-center bg-gray-200">

                                        <span class="text-sm text-gray-500">
                                            No image
                                        </span>

                                    </div>

                                @endif


                                <div class="p-5">

                                    <div class="flex items-start justify-between gap-4">

                                        <h3 class="text-lg font-bold text-gray-900">
                                            {{ $item->title }}
                                        </h3>

                                        <span class="whitespace-nowrap text-lg font-bold text-gray-900">
                                            ${{ number_format($item->price, 2) }}
                                        </span>

                                    </div>


                                    @if($item->description)

                                        <p class="mt-3 text-sm leading-6 text-gray-600">
                                            {{ $item->description }}
                                        </p>

                                    @endif

                                </div>

                            </article>

                        @endforeach

                    </div>

                </section>

            @endif

        @empty

            <div class="rounded-xl bg-white p-10 text-center shadow-sm">

                <h2 class="text-xl font-bold text-gray-900">
                    Menu coming soon
                </h2>

                <p class="mt-2 text-sm text-gray-500">
                    There are currently no available menu items.
                </p>

            </div>

        @endforelse

    </main>

</body>

</html>