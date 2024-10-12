<form action="{{ route('scorebowlersecond.update') }}" method="Post" class="score_add_form">
    @csrf
    <input type="hidden" name="id" value="{{ $data->id }}">

    <div class="row mb-3">
        <div class="col-md-12">
            <div class="row mb-3">
                <div class="col-sm-6 mb-3">
                    <label for="series_name">{{ ___('cricket.series_name') }}</label>
                    <select class="form-control" disabled="" style="color: blue" name="series_id" required="">
                        @foreach ($series as $row)
                            <option value="{{ $row->id }}" {{ $row->id == $data->series_id ? 'selected' : '' }}>
                                {{ $row->series_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="match_name">{{ ___('cricket.match_name') }}</label>
                    <select class="form-control" disabled="" style="color: blue" name="match_id" required="">
                        @foreach ($match as $row)
                            <option value="{{ $row->id }}" {{ $row->id == $data->match_id ? 'selected' : '' }}>
                                {{ $row->team->team_name }} - {{ $row->team2->team_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="team_name">{{ ___('cricket.team_name') }}</label>
                    <select class="form-control" disabled="" style="color: blue" name="team_id" required="">
                        <option value="{{ $data->team_id }}" selected>{{ $data->team->team_name }}</option>
                    </select>
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="player_name">{{ ___('cricket.player_name') }}</label>
                    <select class="form-control" disabled="" style="color: blue" name="player_id" required="">
                        <option value="{{ $data->player_id }}" selected>{{ $data->player->player_name }}</option>
                    </select>
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="overs">{{ ___('cricket.overs') }}</label>
                    <select class="form-control" name="overs_id" required="">
                        @foreach ($updatebowler as $row)
                            <option value="{{ $row->id }}" @if ($row->id == $data->overs_id) selected="" @endif>
                                {{ $row->overs }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="strick">{{ ___('cricket.strick') }}</label>
                    <select class="form-control" name="strick_id" required="">
                        @foreach ($updatebowler as $row)
                            <option value="{{ $row->id }}" @if ($row->id == $data->strick_id) selected="" @endif>
                                {{ $row->strick }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="maidens">{{ ___('cricket.maidens') }}</label>
                    <select class="form-control" name="maidens_id" required="">
                        @foreach ($updatebowler as $row)
                            <option value="{{ $row->id }}" @if ($row->id == $data->maidens_id) selected="" @endif>
                                {{ $row->maidens }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="runs">{{ ___('cricket.runs') }}</label>
                    <select class="form-control" name="runs_id" required="">
                        @foreach ($updatebowler as $row)
                            <option value="{{ $row->id }}" @if ($row->id == $data->runs_id) selected="" @endif>
                                {{ $row->runs }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="wickets">{{ ___('cricket.wickets') }}</label>
                    <select class="form-control" name="wickets_id" required="">
                        @foreach ($updatebowler as $row)
                            <option value="{{ $row->id }}" @if ($row->id == $data->wickets_id) selected="" @endif>
                                {{ $row->wickets }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="no_balls">{{ ___('cricket.no_balls') }}</label>
                    <select class="form-control" name="no_balls_id" required="">
                        @foreach ($updatebowler as $row)
                            <option value="{{ $row->id }}" @if ($row->id == $data->no_balls_id) selected="" @endif>
                                {{ $row->no_balls }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="wides">{{ ___('cricket.wides') }}</label>
                    <select class="form-control" name="wides_id" required="">
                        @foreach ($updatebowler as $row)
                            <option value="{{ $row->id }}" @if ($row->id == $data->wides_id) selected="" @endif>
                                {{ $row->wides }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="panalty_runs">{{ ___('cricket.panalty_runs') }}</label>
                    <select class="form-control" name="panalty_runs_id" required="">
                        @foreach ($updatebowler as $row)
                            <option value="{{ $row->id }}" @if ($row->id == $data->panalty_runs_id) selected="" @endif>
                                {{ $row->panalty_runs }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">{{ ___('common.close') }}</button>
                <button type="Submit" class="btn btn-primary">{{ ___('common.update') }}</button>
            </div>
        </div>
    </div>
</form>
