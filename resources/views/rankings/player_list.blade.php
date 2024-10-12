<option value="">{{ ___('cricket.select_player') }}</option>
@foreach ($players as $player)
    <option  value="{{$player->id}}">{{ $player->player_name }}</option>
@endforeach
