<x-app-layout>
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    @endpush
    <div class="pagina">
        <<div class="banner"
            style="border-radius: 20px; overflow: hidden; width: 90%; margin: 0 auto; padding-top: 80px;">
            <img src="{{ asset('storage/banner.png') }}" alt="Banner"
                style="width: 100%; display: block; border-radius: inherit;">
    </div>

    </div>

</x-app-layout>
