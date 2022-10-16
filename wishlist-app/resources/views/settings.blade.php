@extends('shopify-app::layouts.default')

@section('content')
    <div>
        <h1>Settings</h1>
    </div>
@endsection

@section('scripts')
    @parent

    <script>
        actions.TitleBar.create(app, {
            title: 'Settings'
        });
    </script>
@endsection
