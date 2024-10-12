{{-- <form action="{{ route('footballmatchs.update') }}" method="Post">
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
            <label for="match_name">{{ ___('cricket.match_name') }}</label>
            <input type="text" class="form-control" name="match_name" value="{{ $data->match_name }}" required="">
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">{{ ___('common.close') }}</button>
        <button type="Submit" class="btn btn-primary">{{ ___('common.update') }}</button>
    </div>
</form> --}}
