<div id="messenger_header" class="col-12 border-bottom border-dark pb-3 px-0">
    <i class="mdi mdi-wechat text-primary mr-2"></i>
    @if (count($rooms) > 0)
        {{ $rooms[0]['room_name'] }}
    @endif

    @include('chat.partials.container.three_dots_menu')
</div>
