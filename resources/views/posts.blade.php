<x-layout>

    @include('_post-header') <!-- Asegúrate de que el archivo exista en resources/views -->

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        <x-post-featured-card />

        <div class="lg:grid lg:grid-cols-2 gap-6">
            <x-post-card />
            <x-post-card />
        </div>

        <div class="lg:grid lg:grid-cols-3 gap-6">
            <x-post-card />
            <x-post-card />
            <x-post-card />
        </div>
    </main>

</x-layout>



