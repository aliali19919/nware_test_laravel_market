<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
                <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-6 text-center">
                    <h1 class="text-3xl font-bold dark:text-white"> Welcome to Market Dashboard 🚀</h1>
                    <p class="text-gray-600 dark:text-gray-300 mt-2">Manage your products and categories effortlessly
                        with our simple and intuitive interface. 🛍️📊</p>
                    <div class="mt-6 flex justify-center gap-6">
                        <a href="{{ route('products.index') }}"
                            class="text-lg font-medium btn btn-primary transition-all duration-300 hover:scale-110">Manage
                            Products</a>
                        <a href="{{ route('categories.index') }}"
                            class="text-lg font-medium btn btn-primary transition-all duration-300 hover:scale-110">Manage
                            Categories</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
