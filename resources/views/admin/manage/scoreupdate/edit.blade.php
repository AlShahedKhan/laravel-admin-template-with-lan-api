<form action="{{ route('scoreupdates.update') }}" method="Post" class="score_add_form">
    @csrf
    <div class="row mb-3">
        <div class="col-md-12">
            <div class="row mb-3">
                <div class="col-sm-6 mb-3">
                    <label for="out_type">{{ ___('cricket.out_type') }}</label>
                    <input type="hidden" name="id" value="{{ $data->id }}">
                    <input type="text" class="form-control" name="out_type" value="{{ $data->out_type }}"
                        required="">
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="out_by_type">{{ ___('cricket.out_by_type') }}</label>
                    <input type="text" class="form-control" name="out_by_type" value="{{ $data->out_by_type }}"
                        required="">
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="one">{{ ___('cricket.one') }} </label>
                    <input type="text" class="form-control" name="one" value="{{ $data->one }}"
                        required="">
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="two">{{ ___('cricket.two') }}</label>
                    <input type="text" class="form-control" name="two" value="{{ $data->two }}"
                        required="">
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="three">{{ ___('cricket.three') }}</label>
                    <input type="text" class="form-control" name="three" value="{{ $data->three }}"
                        required="">
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="four">{{ ___('cricket.four') }}</label>
                    <input type="text" class="form-control" name="four" value="{{ $data->four }}"
                        required="">
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="six">{{ ___('cricket.six') }}</label>
                    <input type="text mb-3" class="form-control" name="six" value="{{ $data->six }}"
                        required="">
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="balls_played">{{ ___('cricket.balls') }}</label>
                    <input type="text" class="form-control" name="balls_played" value="{{ $data->balls_played }}"
                        required="">
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">{{ ___('common.close') }}</button>
            <button type="Submit" class="btn btn-primary">{{ ___('common.submit') }}</button>
        </div>
    </div>
    </div>
</form>
