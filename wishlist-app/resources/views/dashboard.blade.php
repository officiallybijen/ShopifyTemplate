@extends('shopify-app::layouts.default')

@section('content')
    <div>
        <h1>Dashboard</h1>
    </div>
@endsection

@section('scripts')
    @parent

    <script>
        actions.TitleBar.create(app, {
            title: 'Dashboard'
        });
    </script>
@endsection
