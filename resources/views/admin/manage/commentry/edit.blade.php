<form action="{{ route('commentry.update') }}" method="Post">
    @csrf
    <input type="hidden" name="id" value="{{ $data->id }}">
    <div class="modal-body">
        <div class="from-group">
            <label for="match_name">{{ ___('cricket.match_name') }}</label>
            <select class="form-control" readonly style="color: blue" name="match_id" required="">
                @foreach ($match as $row)
                    <option value="{{ $row->id }}" {{ $row->id==$data->match_id? "selected": ""}}>{{ $row->team->team_name }} - {{ $row->team2->team_name }}</option>
                @endforeach
            </select>
        </div>
        {{-- @dd($data->team->team_name) --}}
        <div class="from-group">
            <label for="team_name">{{ ___('cricket.team_name') }}</label>
            <select class="form-control" readonly style="color: blue" name="team_id" required="">
                <option value="{{ $data->team_id }}" selected>{{ $data->team->team_name }}</option>
            </select>
        </div>
        <div class="from-group">
            <label for="player_name">{{ ___('cricket.batter_name') }}</label>
            <select class="form-control" readonly  style="color: blue" name="player_id" required="">
                <option value="{{ $data->player_id }}" selected>{{ $data->player->player_name }}</option>
            </select>
        </div>
        <div class="from-group">
            <label for="bowler_team_name">{{ ___('cricket.bowler_team_name') }}</label>
            <select class="form-control" readonly style="color: blue" name="team2_id" id="team2_id" required="">
                <option value="{{ $data->team2_id }}" selected="">{{ $data->team2->team_name }}</option>
            </select>
        </div>
        <div class="from-group">
            <label for="player_name">{{ ___('cricket.bowler_name') }}</label>
            <select class="form-control" readonly  style="color: blue" name="player2_id" required="">
                <option value="{{ $data->player2_id }}" selected>{{ $data->player2->player_name }}</option>
            </select>
        </div>
        <div class="from-group">
            <label for="details">{{ ___('cricket.details') }}</label>
            <select class="form-control" name="details_id" required="">
                @foreach ($CommentryCreate as $row)
                    <option value="{{ $row->id }}" @if ($row->id==$data->details_id) selected="" @endif>{{ $row->details }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">{{ ___('common.close') }}</button>
        <button type="Submit" class="btn btn-primary">{{ ___('common.update') }}</button>
    </div>
</form>
