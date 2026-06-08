@php
$bgImage = ($dataImage && $dataImage->count() > 0)
? asset('shop/products/'. $dataImage->first()->path)
: asset('shop/products/no_image.png');
@endphp

<div class="hero-product position-relative overflow-hidden rounded" style="
    background-image: url('{{ $bgImage }}') !important;
    background-color: #f8f9fa !important;
    background-size: contain !important; /* Pastikan gambar portrait masuk semua */
    background-repeat: no-repeat !important;
    background-position: center !important;
    aspect-ratio: 1 / 1 !important; /* Paksa bentuk kotak sempurna */
    height: auto !important; /* Timpa tinggi bawaan dari CSS lama */
    border: 1px solid #eaeaea;
">
    {{-- Gradien gelap di bagian bawah saja agar teks terbaca, gambar atas tetap terang --}}
    <div class="position-absolute bottom-0 start-0 w-100" style="
        height: 60%; 
        background: linear-gradient(180deg, rgba(0,0,0,0) 0%, rgba(0,0,0,0.85) 100%);
        z-index: 1;
    "></div>

    {{-- Konten Teks dan Tombol --}}
    <div class="d-flex flex-column justify-content-end h-100 p-3 position-relative" style="z-index: 2;">
        {{-- Teks dibatasi maksimal 2 baris agar rapi --}}
        <p class="text-white fw-bolder mb-2" style="
            font-size: 1rem; 
            text-shadow: 1px 1px 3px rgba(0,0,0,0.8);
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        ">
            {!! str_replace('-', ' ', ucwords($title)) !!}
        </p>

        <div>
            <x-molecules.button arrow="true" type="light" icon="bi-arrow-right" align="start" size="sm" link="{{ route('clientProductDetail', $title) }}" />
        </div>
    </div>
</div>