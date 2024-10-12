<form action="{{ route('goalscores.update') }}" method="Post" class="score_add_form">
    @csrf
    <div class="row mb-3">
        <div class="col-md-12">
            <div class="row mb-3">
                <div class="col-sm-6 mb-3">
                    <label for="goal">{{ ___('football.goal') }}</label>
                    <input type="hidden" name="id" value="{{ $data->id }}">
                    <input type="text" class="form-control" name="goal" value="{{ $data->goal }}"
                        required="">
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="shots">{{ ___('football.shots') }}</label>
                    <input type="hidden" name="id" value="{{ $data->id }}">
                    <input type="text" class="form-control" name="shots" value="{{ $data->shots }}"
                        required="">
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="shots_on_target">{{ ___('football.shots_on_target') }}</label>
                    <input type="hidden" name="id" value="{{ $data->id }}">
                    <input type="text" class="form-control" name="shots_on_target"
                        value="{{ $data->shots_on_target }}" required="">
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="prossession">{{ ___('football.prossession') }}</label>
                    <input type="hidden" name="id" value="{{ $data->id }}">
                    <input type="text" class="form-control" name="prossession" value="{{ $data->prossession }}"
                        required="">
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="passes">{{ ___('football.passes') }}</label>
                    <input type="hidden" name="id" value="{{ $data->id }}">
                    <input type="text" class="form-control" name="passes" value="{{ $data->passes }}"
                        required="">
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="passes_accuracy">{{ ___('football.passes_accuracy') }}</label>
                    <input type="hidden" name="id" value="{{ $data->id }}">
                    <input type="text" class="form-control" name="passes_accuracy"
                        value="{{ $data->passes_accuracy }}" required="">
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="fouls">{{ ___('football.fouls') }}</label>
                    <input type="hidden" name="id" value="{{ $data->id }}">
                    <input type="text" class="form-control" name="fouls" value="{{ $data->fouls }}"
                        required="">
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="yellow_cards">{{ ___('football.yellow_cards') }}</label>
                    <input type="hidden" name="id" value="{{ $data->id }}">
                    <input type="text" class="form-control" name="yellow_cards" value="{{ $data->yellow_cards }}"
                        required="">
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="red_cards">{{ ___('football.red_cards') }}</label>
                    <input type="hidden" name="id" value="{{ $data->id }}">
                    <input type="text" class="form-control" name="red_cards" value="{{ $data->red_cards }}"
                        required="">
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="off_sides">{{ ___('football.off_sides') }}</label>
                    <input type="hidden" name="id" value="{{ $data->id }}">
                    <input type="text" class="form-control" name="off_sides" value="{{ $data->off_sides }}"
                        required="">
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="corners">{{ ___('football.corners') }}</label>
                    <input type="hidden" name="id" value="{{ $data->id }}">
                    <input type="text" class="form-control" name="corners" value="{{ $data->corners }}"
                        required="">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger"
                    data-dismiss="modal">{{ ___('common.close') }}</button>
                <button type="Submit" class="btn btn-primary">{{ ___('common.submit') }}</button>
            </div>
        </div>
    </div>
</form>
