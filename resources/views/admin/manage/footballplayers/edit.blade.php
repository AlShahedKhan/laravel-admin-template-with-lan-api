<form action="{{ route('footballplayers.update') }}" method="Post">
    @csrf
    <div class="modal-body">
        <div class="from-group">
            <label for="team_name">{{ ___('cricket.team_name') }}</label>
            <select class="form-control" name="team_id" required="">
                @foreach ($team as $row)
                    <option value="{{ $row->id }}" @if ($row->id==$data->team_id) selected="" @endif>{{ $row->team_name }}</option>
                @endforeach
            </select>
            <input type="hidden" name="id" value="{{ $data->id }}">
        </div>
        <div class="from-group">
            <label for="category_name">{{ ___('cricket.player_name') }}</label>
            <input type="text" class="form-control" name="player_name" value="{{ $data->player_name }}" required="">
        </div>
        <div class="from-group">
            <label for="goals">{{ ___('cricket.goals') }}</label>
            <input type="text" class="form-control" name="goals" value="{{ $data->goals }}" required="">
        </div>
        <div class="from-group">
            <label for="assists">{{ ___('cricket.assists') }}</label>
            <input type="text" class="form-control" name="assists" value="{{ $data->assists }}" required="">
        </div>
        <div class="from-group">
            <label for="man_women">{{ ___('cricket.man_women') }}</label>
            <input type="text" class="form-control" name="man_women" value="{{ $data->man_women }}" required="">
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">{{ ___('common.close') }}</button>
        <button type="Submit" class="btn btn-primary">{{ ___('common.update') }}</button>
    </div>
</form>
