@push('css')
    <link rel="stylesheet" href="{{ asset('client/components/molecules/hero/hero-product.css') }}">
@endpush

<div class="container pb-5">
    <x-molecules.hero.text-block />

    <div class="row g-md-4 g-3">
        @foreach ($dataProduct->take(4) as $item)
        {{-- Kita ubah class ini agar keempat card berukuran sama (4 kolom di PC, 2 kolom di HP) --}}
        <div class="col-lg-3 col-md-6 col-6">
            <x-molecules.hero.card-product :title="$item->title" :dataImage="$item->productImage"/>
        </div>
        @endforeach
    </div>
</div>