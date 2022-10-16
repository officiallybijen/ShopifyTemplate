@extends('shopify-app::layouts.default')

@section('content')
    <div>
        <h1>Customers</h1>
    </div>
@endsection

@section('scripts')
    @parent

    <script>
        actions.TitleBar.create(app, {
            title: 'Customers'
        });
    </script>
@endsection
