<option value="">{{ 'Select Player' }}</option>
@foreach ($players as $player)
    <option  value="{{$player->id}}">{{ $player->player_name }}</option>
@endforeach
