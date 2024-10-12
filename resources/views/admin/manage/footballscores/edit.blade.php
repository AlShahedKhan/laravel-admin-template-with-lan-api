<form action="{{ route('footballscores.update') }}" method="Post">
    @csrf
    <input type="hidden" name="id" value="{{ $data->id }}">
    <div class="col-md-12">
        <div class="row mb-3">
            <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                <label for="match_name">{{ ___('cricket.match_name') }}</label>
                <select class="form-control" style="color: blue" name="match_id" required="">
                    @foreach ($match as $row)
                        <option value="{{ $row->id }}" {{ $row->id == $data->match_id ? 'selected' : '' }}>
                            {{ $row->team->team_name }} - {{ $row->team2->team_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                <label for="team_name">{{ ___('cricket.team_name') }}</label>
                <select class="form-control" style="color: blue" name="team_id" required="">
                    <option value="{{ $data->team_id }}" selected>{{ $data->team->team_name }}</option>
                </select>
            </div>
            <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                <label for="goal">{{ ___('cricket.goal') }}</label>
                <select class="form-control" name="goal_id" required="">
                    @foreach ($goalScores as $row)
                        <option value="{{ $row->id }}" @if ($row->id == $data->goal_id) selected="" @endif>
                            {{ $row->goal }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                <label for="shots">{{ ___('cricket.shots') }}</label>
                <select class="form-control" name="shots_id" required="">
                    @foreach ($goalScores as $row)
                        <option value="{{ $row->id }}" @if ($row->id == $data->shots_id) selected="" @endif>
                            {{ $row->shots }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                <label for="shots_on_target">{{ ___('cricket.shots_on_target') }}</label>
                <select class="form-control" name="shots_on_target_id" required="">
                    @foreach ($goalScores as $row)
                        <option value="{{ $row->id }}" @if ($row->id == $data->shots_on_target_id) selected="" @endif>
                            {{ $row->shots_on_target }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                <label for="prossession">{{ ___('cricket.prossession') }}</label>
                <select class="form-control" name="prossession_id" required="">
                    @foreach ($goalScores as $row)
                        <option value="{{ $row->id }}" @if ($row->id == $data->prossession_id) selected="" @endif>
                            {{ $row->prossession }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                <label for="passes">{{ ___('cricket.passes') }}</label>
                <select class="form-control" name="passes_id" required="">
                    @foreach ($goalScores as $row)
                        <option value="{{ $row->id }}" @if ($row->id == $data->passes_id) selected="" @endif>
                            {{ $row->passes }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                <label for="passes_accuracy">{{ ___('cricket.passes_accuracy') }}</label>
                <select class="form-control" name="passes_accuracy_id" required="">
                    @foreach ($goalScores as $row)
                        <option value="{{ $row->id }}" @if ($row->id == $data->passes_accuracy_id) selected="" @endif>
                            {{ $row->passes_accuracy }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                <label for="fouls">{{ ___('cricket.fouls') }}</label>
                <select class="form-control" name="fouls_id" required="">
                    @foreach ($goalScores as $row)
                        <option value="{{ $row->id }}" @if ($row->id == $data->fouls_id) selected="" @endif>
                            {{ $row->fouls }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                <label for="yellow_cards">{{ ___('cricket.yellow_cards') }}</label>
                <select class="form-control" name="yellow_cards_id" required="">
                    @foreach ($goalScores as $row)
                        <option value="{{ $row->id }}" @if ($row->id == $data->yellow_cards_id) selected="" @endif>
                            {{ $row->yellow_cards }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                <label for="red_cards">{{ ___('cricket.red_cards') }}</label>
                <select class="form-control" name="red_cards_id" required="">
                    @foreach ($goalScores as $row)
                        <option value="{{ $row->id }}" @if ($row->id == $data->red_cards_id) selected="" @endif>
                            {{ $row->red_cards }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                <label for="off_sides">{{ ___('cricket.off_sides') }}</label>
                <select class="form-control" name="off_sides_id" required="">
                    @foreach ($goalScores as $row)
                        <option value="{{ $row->id }}" @if ($row->id == $data->off_sides_id) selected="" @endif>
                            {{ $row->off_sides }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                <label for="corners">{{ ___('cricket.corners') }}</label>
                <select class="form-control" name="corners_id" required="">
                    @foreach ($goalScores as $row)
                        <option value="{{ $row->id }}" @if ($row->id == $data->corners_id) selected="" @endif>
                            {{ $row->corners }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                <label for="team_name">{{ ___('cricket.team_name') }}</label>
                <select class="form-control" style="color: blue" name="team2_id" required="">
                    <option value="{{ $data->team2_id }}" selected>{{ $data->team2->team_name }}</option>
                </select>
            </div>
            <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                <label for="goal">{{ ___('cricket.goal') }}</label>
                <select class="form-control" name="goal2_id" required="">
                    @foreach ($goalScores as $row)
                        <option value="{{ $row->id }}" @if ($row->id == $data->goal2_id) selected="" @endif>
                            {{ $row->goal }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                <label for="shots">{{ ___('cricket.shots') }}</label>
                <select class="form-control" name="shots2_id" required="">
                    @foreach ($goalScores as $row)
                        <option value="{{ $row->id }}" @if ($row->id == $data->shots2_id) selected="" @endif>
                            {{ $row->shots }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                <label for="shots_on_target">{{ ___('cricket.shots_on_target') }}</label>
                <select class="form-control" name="shots_on_target2_id" required="">
                    @foreach ($goalScores as $row)
                        <option value="{{ $row->id }}" @if ($row->id == $data->shots_on_target2_id) selected="" @endif>
                            {{ $row->shots_on_target }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                <label for="prossession">{{ ___('cricket.prossession') }}</label>
                <select class="form-control" name="prossession2_id" required="">
                    @foreach ($goalScores as $row)
                        <option value="{{ $row->id }}" @if ($row->id == $data->prossession2_id) selected="" @endif>
                            {{ $row->prossession }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                <label for="passes">{{ ___('cricket.passes') }}</label>
                <select class="form-control" name="passes2_id" required="">
                    @foreach ($goalScores as $row)
                        <option value="{{ $row->id }}" @if ($row->id == $data->passes2_id) selected="" @endif>
                            {{ $row->passes }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                <label for="passes_accuracy">{{ ___('cricket.passes_accuracy') }}</label>
                <select class="form-control" name="passes_accuracy2_id" required="">
                    @foreach ($goalScores as $row)
                        <option value="{{ $row->id }}" @if ($row->id == $data->passes_accuracy2_id) selected="" @endif>
                            {{ $row->passes_accuracy }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                <label for="fouls">{{ ___('cricket.fouls') }}</label>
                <select class="form-control" name="fouls2_id" required="">
                    @foreach ($goalScores as $row)
                        <option value="{{ $row->id }}" @if ($row->id == $data->fouls2_id) selected="" @endif>
                            {{ $row->fouls }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                <label for="yellow_cards">{{ ___('cricket.yellow_cards') }}</label>
                <select class="form-control" name="yellow_cards2_id" required="">
                    @foreach ($goalScores as $row)
                        <option value="{{ $row->id }}" @if ($row->id == $data->yellow_cards2_id) selected="" @endif>
                            {{ $row->yellow_cards }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                <label for="red_cards">{{ ___('cricket.red_cards') }}</label>
                <select class="form-control" name="red_cards2_id" required="">
                    @foreach ($goalScores as $row)
                        <option value="{{ $row->id }}" @if ($row->id == $data->red_cards2_id) selected="" @endif>
                            {{ $row->red_cards }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                <label for="off_sides">{{ ___('cricket.off_sides') }}</label>
                <select class="form-control" name="off_sides2_id" required="">
                    @foreach ($goalScores as $row)
                        <option value="{{ $row->id }}" @if ($row->id == $data->off_sides2_id) selected="" @endif>
                            {{ $row->off_sides }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-12 col-md-6 col-xl-6 col-lg-6 mb-3">
                <label for="corners">{{ ___('cricket.corners') }}</label>
                <select class="form-control" name="corners2_id" required="">
                    @foreach ($goalScores as $row)
                        <option value="{{ $row->id }}" @if ($row->id == $data->corners2_id) selected="" @endif>
                            {{ $row->corners }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">{{ ___('common.close') }}</button>
        <button type="Submit" class="btn btn-primary">{{ ___('common.update') }}</button>
    </div>
</form>
