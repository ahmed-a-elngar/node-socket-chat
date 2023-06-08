@extends('master.template')

@section('content')
    <div id="project_rooms" role="tabpanel" aria-labelledby="project_rooms_tab" class="mt-2">
        <div class="row my-4 col-12">
            <div class="card px-4  pt-4 col-12">
                <div class="row pb-3">

                    @include('chat.partials.sidebar')
                    @include('chat.partials.container')

                </div>
            </div>
        </div>
    </div>
    {{-- @include('messenger::partial.modals.new_room')
         @include('messenger::partial.modals.subscripers') --}}
@endsection

@section('js-scripts')
    <script>
        $.post("demo_test_post.asp", {
                name: "Donald Duck",
                city: "Duckburg"
            },
            function(data, status) {
                alert("Data: " + data + "\nStatus: " + status);
        });
    </script>
    <script src="{{ asset('js/custom/messenger.js') }}"></script>
@endsection
