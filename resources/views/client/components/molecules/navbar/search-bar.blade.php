<form action="{{ route('clientProductSearch') }}" class="search" method="GET">
  <input class="search__input" type="search" placeholder="Search" id="searchInput" name="product" onfocus="Onfocus(this)" onblur="Onblur(this)">
  <div class="search__icon-container">
    <label for="searchInput" class="search__label" aria-label="Search">
      <svg width="29" height="29" viewBox="0 0 29 29" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M28 28L21.8613 21.8503L28 28ZM25.2632 13.6316C25.2632 16.7165 24.0377 19.675 21.8563 21.8563C19.675 24.0377 16.7165 25.2632 13.6316 25.2632C10.5467 25.2632 7.58816 24.0377 5.40681 21.8563C3.22547 19.675 2 16.7165 2 13.6316C2 10.5467 3.22547 7.58816 5.40681 5.40681C7.58816 3.22547 10.5467 2 13.6316 2C16.7165 2 19.675 3.22547 21.8563 5.40681C24.0377 7.58816 25.2632 10.5467 25.2632 13.6316V13.6316Z" stroke="black" stroke-opacity="0.8" stroke-width="2.5" stroke-linecap="round" />
      </svg>
    </label>
    <button class="search__submit" aria-label="Search">
      <svg viewBox="0 0 1000 1000" title="Search">
        <path fill="currentColor" d="M408 745a337 337 0 1 0 0-674 337 337 0 0 0 0 674zm239-19a396 396 0 0 1-239 80 398 398 0 1 1 319-159l247 248a56 56 0 0 1 0 79 56 56 0 0 1-79 0L647 726z" />
      </svg>
    </button>
  </div>
</form>
<a href="{{ route('clientCarts') }}" class="text-decoration-none">
  <div class="cart">
    <span class="badge bg-dark count" id="cartCount">{{ count((array) session('cart')) }}</span>
    <i class="bi bi-cart2 mt-2"></i>
  </div>
</a>
{{-- Auth Area --}}
@auth
@if(Auth::user()->role !== 'admin')
<div class="dropdown" style="position:relative">
  <button class="d-flex align-items-center gap-2" style="background:none;border:none;cursor:pointer;padding:.25rem" data-bs-toggle="dropdown">
    @if(Auth::user()->profile_url)
    <img src="{{ Auth::user()->profile_url }}" class="rounded-circle" style="width:34px;height:34px;object-fit:cover;border:2px solid #ddd">
    @else
    <div style="width:34px;height:34px;background:#111;border-radius:50%;display:flex;align-items:center;justify-content:center;color:#fff;font-weight:700;font-size:.85rem">
      {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
    </div>
    @endif
    <span style="font-size:.85rem;font-weight:600;color:#222">{{ Auth::user()->name }}</span>
    <i class="bi bi-chevron-down" style="font-size:.7rem;color:#888"></i>
  </button>
  <ul class="dropdown-menu dropdown-menu-end">
    <li><span class="dropdown-item-text small text-muted">{{ Auth::user()->full_name ?? Auth::user()->email }}</span></li>
    <li>
      <hr class="dropdown-divider">
    </li>
    <li>
      <form method="POST" action="{{ route('clientLogout') }}">
        @csrf
        <button type="submit" class="dropdown-item text-danger">
          <i class="bi bi-box-arrow-right me-1"></i> Logout
        </button>
      </form>
    </li>
  </ul>
</div>
@endif
@else
<div class="d-flex gap-2">
  <a href="{{ route('clientLoginPage') }}" style="padding:.5rem 1rem;border:1.5px solid #111;border-radius:8px;font-size:.85rem;font-weight:700;color:#111;text-decoration:none">Masuk</a>
  <a href="{{ route('clientRegisterPage') }}" style="padding:.5rem 1rem;background:#111;border-radius:8px;font-size:.85rem;font-weight:700;color:#fff;text-decoration:none">Daftar</a>
</div>
@endauth