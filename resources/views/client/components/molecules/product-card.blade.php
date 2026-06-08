<div class="col-md-3 col-6">
    <a href="{{ route('clientProductDetail', $title) }}">
        <div class="card mb-0 h-100"> <!-- Tambahkan h-100 agar tinggi semua card sejajar -->
            <div class="card-content">
                @if($image && $image->count() > 0)
                    @foreach ($image->take(1) as $item)
                        {{-- Kunci tinggi gambar (contoh 250px), gunakan object-fit: contain, dan beri padding + background agar elegan --}}
                        <img src="{{ asset('shop/products/'. $item->path) }}" alt="" class="card-img-top img-fluid" style="width: 100%; height: 250px; object-fit: contain; background-color: #f8f9fa; padding: 10px;">
                    @endforeach
                @else
                    <img src="{{ asset('shop/products/no_image.png') }}" alt="No Image" class="card-img-top img-fluid" style="width: 100%; height: 250px; object-fit: contain; background-color: #f8f9fa; padding: 10px;">
                @endif
                
                <div class="card-body p-md-3 p-2">
                    <p class="mb-0"><small>{!! str_replace('-', ' ', ucwords($category)) !!}</small></p>
                    <p class="fw-bolder product-title mb-1">{!! str_replace('-', ' ', ucwords($title)) !!}</p>
                    <p>$ {{ $price }}</p>
                </div>
            </div>
        </div>
    </a>
</div>