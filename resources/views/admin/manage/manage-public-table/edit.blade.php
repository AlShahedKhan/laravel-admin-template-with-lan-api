<form action="{{ route('manage-public.update') }}" method="Post">
    @csrf
    <div class="modal-body">
        <div class="from-group">
            <label for="match_name">{{ ___('cricket.match_name') }}</label>
            <select class="form-control" name="team_id" required="">
                @foreach ($matchh as $row)
                    <option value="{{ $row->id }}" @if ($row->id==$data->match_id) selected="" @endif>{{ $row->team->team_name }} Vs {{ $row->team2->team_name }}</option>
                    {{-- <option value="{{ $row->id }}" @if ($row->id==$data->match_id) selected="" @endif>{{ $row->team_name }}</option> --}}
                @endforeach
            </select>
            <input type="hidden" name="id" value="{{ $data->id }}">
        </div>
        <div class="from-group">
            <label for="category_name">{{ ___('cricket.player_name') }}</label>
            <input type="text" class="form-control" name="player_name" value="{{ $data->player_name }}" required="">
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">{{ ___('common.close') }}</button>
        <button type="Submit" class="btn btn-primary">{{ ___('common.update') }}</button>
    </div>
</form>
