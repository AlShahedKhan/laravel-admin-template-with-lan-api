<form action="{{ route('commentrycreate.update') }}" method="Post">
    @csrf
    <div class="modal-body">
        <div class="from-group mb-3">
            <label for="to">{{ ___('cricket.to') }}</label>
            <input type="hidden" name="id" value="{{ $data->id }}">
            <input type="text" class="form-control"  name="to" value="{{ $data->to }}" required="">
        </div>
        <div class="from-group mb-3">
            <label for="details">{{ ___('cricket.details') }}</label>
            <input type="hidden" name="id" value="{{ $data->id }}">
            <input type="text" class="form-control"  name="details" value="{{ $data->details }}" required="">
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">{{ ___('common.close') }}</button>
        <button type="Submit" class="btn btn-primary">{{ ___('common.update') }}</button>
    </div>
</form>
