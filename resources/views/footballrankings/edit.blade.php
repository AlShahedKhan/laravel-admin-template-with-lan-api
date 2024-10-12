<form action="{{ route('footballrankings.update') }}" method="POST" class="score_add_form">
    @csrf
    <div class="col-md-12">
        <div class="row mb-3">
            <div class="col-sm-6 mb-3">
                <label for="team_name">{{ ___('cricket.team_name') }}</label>
                <select class="form-control" name="team_id" required="" disabled>
                    @foreach ($teams as $row)
                        <option value="{{ $row->id }}" @if (isset($data) && $row->id == $data->team_id) selected="" @endif>
                            {{ $row->team_name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-6 mb-3">
                <label for="player_name">{{ ___('cricket.player_name') }}</label>
                <select class="form-control" name="player_id" required="" disabled>
                    <option value="{{ $data->player_id }}" selected>{{ $data->player->player_name }}</option>
                </select>
            </div>
            <div class="col-sm-6 mb-3">
                <label for="man_women_id">{{ ___('cricket.man_women') }}</label>
                <select class="form-control" name="man_women_id" required="">
                    @php
                        $fetchedManWomen = [];
                    @endphp
                    @foreach ($players as $player)
                        @if (!in_array($player->man_women, $fetchedManWomen))
                            @php
                                $fetchedManWomen[] = $player->man_women;
                            @endphp
                            <option value="{{ $player->id }}" @if ($player->id == $data->man_women_id) selected @endif>
                                {{ $player->man_women }}
                            </option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="col-sm-6 mb-3">
                <label for="man_ranking">{{ ___('cricket.man_ranking') }}</label>
                <select class="form-control" name="man_points_id" required="">
                    @foreach ($points as $point)
                        <option value="{{ $point->id }}" @if ($point->id == $data->man_points_id) selected @endif>
                            {{ $point->points }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-6 mb-3">
                <label for="woman_ranking">{{ ___('cricket.woman_ranking') }}</label>
                <select class="form-control" name="woman_points_id" required="">
                    @foreach ($points as $point)
                        <option value="{{ $point->id }}" @if ($point->id == $data->woman_points_id) selected @endif>
                            {{ $point->points }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-6 mb-3">
                <label for="year">{{ ___('cricket.year') }}</label>
                <input type="number" class="form-control" name="year" min="1900" max="2099"
                    value="{{ $data->year }}" required>
            </div>

            <div class="col-sm-6 mb-3">
                <label for="month">{{ ___('cricket.month') }}</label>
                <select class="form-control" name="month" required>
                    @for ($i = 1; $i <= 12; $i++)
                        <option value="{{ $i }}" @if ($i == $data->month) selected @endif>
                            {{ date('F', mktime(0, 0, 0, $i, 1)) }}</option>
                    @endfor
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">{{ ___('common.close') }}</button>
                <button type="submit" class="btn btn-primary">{{ ___('common.update') }}</button>
            </div>
        </div>
    </div>
    <input type="hidden" name="id" value="{{ $data->id }}">
</form>
