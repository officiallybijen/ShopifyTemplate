@extends('shopify-app::layouts.default')

@section('content')
    <div>
        <h1>Dashboard</h1>
        @if (!$settings->activated)
            @include('activate-modal')
        @endif
    </div>
@endsection

@section('scripts')
    @parent

    <script>
        actions.TitleBar.create(app, {
            title: 'Dashboard'
        });

        function setupTheme() {
            axios.get('/settings')
                .then(function(response) {
                    alert(response);
                })
                .catch(function(error) {
                    alert(error);
                })
        }
    </script>
@endsection
