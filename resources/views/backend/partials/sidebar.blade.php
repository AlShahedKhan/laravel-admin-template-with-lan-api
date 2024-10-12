<aside class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <div class="sidebar-logo">
            <a href="{{ route('dashboard') }}">
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
            <!--Admin Tools Start -->
            <h6 class="sidebar-menu-section-heading">
                {{ ___('common.admin') }} <span class="on-half-expanded"> {{ ___('cricket.tools') }}</span>
            </h6>
            <!--Admin Tools End -->

            <!-- parent menu list start  -->
            <ul class="sidebar-dropdown-menu parent-menu-list">
                @if (hasPermission('dashboard_read'))
                    <li class="sidebar-menu-item {{ set_menu(['dashboard']) }}">
                        <a href="{{ route('dashboard') }}" class="parent-item-content">
                            {{-- <img src="{{ asset('backend') }}/assets/images/icons/notification-status.svg" alt="Dashboard" /> --}}
                            <i class="las la-tachometer-alt"></i>
                            <span class="on-half-expanded">{{ ___('common.dashboard') }}</span>
                        </a>
                    </li>
                @endif
                @if (hasPermission('user_read') || hasPermission('role_read'))
                    <li class="sidebar-menu-item {{ set_menu(['users*', 'roles*']) }}">
                        <a class="parent-item-content has-arrow">
                            {{-- <img src="{{ asset('backend') }}/assets/images/icons/clipboard.svg" alt="Dashboard" /> --}}
                            <i class="las la-user-tag"></i>
                            <span class="on-half-expanded">{{ ___('common.users_&_roles') }}</span>
                        </a>

                        <!-- second layer child menu list start  -->

                        <ul class="child-menu-list">
                            @if (hasPermission('role_read'))
                                <li class="sidebar-menu-item {{ set_menu(['roles*']) }}">
                                    <a href="{{ route('roles.index') }}">{{ ___('users_roles.roles') }}</a>
                                </li>
                            @endif
                            @if (hasPermission('user_read'))
                                <li class="sidebar-menu-item {{ set_menu(['users*']) }}">
                                    <a href="{{ route('users.index') }}">{{ ___('users_roles.users') }}</a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif

                <!-- second layer child menu list end  -->

                <!-- Language layout start -->
                @if (hasPermission('language_read'))
                    <li class="sidebar-menu-item {{ set_menu(['languages*']) }}">
                        <a href="{{ route('languages.index') }}" class="parent-item-content">
                            <i class="las la-language"></i>
                            <span class="on-half-expanded">{{ ___('language.languages') }}</span>
                        </a>
                    </li>
                @endif
                <!-- Language layout end -->

                <!-- Settings layout start -->
                @if (hasPermission('general_settings_read') ||
                        hasPermission('storage_settings_read') ||
                        hasPermission('recaptcha_settings_read') ||
                        hasPermission('email_settings_read'))
                    <li class="sidebar-menu-item {{ set_menu(['setting*']) }}">
                        <a href="#" class="parent-item-content has-arrow">
                            <i class="las la-cog"></i>
                            <span class="on-half-expanded">{{ ___('common.settings') }}</span>
                        </a>

                        <!-- second layer child menu list start  -->
                        <ul class="child-menu-list">
                            @if (hasPermission('general_settings_read'))
                                <li class="sidebar-menu-item {{ set_menu(['settings.general-settings']) }}">
                                    <a
                                        href="{{ route('settings.general-settings') }}">{{ ___('settings.general_settings') }}</a>
                                </li>
                            @endif

                            @if (hasPermission('storage_settings_read'))
                                <li class="sidebar-menu-item {{ set_menu(['settings.storagesetting']) }}">
                                    <a
                                        href="{{ route('settings.storagesetting') }}">{{ ___('settings.storage_settings') }}</a>
                                </li>
                            @endif

                            @if (hasPermission('recaptcha_settings_read'))
                                <li class="sidebar-menu-item {{ set_menu(['settings.recaptcha-setting']) }}">
                                    <a
                                        href="{{ route('settings.recaptcha-setting') }}">{{ ___('settings.recaptcha_settings') }}</a>
                                </li>
                            @endif

                            @if (hasPermission('email_settings_read'))
                                <li class="sidebar-menu-item {{ set_menu(['settings.mail-setting']) }}">
                                    <a
                                        href="{{ route('settings.mail-setting') }}">{{ ___('settings.email_settings') }}</a>
                                </li>
                            @endif
                        </ul>
                        <!-- second layer child menu list end  -->
                    </li>
                @endif
                <!-- Settings layout end -->

                <!-- Components Layout End -->
            </ul>
            <!-- parent menu list end  -->

            <!--Cricket Start -->
            <h6 class="sidebar-menu-section-heading">
                {{ ___('cricket.cricket') }} <span class="on-half-expanded">{{ ___('cricket.tools') }}</span>
            </h6>
            <!--Cricket End -->

            <!-- parent menu list start  -->
            <ul class="sidebar-dropdown-menu parent-menu-list">
                @if (hasPermission('score_read') || hasPermission('scorebowlerfirst_read'))
                    <!--First Innings Start -->
                    <li class="sidebar-menu-item">
                        <a href="#" class="parent-item-content has-arrow">
                            <i class="fa-solid fa-calculator"></i>
                            <span class="on-half-expanded">{{ ___('cricket.first_innings') }}</span>
                        </a>
                        <ul class="child-menu-list">
                            @if (hasPermission('score_read'))
                                <li class="sidebar-menu-item {{ set_menu(['score.index']) }}">
                                    <a href="{{ route('score.index') }}">{{ ___('cricket.batter_first') }}</a>
                                </li>
                            @endif
                            @if (hasPermission('scorebowlerfirst_read'))
                                <li class="sidebar-menu-item {{ set_menu(['scorebowlerfirst.index']) }}">
                                    <a
                                        href="{{ route('scorebowlerfirst.index') }}">{{ ___('cricket.bowler_first') }}</a>
                                </li>
                            @endif
                        </ul>
                    </li>
                    <!--First Innings End -->
                @endif

                <!--Second Innings Start -->
                @if (hasPermission('scorebattersecond_read') || hasPermission('scorebowlersecond_read'))
                    <li class="sidebar-menu-item">
                        <a href="#" class="parent-item-content has-arrow">
                            <i class="fa-solid fa-calculator"></i>
                            <span class="on-half-expanded">{{ ___('cricket.second_innings') }} </span>
                        </a>
                        <ul class="child-menu-list">
                            @if (hasPermission('scorebattersecond_read'))
                                <li class="sidebar-menu-item {{ set_menu(['scorebattersecond.index']) }}">
                                    <a
                                        href="{{ route('scorebattersecond.index') }}">{{ ___('cricket.batter_second') }}</a>
                                </li>
                            @endif
                            @if (hasPermission('scorebowlersecond_read'))
                                <li class="sidebar-menu-item {{ set_menu(['scorebowlersecond.index']) }}">
                                    <a
                                        href="{{ route('scorebowlersecond.index') }}">{{ ___('cricket.bowler_second') }}</a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif
                <!--Second Innings End -->

                <!-- Matchs start -->
                @if (hasPermission('matchh_read'))
                    <li class="sidebar-menu-item {{ set_menu(['matchh.index']) }}">
                        <a href="{{ route('matchh.index') }}" class="parent-item-content">
                            <i class="fa-solid fa-equals"></i>
                            <span class="on-half-expanded">{{ ___('cricket.matchs') }}</span>
                        </a>
                    </li>
                @endif
                <!--Matchs End -->

                <!-- Teams start -->
                @if (hasPermission('team_read'))
                    <li class="sidebar-menu-item {{ set_menu(['teams.index']) }}">
                        <a href="{{ route('teams.index') }}" class="parent-item-content">
                            <i class="fa-solid fa-people-group"></i>
                            <span class="on-half-expanded">{{ ___('cricket.teams') }}</span>
                        </a>
                    </li>
                @endif
                <!--Teams End -->

                <!-- Player start -->
                @if (hasPermission('player_read'))
                    <li class="sidebar-menu-item {{ set_menu(['player.index']) }}">
                        <a href="{{ route('player.index') }}" class="parent-item-content">
                            <i class="fa-solid fa-person"></i>
                            <span class="on-half-expanded">{{ ___('cricket.players') }}</span>
                        </a>
                    </li>
                @endif
                <!--Player End -->



                <!--Score Update Start -->
                @if (hasPermission('scoreupdates_read') || hasPermission('updatebowler_read'))
                    <li class="sidebar-menu-item">
                        <a href="#" class="parent-item-content has-arrow">
                            <i class="fa-solid fa-newspaper"></i>
                            <span class="on-half-expanded">{{ ___('cricket.score_update') }} </span>
                        </a>
                        <ul class="child-menu-list">
                            @if (hasPermission('scoreupdates_read'))
                                <li class="sidebar-menu-item {{ set_menu(['scoreupdates.index']) }}">
                                    <a href="{{ route('scoreupdates.index') }}">{{ ___('cricket.batter') }}</a>
                                </li>
                            @endif
                            @if (hasPermission('updatebowler_read'))
                                <li class="sidebar-menu-item {{ set_menu(['updatebowler.index']) }}">
                                    <a href="{{ route('updatebowler.index') }}">{{ ___('cricket.bowler') }}</a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif
                <!--Score Update End -->

                <!--Commentry Start -->
                @if (hasPermission('commentry_read') || hasPermission('commentrycreate_read'))
                    <li class="sidebar-menu-item">
                        <a href="#" class="parent-item-content has-arrow">
                            <i class="fa-solid fa-microphone"></i>
                            <span class="on-half-expanded">{{ ___('cricket.commentry') }} </span>
                        </a>
                        <ul class="child-menu-list">
                            @if (hasPermission('commentry_read'))
                                <li class="sidebar-menu-item {{ set_menu(['commentry.index']) }}">
                                    <a href="{{ route('commentry.index') }}">{{ ___('cricket.commentry') }}</a>
                                </li>
                            @endif
                            @if (hasPermission('commentrycreate_read'))
                                <li class="sidebar-menu-item {{ set_menu(['commentrycreate.index']) }}">
                                    <a
                                        href="{{ route('commentrycreate.index') }}">{{ ___('cricket.commentry_create') }}</a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif
                <!--Commentry End -->

                <!--Curve Start -->
                @if (hasPermission('managepublictable_read'))
                    <li class="sidebar-menu-item">
                        <a href="#" class="parent-item-content has-arrow">
                            <i class="fa-solid fa-chart-simple"></i>
                            <span class="on-half-expanded">{{ ___('cricket.manage_table') }} </span>
                        </a>
                        <ul class="child-menu-list">
                            <li class="sidebar-menu-item {{ set_menu(['manage-public.index']) }}">
                                <a href="{{ route('manage-public.index') }}">{{ ___('cricket.manage_table') }}</a>
                            </li>
                        </ul>
                    </li>
                @endif
                <!--Curve End -->

                <!-- shedule start -->
                {{-- @if (hasPermission('matchh_read')) --}}
                <li class="sidebar-menu-item {{ set_menu(['shedule']) }}">
                    <a href="{{ route('shedule') }}" class="parent-item-content">
                        <i class="fa-solid fa-equals"></i>
                        <span class="on-half-expanded">{{ ___('cricket.shedule') }}</span>
                    </a>
                </li>
                {{-- @endif --}}
                <!--shedule End -->

                <!-- arcive start -->
                {{-- @if (hasPermission('matchh_read')) --}}
                <li class="sidebar-menu-item {{ set_menu(['arcive']) }}">
                    <a href="{{ route('arcive') }}" class="parent-item-content">
                        <i class="fa-solid fa-equals"></i>
                        <span class="on-half-expanded">{{ ___('cricket.arcive') }}</span>
                    </a>
                </li>
                {{-- @endif --}}
                <!--arcive End -->

                <!-- points start -->
                @if (hasPermission('point_read'))
                    <li class="sidebar-menu-item {{ set_menu(['points.index']) }}">
                        <a href="{{ route('points.index') }}" class="parent-item-content">
                            <i class="fa-solid fa-equals"></i>
                            <span class="on-half-expanded">{{ ___('cricket.points.index') }}</span>
                        </a>
                    </li>
                @endif
                <!--points End -->

                <!-- rankings start -->
                @if (hasPermission('ranking_read'))
                    <li class="sidebar-menu-item {{ set_menu(['rankings.index']) }}">
                        <a href="{{ route('rankings.index') }}" class="parent-item-content">
                            <i class="fa-solid fa-equals"></i>
                            <span class="on-half-expanded">{{ ___('cricket.rankings') }}</span>
                        </a>
                    </li>
                @endif
                <!--rankings End -->

                <!-- Series start -->
                @if (hasPermission('series_read'))
                    <li class="sidebar-menu-item {{ set_menu(['series.index']) }}">
                        <a href="{{ route('series.index') }}" class="parent-item-content">
                            <i class="fa-solid fa-equals"></i>
                            <span class="on-half-expanded">{{ ___('cricket.series') }}</span>
                        </a>
                    </li>
                @endif
                <!--Series End -->

                <!-- News start -->
                @if (hasPermission('news_read'))
                    <li class="sidebar-menu-item {{ set_menu(['news.index']) }}">
                        <a href="{{ route('news.index') }}" class="parent-item-content">
                            <i class="fa-solid fa-equals"></i>
                            <span class="on-half-expanded">{{ ___('cricket.news') }}</span>
                        </a>
                    </li>
                @endif
                <!--News End -->

                <!--Score Start -->
                <li class="sidebar-menu-item">
                    <a href="{{ url('/') }}" class="parent-item-content ">
                        <i class="fa-solid fa-house-user"></i>
                        <span class="on-half-expanded">{{ ___('cricket.cricket') }} </span>
                    </a>
                </li>
                <!--Score End -->

                <!-- third layer child menu list End  -->
            </ul>
            <!-- parent menu list end  -->

            <!--Static Tools Start -->
            <h6 class="sidebar-menu-section-heading">
                {{ ___('football.football') }} <span class="on-half-expanded">{{ ___('football.tools') }}</span>
            </h6>
            <!--Static Tools End -->

            <!-- parent menu list start  -->
            <ul class="sidebar-dropdown-menu parent-menu-list">

                <!-- Teams start -->
                @if (hasPermission('football_team_read'))
                    <li class="sidebar-menu-item {{ set_menu(['footballteams.index']) }}">
                        <a href="{{ route('footballteams.index') }}" class="parent-item-content">
                            <i class="fa-solid fa-people-group"></i>
                            <span class="on-half-expanded">{{ ___('football.football_teams') }}</span>
                        </a>
                    </li>
                @endif
                <!--Teams End -->

                <!--Leagues start -->
                @if (hasPermission('leagues_read'))
                    <li class="sidebar-menu-item {{ set_menu(['leagues.index']) }}">
                        <a href="{{ route('leagues.index') }}" class="parent-item-content">
                            <i class="fa-solid fa-people-group"></i>
                            <span class="on-half-expanded">{{ ___('football.leagues') }}</span>
                        </a>
                    </li>
                @endif

                <!--Leagues End -->

                <!-- Football players start -->
                @if (hasPermission('football_players_read'))
                    <li class="sidebar-menu-item {{ set_menu(['footballplayers.index']) }}">
                        <a href="{{ route('footballplayers.index') }}" class="parent-item-content">
                            <i class="fa-solid fa-person"></i>
                            <span class="on-half-expanded">{{ ___('football.football_players') }}</span>
                        </a>
                    </li>
                @endif
                <!--Football players End -->

                <!-- Goal Score start -->
                @if (hasPermission('goal_scores_read'))
                    <li class="sidebar-menu-item {{ set_menu(['goalscores.index']) }}">
                        <a href="{{ route('goalscores.index') }}" class="parent-item-content">
                            <i class="fa-solid fa-newspaper"></i>
                            <span class="on-half-expanded">{{ ___('football.goal_score') }}</span>
                        </a>
                    </li>
                @endif
                <!--Goal Score End -->

                <!-- Football Match start -->
                @if (hasPermission('football_matchs_read'))
                    <li class="sidebar-menu-item {{ set_menu(['footballmatchs.index']) }}">
                        <a href="{{ route('footballmatchs.index') }}" class="parent-item-content">
                            <i class="fa-solid fa-equals"></i>
                            <span class="on-half-expanded">{{ ___('football.football_match') }}</span>
                        </a>
                    </li>
                @endif
                <!--Football Match End -->

                <!-- Football score start -->
                @if (hasPermission('football_scores_read'))
                    <li class="sidebar-menu-item {{ set_menu(['footballscores.index']) }}">
                        <a href="{{ route('footballscores.index') }}" class="parent-item-content">
                            <i class="fa-solid fa-newspaper"></i>
                            <span class="on-half-expanded">{{ ___('football.football_score') }}</span>
                        </a>
                    </li>
                @endif
                <!--Football score End -->
                <!-- Football score start -->
                @if (hasPermission('footballrankings_read'))
                <li class="sidebar-menu-item {{ set_menu(['footballrankings.index']) }}">
                    <a href="{{ route('footballrankings.index') }}" class="parent-item-content">
                        <i class="fa-solid fa-newspaper"></i>
                        <span class="on-half-expanded">{{ ___('football.football_rankings') }}</span>
                    </a>
                </li>
                @endif
                <!--Football score End -->

                <!--football Start -->
                <li class="sidebar-menu-item {{ set_menu(['football_scores']) }}">
                    <a href="{{ url('football_scores') }}" class="parent-item-content">
                        <i class="fa-regular fa-futbol"></i>
                        <span class="on-half-expanded">{{ ___('football.football') }} </span>
                    </a>
                </li>
                <!--football End -->
            </ul>
            <!-- parent menu list end  -->
        </div>
    </div>
</aside>
