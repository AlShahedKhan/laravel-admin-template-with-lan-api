<form action="{{ route('scorebattersecond.update') }}" method="Post" class="score_add_form">
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
                    <label for="out_type">{{ ___('cricket.out_type') }}</label>
                    <select class="form-control" name="scoreupdate_id" required="">
                        @foreach ($scoreupdate as $row)
                            <option value="{{ $row->id }}" @if ($row->id == $data->scoreupdate_id) selected="" @endif>
                                {{ $row->out_type }}</option>
                        @endforeach
                    </select>
                    <input type="hidden" name="id" value="{{ $data->id }}">
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="out_by_type">{{ ___('cricket.out_by_type') }}</label>
                    <select class="form-control" name="outby_id" required="">
                        @foreach ($scoreupdate as $row)
                            <option value="{{ $row->id }}" @if ($row->id == $data->outby_id) selected="" @endif>
                                {{ $row->out_by_type }}</option>
                        @endforeach
                    </select>
                    <input type="hidden" name="id" value="{{ $data->id }}">
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="one">{{ ___('cricket.one') }} </label>
                    <select class="form-control" name="one_id" required="">
                        @foreach ($scoreupdate as $row)
                            <option value="{{ $row->id }}" @if ($row->id == $data->one_id) selected="" @endif>
                                {{ $row->one }}</option>
                        @endforeach
                    </select>
                    <input type="hidden" name="id" value="{{ $data->id }}">
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="two">{{ ___('cricket.two') }}</label>
                    <select class="form-control" name="two_id" required="">
                        @foreach ($scoreupdate as $row)
                            <option value="{{ $row->id }}" @if ($row->id == $data->two_id) selected="" @endif>
                                {{ $row->two }}</option>
                        @endforeach
                    </select>
                    <input type="hidden" name="id" value="{{ $data->id }}">
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="three">{{ ___('cricket.three') }}</label>
                    <select class="form-control" name="three_id" required="">
                        @foreach ($scoreupdate as $row)
                            <option value="{{ $row->id }}" @if ($row->id == $data->three_id) selected="" @endif>
                                {{ $row->three }}</option>
                        @endforeach
                    </select>
                    <input type="hidden" name="id" value="{{ $data->id }}">
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="four">{{ ___('cricket.four') }}</label>
                    <select class="form-control" name="four_id" required="">
                        @foreach ($scoreupdate as $row)
                            <option value="{{ $row->id }}" @if ($row->id == $data->four_id) selected="" @endif>
                                {{ $row->four }}</option>
                        @endforeach
                    </select>
                    <input type="hidden" name="id" value="{{ $data->id }}">
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="six">{{ ___('cricket.six') }}</label>
                    <select class="form-control" name="six_id" required="">
                        @foreach ($scoreupdate as $row)
                            <option value="{{ $row->id }}" @if ($row->id == $data->six_id) selected="" @endif>
                                {{ $row->six }}</option>
                        @endforeach
                    </select>
                    <input type="hidden" name="id" value="{{ $data->id }}">
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="balls_played">{{ ___('cricket.balls') }}</label>
                    <select class="form-control" name="balls_played_id" required="">
                        @foreach ($scoreupdate as $row)
                            <option value="{{ $row->id }}" @if ($row->id == $data->balls_played_id) selected="" @endif>
                                {{ $row->balls_played }}</option>
                        @endforeach
                    </select>
                    <input type="hidden" name="id" value="{{ $data->id }}">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger"
                    data-dismiss="modal">{{ ___('common.close') }}</button>
                <button type="Submit" class="btn btn-primary">{{ ___('common.update') }}</button>
            </div>
        </div>
    </div>
</form>
