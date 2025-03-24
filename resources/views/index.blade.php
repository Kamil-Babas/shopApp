@extends('layouts.app')

@section('content')
    <div class="container pt-5" id="main_container">
        <div class="row">
            <div class="col-md-8 order-md-2 col-lg-9">
                <div class="container-fluid">
                    <div class="row mb-5">
                        <div class="col-12">
                            <div class="dropdown text-md-left text-center mb-3 mt-3 mt-md-0 mb-md-0 ml-auto" style="justify-self: left">
                                <label class="mr-2">Sort by:</label>
                                <a class="btn btn-lg btn-light dropdown-toggle" data-bs-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" id="active_sort_option">Name<span class="caret"></span></a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown" x-placement="bottom-start" style="position: absolute; transform: translate3d(71px, 48px, 0px); top: 0px; left: 0px; will-change: transform;">
                                    <a class="dropdown-item sort-option" data-sort-option="name">{{ $sortingCategories[0] }}</a>
                                    <a class="dropdown-item sort-option" data-sort-option="category">{{ $sortingCategories[1] }}</a>
                                    <a class="dropdown-item sort-option" data-sort-option="price_asc">{{ $sortingCategories[2] }}</a>
                                    <a class="dropdown-item sort-option" data-sort-option="price_desc">{{ $sortingCategories[3] }}</a>
                                    <a class="dropdown-item sort-option" data-sort-option="amount_asc">{{ $sortingCategories[4] }}</a>
                                    <a class="dropdown-item sort-option" data-sort-option="amount_desc">{{ $sortingCategories[5] }}</a>
                                </div>
                            </div>

                            <div class="dropdown" style="justify-self: end">
                                <a class="btn btn-lg btn-light dropdown-toggle product-actual-count" data-bs-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">10<span class="caret"></span></a>
                                <div class="dropdown-menu dropdown-menu-right product-count" aria-labelledby="navbarDropdown" x-placement="bottom-end" style="will-change: transform; position: absolute; transform: translate3d(120px, 48px, 0px); top: 0px; left: 0px;">
                                    <a class="dropdown-item" href="#">10</a>
                                    <a class="dropdown-item" href="#">15</a>
                                    <a class="dropdown-item" href="#">20</a>
                                    <a class="dropdown-item" href="#">30</a>
                                    <a class="dropdown-item" href="#">50</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row" id="products-wrapper">

                        @foreach($products as $product)
                            <div class="col-6 col-md-6 col-lg-4 mb-3">
                                <div class="card h-100 border-0">
                                    <div class="card-img-top">
                                        @if(isset($product->image_path))
                                            <img src="{{asset('storage/' . $product->image_path)}}" loading="lazy" class="img-fluid mx-auto d-block" alt="Card image cap">
                                        @else
                                            <img loading="lazy" src="{{ $defaultImage }}" width="240" height="240" class="img-fluid mx-auto d-block" alt="Card image cap">
                                        @endif
                                    </div>
                                    <div class="card-body text-center">
                                        <h4 class="card-title">
                                            <a href="{{route('products.show', $product->id)}}" class=" font-weight-bold text-dark text-uppercase small">{{ $product->name }}</a>
                                        </h4>

                                        <h5 class="card-price small text-black fs-6">
                                            <i>
                                                <strong class="text-warning">PLN </strong> <span class="fw-bolder">{{$product->price}} </span>
                                            </i>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>


                    <div class="row sorting mb-5 mt-5">
                        <div class="col-12 d-flex flex-row justify-content-between">
                            <a class="btn btn-light" href="#main_container">
                                <i class="fas fa-arrow-up mr-2"></i> Back to top</a>
                            <div class="btn-group float-md-right ml-3" id="products_pagination_nav">
                                {{ $products->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <form class="col-md-4 order-md-1 col-lg-3 sidebar-filter" id="productsForm">
                <h3 class="mt-0 mb-5">{{ __("shop.product.showing") }} <span class="text-primary" id="productsToShow">{{ count($products) }}</span> {{ __("shop.product.products") }}</h3>
                <h6 class="text-uppercase font-weight-bold mb-3">{{ __("shop.product.categories") }}</h6>

                @foreach($categories as $category)
                    <div class="mt-2 mb-2 pl-2">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="filter[categories][]" id="{{ "category" . $category->id }}" value="{{ $category->id }}">
                            <label class="custom-control-label" for="{{ "category" . $category->id }}">{{ $category->name }}</label>
                        </div>
                    </div>
                @endforeach

                <div class="divider mt-5 mb-5 border-bottom border-secondary"></div>
                <h6 class="text-uppercase mt-5 mb-3 font-weight-bold">{{ __('shop.product.price') }}</h6>
                <div class="price-filter-control">
                    <input type="number" class="form-control w-50 pull-left mb-2" placeholder="50" name="filter[priceMin]" id="price-min-control">
                    <input type="number" class="form-control w-50 pull-right" placeholder="150" name="filter[priceMax]" id="price-max-control">
                </div>
{{--                <div class="divider mt-5 mb-4 border-bottom border-secondary"></div>--}}
                <a href="#" id="filterButton" class="btn btn-lg btn-block btn-primary mt-5">{{ __('shop.product.filter_products') }}</a>
            </form>

        </div>
    </div>
@endsection


@section('javascript_variables')
    const imageStoragePath = '{{ asset('storage') }}/'
    const defaultImage = '{{ $defaultImage }}'
@endsection

@push('javascript_files')
    @vite('resources/js/index.js')
@endpush

