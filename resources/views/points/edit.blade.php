@extends('layouts.admin')

@section('admin_content')
    <div class="container">
        <h1>Edit Point</h1>
        <hr>

        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('points.update', $point->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="points">Points</label>
                        <input type="text" class="form-control" id="points" name="points" value="{{ $point->points }}">
                    </div>
                    <div class="form-group">
                        <label for="t20_bowler_points">t20_bowler_points</label>
                        <input type="text" class="form-control" id="t20_bowler_points" name="t20_bowler_points" value="{{ $point->t20_bowler_points }}">
                    </div>
                    <div class="form-group">
                        <label for="odi_batter_points">odi_batter_points</label>
                        <input type="text" class="form-control" id="odi_batter_points" name="odi_batter_points" value="{{ $point->odi_batter_points }}">
                    </div>
                    <div class="form-group">
                        <label for="odi_bowler_points">odi_bowler_points</label>
                        <input type="text" class="form-control" id="odi_bowler_points" name="odi_bowler_points" value="{{ $point->odi_bowler_points }}">
                    </div>
                    <div class="form-group">
                        <label for="test_batter_points">test_batter_points</label>
                        <input type="text" class="form-control" id="test_batter_points" name="test_batter_points" value="{{ $point->test_batter_points }}">
                    </div>
                    <div class="form-group">
                        <label for="test_bowler_points">test_bowler_points</label>
                        <input type="text" class="form-control" id="test_bowler_points" name="test_bowler_points" value="{{ $point->test_bowler_points }}">
                    </div>

                    <button type="submit" class="btn btn-primary">Update Point</button>
                </form>
            </div>
        </div>
    </div>
@endsection
