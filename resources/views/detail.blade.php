@extends('index')

@section('main')
    <main id="content">
        <section class="bg-color-3">
            <div class="container">
                <nav aria-label="breadcrumb" class="d-flex align-items-center justify-content-between">
                    <ol class="breadcrumb py-3 mr-6">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $product->category->name }}  {{ $product->brand->name }}</li>
                    </ol>
                </nav>
            </div>
        </section>

        <section class="pt-10 pb-lg-15 pb-11">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-md-7 mb-6 mb-md-0 pr-md-6 pr-lg-9">
                        <div class="galleries position-relative">
                            <div class="slick-slider slider-for"
                                data-slick-options='{"slidesToShow": 1, "autoplay":false,"dots":false,"arrows":false,"asNavFor": ".slider-nav"}'>
                                @php
                                    $uniquePhotos = [];
                                @endphp
                                @foreach ($relatedproducts as $produk)
                                    @if (!in_array($produk->photo, $uniquePhotos))
                                    <div class="box">
                                        <div class="card p-0 hover-change-image rounded-0 border-0">
                                            <a href="{{ asset('images/' . $produk->photo) }}"
                                                class="card-img ratio ratio-1-1 bg-img-cover-center" data-gtf-mfp="true"
                                                data-gallery-id="02"
                                                style="background-image:url('{{ asset('images/' . $produk->photo) }}')">
                                            </a>
                                        </div>
                                    </div>
                                    @php
                                        $uniquePhotos[] = $produk->photo;
                                    @endphp
                                    @endif
                                @endforeach
                            </div>
                            <div class="slick-slider slider-nav mt-1 mx-n1"
                                data-slick-options='{"slidesToShow": 4, "autoplay":false,"dots":false,"arrows":false,"asNavFor": ".slider-for","focusOnSelect": true,"responsive":[{"breakpoint": 768,"settings": {"slidesToShow": 3,"arrows":false}},{"breakpoint": 576,"settings": {"slidesToShow": 2,"arrows":false}}]}'>
                                @foreach ($uniquePhotos as $photo)   
                                    <div class="box px-0">
                                        <div class="bg-white p-1 h-100 rounded-0">
                                            <img src="images/{{ $photo }}" alt="Image 1" class="h-100 w-100">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <p class="text-muted fs-12 font-weight-500 letter-spacing-05 text-uppercase mb-3">{{ $product->category->name }}
                        </p>
                        <h2 class="fs-30 fs-lg-40 mb-2">{{ $product->brand->name }}</h2>
                        <p class="fs-20 text-primary mb-4" id="product-price">Rp {{ $product->price }}</p>
                        <div class="row">
                            <div class="col-sm-6 mb-4 form-group">
                                <label class="text-primary fs-16 font-weight-bold mb-3" for="volume">Pilih Ukuran: (ml)</label>
                                <select name="volume" class="form-control w-100" required id="volume">
                                    @foreach($relatedproducts->unique('volume.id') as $relatedProduct)
                                        <option value="{{ $relatedProduct->volume_id }}">{{ $relatedProduct->volume->quantity }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-6 mb-4 form-group">
                                <label class="text-primary fs-16 font-weight-bold mb-3" for="variant">Variant:
                                </label>
                                @if(count($relatedproducts) > 0 && $relatedproducts[0]->variant_id)
                                <select name="variant" class="form-control w-100" required id="variant">
                                    @foreach($relatedproducts->unique('variant.id') as $relatedProduct)
                                        <option value="{{ $relatedProduct->variant_id }}">{{ $relatedProduct->variant->description }}</option>
                                    @endforeach
                                </select>
                                @else
                                <input type="text" class="form-control" value="" readonly>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var volumeSelect = document.getElementById("volume");
            var variantSelect = document.getElementById("variant");
            var priceDisplay = document.getElementById("product-price");
    
            // Event listener untuk perubahan ukuran atau varian
            volumeSelect.addEventListener("change", updatePrice);
            variantSelect.addEventListener("change", updatePrice);
    
            function updatePrice() {
                // Pastikan volumeSelect dan variantSelect ada sebelum mengakses properti 'value'
                var selectedVolume = volumeSelect ? volumeSelect.value : null;
                var selectedVariant = variantSelect ? variantSelect.value : null;
    
                // Filter relatedproducts berdasarkan volume dan varian yang dipilih
                var selectedProduct = @json($relatedproducts->toArray()).find(function (product) {
                    return product.volume_id == selectedVolume && product.variant_id == selectedVariant;
                });
    
                // Tampilkan harga langsung dari volume atau varian yang dipilih
                if (selectedProduct) {
                    priceDisplay.innerText = "Rp " + selectedProduct.price;
                } else {
                    console.error("Product not found for selected volume and variant.");
                }

                // Menyembunyikan atau menonaktifkan opsi varian jika tidak ada varian yang tersedia
                if (variantSelect && variantSelect.options.length <= 1) {
                    // Hanya ada satu opsi (tanpa varian)
                    variantSelect.style.display = "none"; // menyembunyikan elemen
                    // atau
                    // variantSelect.disabled = true; // menonaktifkan pilihan
                }
            }
        });
    </script>
@endsection