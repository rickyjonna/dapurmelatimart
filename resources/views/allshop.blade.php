@extends('index')

@section('main')
    <main id="content">
        <section class="py-8 page-title border-top mt-1">
            <div class="container">
                <h1 class="fs-40 mb-1 text-capitalize text-center">produk</h1>
            </div>
        </section>
        <section>
            <div class="container container-xxl">
                <div class="row mb-7 overflow-hidden">
                    @foreach ($products as $product)
                    <div class="col-sm-6 col-lg-3 mb-6">
                        <div class="card border-0">
                            <div style="background-image: url('images/{{ $product->group_photo }}')"
                                class="card-img ratio bg-img-cover-center ratio-1-1">
                            </div>
                            <div class="card-img-overlay d-flex py-4 py-sm-5 pl-6 pr-4">
                                <div class="d-flex flex-column">
                                    <a href="/{{ $product->first_id }}" class="font-weight-bold mb-1 d-block lh-12">{{ $product->brand->name }}</a>
                                    <a href="/{{ $product->first_id }}"
                                        class="text-uppercase text-muted letter-spacing-05 fs-12 font-weight-500">{{ $product->category->name }}</a>
                                    <p class="mt-auto text-primary mb-0 font-weight-500">
                                        Rp {{ $product->min_price }} - Rp {{ $product->max_price }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <nav class="pb-11 pb-lg-14 overflow-hidden">
                    <ul class="pagination justify-content-center align-items-center mb-0">
                        {{-- Previous Page Link --}}
                        @if ($products->onFirstPage())
                            <li class="page-item fs-12 d-none d-sm-block disabled">
                                <span class="page-link"><i class="far fa-angle-double-left"></i></span>
                            </li>
                        @else
                            <li class="page-item fs-12 d-none d-sm-block">
                                <a class="page-link" href="{{ $products->previousPageUrl() }}" tabindex="-1">
                                    <i class="far fa-angle-double-left"></i>
                                </a>
                            </li>
                        @endif
                
                        {{-- Pagination Elements --}}
                        @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                            @if ($page == $products->currentPage())
                                <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
                            @else
                                <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        @endforeach
                
                        {{-- Next Page Link --}}
                        @if ($products->hasMorePages())
                            <li class="page-item fs-12 d-none d-sm-block">
                                <a class="page-link" href="{{ $products->nextPageUrl() }}">
                                    <i class="far fa-angle-double-right"></i>
                                </a>
                            </li>
                        @else
                            <li class="page-item fs-12 d-none d-sm-block disabled">
                                <span class="page-link"><i class="far fa-angle-double-right"></i></span>
                            </li>
                        @endif
                    </ul>
                </nav>
            </div>
        </section>
    </main>
@endsection