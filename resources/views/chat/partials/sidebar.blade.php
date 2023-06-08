<div class="col-2">
    <button class="btn bg-info float-right col-12 mb-2" data-toggle="modal" data-target="#new_room_modal">
        new
    </button>
    <div>
        <ul class="rooms-list border-top border-dark" id="current_rooms">
            @foreach ($rooms as $room)
                <li class="btn {{ getRandomBgColor(getBgColorsIndex('info')) }} my-2 py-2"
                    @if ($loop->iteration == 1) id = 'current_active_room' @endif>
                    <a data-id="{{ $room->room_id }}">
                        {{ $room->room_name }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
