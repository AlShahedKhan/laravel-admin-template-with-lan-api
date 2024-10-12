<aside class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <div class="sidebar-logo">
            <a href="{{ route('cricket') }}">
                <input type="hidden" name="global_light_logo" id="global_light_logo"
                    value="{{ @globalAsset(setting('light_logo'), '154x38.png') }}" />
                <input type="hidden" name="global_dark_logo" id="global_dark_logo"
                    value="{{ @globalAsset(setting('dark_logo'), '154x38.png') }}" />

                <img id="sidebar_full_logo" class="full-logo setting-image"
                    src="{{ userTheme() == 'default-theme' ? @globalAsset(setting('light_logo'), '154x38.png') : @globalAsset(setting('dark_logo'), '154x38.png') }}"
                    alt="" />

                <img class="half-logo" src="{{ globalAsset(setting('favicon'), '38x38.png') }}" alt="" />
            </a>
        </div>

        <button class="half-expand-toggle sidebar-toggle">
            <img src="{{ asset('backend') }}/assets/images/icons/collapse-arrow.svg" alt="" />
        </button>
        <button class="close-toggle sidebar-toggle">
            <img src="{{ asset('backend') }}/assets/images/icons/collapse-arrow.svg" alt="" />
        </button>
    </div>



    <div class="sidebar-menu srollbar">
        <div class="sidebar-menu-section">

            <ul class="sidebar-dropdown-menu parent-menu-list">
                <li class="sidebar-menu-item">
                    <a href="#" class="parent-item-content has-arrow">
                        <i class="fa-solid fa-calculator"></i>
                        <span class="on-half-expanded">{{ ___('cricket.cricket') }}</span>
                    </a>
                    <ul class="child-menu-list">
                        <li class="sidebar-menu-item {{ set_menu(['/']) }}">
                            <a href="{{ url('/') }}">{{ ___('cricket.score_commentary') }}</a>
                        </li>
                        <li class="sidebar-menu-item {{ set_menu(['cricketTeamStatus']) }}">
                            <a href="{{ route('cricketTeamStatus') }}">{{ ___('cricket.man_teams') }}</a>
                        </li>
                        <li class="sidebar-menu-item {{ set_menu(['cricketWomenTeamStatus']) }}">
                            <a href="{{ route('cricketWomenTeamStatus') }}">{{ ___('cricket.women_teams') }}</a>
                        </li>
                        <li class="sidebar-menu-item {{ set_menu(['series']) }}">
                            <a href="{{ route('series') }}">{{ ___('cricket.series_matchs') }}</a>
                        </li>
                        <li class="sidebar-menu-item {{ set_menu(['getSeriesTeamList']) }}">
                            <a href="{{ route('getSeriesTeamList') }}">{{ ___('cricket.series_teams') }}</a>
                        </li>
                        <li class="sidebar-menu-item {{ set_menu(['shedule']) }}">
                            <a href="{{ route('shedule') }}">{{ ___('cricket.shedule') }}</a>
                        </li>
                        <li class="sidebar-menu-item {{ set_menu(['arcive']) }}">
                            <a href="{{ route('arcive') }}">{{ ___('cricket.arcive') }}</a>
                        </li>
                        {{-- Man Ranking Start --}}
                        <li class="sidebar-menu-item {{ set_menu(['T20Ranking']) }}">
                            <a href="{{ route('T20Ranking') }}">{{ ___('cricket.man_t_20_teams_ranking') }}</a>
                        </li>
                        <li class="sidebar-menu-item {{ set_menu(['OdiRanking']) }}">
                            <a href="{{ route('OdiRanking') }}">{{ ___('cricket.man_odi_teams_ranking') }}</a>
                        </li>
                        <li class="sidebar-menu-item {{ set_menu(['TestRanking']) }}">
                            <a href="{{ route('TestRanking') }}">{{ ___('cricket.man_test_teams_ranking') }}</a>
                        </li>
                        <li class="sidebar-menu-item {{ set_menu(['T20BatterRanking']) }}">
                            <a href="{{ route('T20BatterRanking') }}">{{ ___('cricket.man_t_20_batter_ranking') }}</a>
                        </li>
                        <li class="sidebar-menu-item {{ set_menu(['T20BowlerRanking']) }}">
                            <a href="{{ route('T20BowlerRanking') }}">{{ ___('cricket.man_t_20_bowler_ranking') }}</a>
                        </li>
                        <li class="sidebar-menu-item {{ set_menu(['OdiBatterRanking']) }}">
                            <a href="{{ route('OdiBatterRanking') }}">{{ ___('cricket.man_odi_batter_ranking') }}</a>
                        </li>
                        <li class="sidebar-menu-item {{ set_menu(['OdiBowlerRanking']) }}">
                            <a href="{{ route('OdiBowlerRanking') }}">{{ ___('cricket.man_odi_bowler_ranking') }}</a>
                        </li>
                        <li class="sidebar-menu-item {{ set_menu(['TestBatterRanking']) }}">
                            <a href="{{ route('TestBatterRanking') }}">{{ ___('cricket.man_test_batter_ranking') }}</a>
                        </li>
                        <li class="sidebar-menu-item {{ set_menu(['TestBowlerRanking']) }}">
                            <a href="{{ route('TestBowlerRanking') }}">{{ ___('cricket.man_test_bowler_ranking') }}</a>
                        </li>
                        {{-- Man Ranking End --}}

                        {{-- Women Ranking Start --}}
                        <li class="sidebar-menu-item {{ set_menu(['wT20Ranking']) }}">
                            <a href="{{ route('wT20Ranking') }}">{{ ___('cricket.women_t_20_teams_ranking') }}</a>
                        </li>
                        <li class="sidebar-menu-item {{ set_menu(['wOdiRanking']) }}">
                            <a href="{{ route('wOdiRanking') }}">{{ ___('cricket.women_odi_teams_ranking') }}</a>
                        </li>
                        <li class="sidebar-menu-item {{ set_menu(['wTestRanking']) }}">
                            <a href="{{ route('wTestRanking') }}">{{ ___('cricket.women_test_teams_ranking') }}</a>
                        </li>
                        <li class="sidebar-menu-item {{ set_menu(['WT20BatterRanking']) }}">
                            <a href="{{ route('WT20BatterRanking') }}">{{ ___('cricket.w_t_20_batter_ranking') }}</a>
                        </li>
                        <li class="sidebar-menu-item {{ set_menu(['WT20BowlerRanking']) }}">
                            <a href="{{ route('WT20BowlerRanking') }}">{{ ___('cricket.w_t_20_bowler_ranking') }}</a>
                        </li>
                        <li class="sidebar-menu-item {{ set_menu(['WOdiBatterRanking']) }}">
                            <a href="{{ route('WOdiBatterRanking') }}">{{ ___('cricket.w_odi_batter_ranking') }}</a>
                        </li>
                        <li class="sidebar-menu-item {{ set_menu(['WOdiBowlerRanking']) }}">
                            <a href="{{ route('WOdiBowlerRanking') }}">{{ ___('cricket.w_odi_bowler_ranking') }}</a>
                        </li>
                        <li class="sidebar-menu-item {{ set_menu(['WTestBatterRanking']) }}">
                            <a href="{{ route('WTestBatterRanking') }}">{{ ___('cricket.w_test_batter_ranking') }}</a>
                        </li>
                        <li class="sidebar-menu-item {{ set_menu(['WTestBowlerRanking']) }}">
                            <a href="{{ route('WTestBowlerRanking') }}">{{ ___('cricket.w_test_bowler_ranking') }}</a>
                        </li>
                        {{-- Women Ranking End --}}
                    </ul>
                </li>
            </ul>

            <ul class="sidebar-dropdown-menu parent-menu-list">
                <li class="sidebar-menu-item">
                    <a href="#" class="parent-item-content has-arrow">
                        <i class="fa-regular fa-futbol"></i>
                        <span class="on-half-expanded">{{ ___('cricket.football') }}</span>
                    </a>
                    <ul class="child-menu-list">
                        <li class="sidebar-menu-item {{ set_menu(['football_scores']) }}">
                            <a href="{{ url('football_scores') }}">{{ ___('cricket.score') }}</a>
                        </li>
                        <li class="sidebar-menu-item {{ set_menu(['footballTeamStatus']) }}">
                            <a href="{{ route('footballTeamStatus') }}">{{ ___('cricket.man_teams') }}</a>
                        </li>
                        <li class="sidebar-menu-item {{ set_menu(['footballWomenTeamStatus']) }}">
                            <a href="{{ route('footballWomenTeamStatus') }}">{{ ___('cricket.women_teams') }}</a>
                        </li>
                        <li class="sidebar-menu-item {{ set_menu(['leagues']) }}">
                            <a href="{{ route('leagues') }}">{{ ___('football.leagues_matchs') }}</a>
                        </li>
                        <li class="sidebar-menu-item {{ set_menu(['getleaguesTeamList']) }}">
                            <a href="{{ route('getleaguesTeamList') }}">{{ ___('football.leagues_teams') }}</a>
                        </li>
                        <li class="sidebar-menu-item {{ set_menu(['footballTeamManRankings']) }}">
                            <a href="{{ route('footballTeamManRankings') }}">{{ ___('football.football_team_man_ranking_status') }}</a>
                        </li>
                        <li class="sidebar-menu-item {{ set_menu(['footballTeamWomenRankings']) }}">
                            <a href="{{ route('footballTeamWomenRankings') }}">{{ ___('football.football_team_women_ranking_status') }}</a>
                        </li>
                        <li class="sidebar-menu-item {{ set_menu(['FootballManRanking']) }}">
                            <a href="{{ route('FootballManRanking') }}">{{ ___('football.man_ranking') }}</a>
                        </li>
                        <li class="sidebar-menu-item {{ set_menu(['FootballWomanRanking']) }}">
                            <a href="{{ route('FootballWomanRanking') }}">{{ ___('football.woman_ranking') }}</a>
                        </li>
                        <li class="sidebar-menu-item {{ set_menu(['FootballShedule']) }}">
                            <a href="{{ route('FootballShedule') }}">{{ ___('cricket.shedule') }}</a>
                        </li>
                        <li class="sidebar-menu-item {{ set_menu(['FootballArcive']) }}">
                            <a href="{{ route('FootballArcive') }}">{{ ___('cricket.arcive') }}</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!--Football Featurs End -->

            <!-- News layout start -->
            <ul class="sidebar-dropdown-menu parent-menu-list">
                <li class="sidebar-menu-item {{ set_menu(['news']) }}">
                    <a href="{{ route('news') }}" class="parent-item-content">
                        <i class="fa-solid fa-newspaper"></i>
                        <span class="on-half-expanded">{{ ___('cricket.news') }}</span>
                    </a>
                </li>
            </ul>
            <!-- news layout end -->
        </div>
    </div>
</aside>
