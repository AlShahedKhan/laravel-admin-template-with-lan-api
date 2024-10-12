@extends('layouts.publichome')

@section('admin_content')
    <div class="page-content">
        {{-- breadcrumb Area Start --}}
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <title>{{ ___('cricket.man_t_20_batter_ranking') }}</title>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">{{ ___('cricket.man_t_20_batter_ranking') }}</li>
                    </ol>
                </div>
            </div>
        </div>
        {{-- breadcrumb Area End --}}

        <!-- table content start -->
        <div class="table-content table-basic mt-20">
            <div class="card">
                <div class="card-body">
                    <!-- Add the two dropdowns -->
                    {{-- <div class="form-group">
                        <label for="selectYear">{{ ___('cricket.select_year') }}</label>
                        <select class="form-control" id="selectYear">
                            <option value="">-- {{ ___('cricket.select_year') }} --</option>
                            @foreach ($data['uniqueYears'] as $year)
                                <option value="{{ $year }}" @if ($selectedYear == $year) selected @endif>
                                    {{ $year }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="selectMonth">{{ ___('cricket.select_month') }}</label>
                        <select class="form-control" id="selectMonth">
                            <option value="">-- {{ ___('cricket.select_month') }} --</option>
                            @foreach ($data['uniqueMonths'] as $month)
                                <option value="{{ $month }}" @if ($selectedMonth == $month) selected @endif>
                                    {{ date('F', mktime(0, 0, 0, $month, 1)) }}
                                </option>
                            @endforeach
                        </select>
                    </div> --}}

                    <div class="table-responsive">
                        <table class="table table-bordered role-table" id="example1">
                            <thead class="thead">
                                <tr>
                                    <th class="serial">{{ ___('cricket.ranking') }}</th>
                                    <th class="purchase">{{ ___('cricket.team_name') }}</th>
                                    <th class="purchase">{{ ___('cricket.player_name') }}</th>
                                    <th class="purchase">{{ ___('cricket.points') }}</th>
                                </tr>
                            </thead>
                            <tbody class="tbody">
                                @php
                                    $counter = 1;
                                @endphp

                                @foreach ($data['rankings']->sortByDesc(function ($row) {
            return $row->point->points;
        }) as $row)
                                    {{-- @if ($row->man_women->man_women == 'm' && $row->year == $selectedYear && $row->month == $selectedMonth) --}}
                                        @php
                                            $teamName = $row->team->team_name;
                                            $playerName = $row->player->player_name;
                                            $points = $row->point->points;
                                            $year = $row->year;
                                            $month = date('F', mktime(0, 0, 0, $row->month, 1));
                                        @endphp
                                        <tr>
                                            <td>{{ ___('cricket.' . $counter) }}</td>
                                            <td>{{ ___('cricket.' . $teamName) }}</td>
                                            <td>{{ ___('cricket.' . $playerName) }}</td>
                                            <td>{{ ___('cricket.' . $points) }}</td>
                                            {{-- <td>{{ ___('cricket.' . $year) }}</td>
                                            <td>{{ ___('cricket.' . $month) }}</td> --}}
                                        </tr>
                                        @php
                                            $counter++;
                                        @endphp
                                    {{-- @endif --}}
                                @endforeach

                            </tbody>
                            <br>
                        </table>
                    </div>
                    <!-- table end -->
                </div>
            </div>
        </div>
        <!-- table content end -->
    </div>

    <!-- JavaScript code to handle dropdown change events and fetch data -->
    <script>
        $(document).ready(function() {
            function updateTableContent() {
                var selectedYear = $('#selectYear').val();
                var selectedMonth = $('#selectMonth').val();

                $.ajax({
                    url: "{{ route('T20BatterRanking') }}",
                    method: 'GET',
                    data: {
                        year: selectedYear,
                        month: selectedMonth
                    },
                    success: function(response) {
                        $('.tbody').html(response);
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText);
                    }
                });
            }

            $('#selectYear').change(function() {
                // Update the months dropdown based on the selected year
                var selectedYear = $(this).val();
                $.ajax({
                    url: "{{ route('getMonths') }}", // Replace with the actual route to fetch months based on the selected year
                    method: 'GET',
                    data: {
                        year: selectedYear
                    },
                    success: function(response) {
                        $('#selectMonth').html(response);
                        updateTableContent
                            (); // Fetch the filtered data after updating the months dropdown
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText);
                    }
                });
            });

            $('#selectMonth').change(function() {
                updateTableContent(); // Fetch the filtered data based on the selected year and month
            });

            $('#selectYear').trigger(
                'change'); // Trigger the change event initially to populate the months dropdown
        });
    </script>
@endsection
