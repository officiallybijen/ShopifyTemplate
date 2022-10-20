@extends('shopify-app::layouts.default')

@section('content')
    <div>
        <h1>Test</h1>
    </div>
@endsection

@section('scripts')
    @parent

    <script>
        actions.TitleBar.create(app, {
            title: 'Test'
        });
    </script>
@endsection
