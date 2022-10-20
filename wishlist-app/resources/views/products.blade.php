@extends('shopify-app::layouts.default')

@section('content')
    <div class="flex">
        <div class="flex-1 w-64 ...">
            <h4>Wishlists</h4>
            <p>Lorem ipsum dolor sit amet consectetur  veritatis saepe soluta! Ipsam, voluptate aperiam.</p>
        </div>
        <div class="flex-1 w-32 ...">
            <img src="wishlist_img.png" alt="wishlist image" width="250px">
        </div>
    </div>

    @include('vendor.shopify-app.partials.wishlist-table')
@endsection

@section('scripts')
    @parent

    <script>
        actions.TitleBar.create(app, {
            title: 'Products'
        });
    </script>
@endsection
