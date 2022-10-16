@extends('shopify-app::layouts.default')

@section('content')
    <div>
        <h1>Products</h1>
    </div>
@endsection

@section('scripts')
    @parent

    <script>
        actions.TitleBar.create(app, {
            title: 'Products'
        });
    </script>
@endsection
