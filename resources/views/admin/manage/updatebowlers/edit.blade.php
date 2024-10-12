<form action="{{ route('updatebowler.update') }}" method="Post">
    @csrf
    <div class="row mb-3">
        <div class="col-md-12">
            <div class="row mb-3">
                <div class="col-sm-6 mb-3">
                    <label for="overs">{{ ___('cricket.overs') }}</label>
                    <input type="hidden" name="id" value="{{ $data->id }}">
                    <input type="text" class="form-control" name="overs" value="{{ $data->overs }}"
                        required="">
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="strick">{{ ___('cricket.strick') }}</label>
                    <input type="hidden" name="id" value="{{ $data->id }}">
                    <input type="text" class="form-control" name="strick" value="{{ $data->strick }}"
                        required="">
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="maidens">{{ ___('cricket.maidens') }}</label>
                    <input type="hidden" name="id" value="{{ $data->id }}">
                    <input type="text" class="form-control" name="maidens" value="{{ $data->maidens }}"
                        required="">
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="runs">{{ ___('cricket.runs') }}</label>
                    <input type="hidden" name="id" value="{{ $data->id }}">
                    <input type="text" class="form-control" name="runs" value="{{ $data->runs }}"
                        required="">
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="wickets">{{ ___('cricket.wickets') }}</label>
                    <input type="hidden" name="id" value="{{ $data->id }}">
                    <input type="text" class="form-control" name="wickets" value="{{ $data->wickets }}"
                        required="">
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="no_balls">{{ ___('cricket.no_balls') }}</label>
                    <input type="hidden" name="id" value="{{ $data->id }}">
                    <input type="text" class="form-control" name="no_balls" value="{{ $data->no_balls }}"
                        required="">
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="wides">{{ ___('cricket.wides') }}</label>
                    <input type="hidden" name="id" value="{{ $data->id }}">
                    <input type="text" class="form-control" name="wides" value="{{ $data->wides }}"
                        required="">
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="panalty_runs">{{ ___('cricket.panalty_runs') }}</label>
                    <input type="hidden" name="id" value="{{ $data->id }}">
                    <input type="text" class="form-control" name="panalty_runs" value="{{ $data->panalty_runs }}"
                        required="">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">{{ ___('common.close') }}</button>
                <button type="Submit" class="btn btn-primary">{{ ___('common.update') }}</button>
            </div>
        </div>
    </div>
</form>
