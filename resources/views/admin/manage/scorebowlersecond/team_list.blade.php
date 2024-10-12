<option value="">{{ ___('cricket.select_team') }}</option>
@foreach ($teams as $team)
    <option  value="{{$team->id}}">{{ $team->team_name }}</option>
@endforeach
