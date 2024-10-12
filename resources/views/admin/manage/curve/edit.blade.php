<form action="{{ route('curve.update') }}" method="Post">
    @csrf
    <input type="hidden" name="id" value="{{ $data->id }}">

    <div class="modal-body">
        <div class="from-group">
            <label for="match_name">{{ ___('cricket.match_name') }}</label>
            <select class="form-control" disabled="" style="color: blue" name="match_id" required="">
                @foreach ($match as $row)
                    <option value="{{ $row->id }}" {{ $row->id==$data->match_id? "selected": ""}}>{{ $row->team->team_name }} - {{ $row->team2->team_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="from-group">
            <label for="team_name">{{ ___('cricket.team_name') }}</label>
            <select class="form-control" disabled="" style="color: blue" name="team_id" required="">
                <option value="{{ $data->team_id }}" selected>{{ $data->team->team_name }}</option>
            </select>
        </div>
        <div class="from-group">
            <label for="runs">{{ ___('cricket.runs') }}</label>
            <input type="text" class="form-control" name="runs" value="{{ $data->runs }}" required="">
        </div>

    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">{{ ___('common.close') }}</button>
        <button type="Submit" class="btn btn-primary">{{ ___('common.update') }}</button>
    </div>
</form>
