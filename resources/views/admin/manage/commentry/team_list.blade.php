<option value="">{{ 'Select Team' }}</option>
@foreach ($teams as $team)
    <option  value="{{$team->id}}">{{ $team->team_name }}</option>
@endforeach
