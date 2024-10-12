<aside class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <div class="sidebar-logo">
            <a href="<?php echo e(route('cricket')); ?>">
                <input type="hidden" name="global_light_logo" id="global_light_logo"
                    value="<?php echo e(@globalAsset(setting('light_logo'), '154x38.png')); ?>" />
                <input type="hidden" name="global_dark_logo" id="global_dark_logo"
                    value="<?php echo e(@globalAsset(setting('dark_logo'), '154x38.png')); ?>" />

                <img id="sidebar_full_logo" class="full-logo setting-image"
                    src="<?php echo e(userTheme() == 'default-theme' ? @globalAsset(setting('light_logo'), '154x38.png') : @globalAsset(setting('dark_logo'), '154x38.png')); ?>"
                    alt="" />

                <img class="half-logo" src="<?php echo e(globalAsset(setting('favicon'), '38x38.png')); ?>" alt="" />
            </a>
        </div>

        <button class="half-expand-toggle sidebar-toggle">
            <img src="<?php echo e(asset('backend')); ?>/assets/images/icons/collapse-arrow.svg" alt="" />
        </button>
        <button class="close-toggle sidebar-toggle">
            <img src="<?php echo e(asset('backend')); ?>/assets/images/icons/collapse-arrow.svg" alt="" />
        </button>
    </div>



    <div class="sidebar-menu srollbar">
        <div class="sidebar-menu-section">

            <ul class="sidebar-dropdown-menu parent-menu-list">
                <li class="sidebar-menu-item">
                    <a href="#" class="parent-item-content has-arrow">
                        <i class="fa-solid fa-calculator"></i>
                        <span class="on-half-expanded"><?php echo e(___('cricket.cricket')); ?></span>
                    </a>
                    <ul class="child-menu-list">
                        <li class="sidebar-menu-item <?php echo e(set_menu(['/'])); ?>">
                            <a href="<?php echo e(url('/')); ?>"><?php echo e(___('cricket.score_commentary')); ?></a>
                        </li>
                        <li class="sidebar-menu-item <?php echo e(set_menu(['cricketTeamStatus'])); ?>">
                            <a href="<?php echo e(route('cricketTeamStatus')); ?>"><?php echo e(___('cricket.man_teams')); ?></a>
                        </li>
                        <li class="sidebar-menu-item <?php echo e(set_menu(['cricketWomenTeamStatus'])); ?>">
                            <a href="<?php echo e(route('cricketWomenTeamStatus')); ?>"><?php echo e(___('cricket.women_teams')); ?></a>
                        </li>
                        <li class="sidebar-menu-item <?php echo e(set_menu(['series'])); ?>">
                            <a href="<?php echo e(route('series')); ?>"><?php echo e(___('cricket.series_matchs')); ?></a>
                        </li>
                        <li class="sidebar-menu-item <?php echo e(set_menu(['getSeriesTeamList'])); ?>">
                            <a href="<?php echo e(route('getSeriesTeamList')); ?>"><?php echo e(___('cricket.series_teams')); ?></a>
                        </li>
                        <li class="sidebar-menu-item <?php echo e(set_menu(['shedule'])); ?>">
                            <a href="<?php echo e(route('shedule')); ?>"><?php echo e(___('cricket.shedule')); ?></a>
                        </li>
                        <li class="sidebar-menu-item <?php echo e(set_menu(['arcive'])); ?>">
                            <a href="<?php echo e(route('arcive')); ?>"><?php echo e(___('cricket.arcive')); ?></a>
                        </li>
                        
                        <li class="sidebar-menu-item <?php echo e(set_menu(['T20Ranking'])); ?>">
                            <a href="<?php echo e(route('T20Ranking')); ?>"><?php echo e(___('cricket.man_t_20_teams_ranking')); ?></a>
                        </li>
                        <li class="sidebar-menu-item <?php echo e(set_menu(['OdiRanking'])); ?>">
                            <a href="<?php echo e(route('OdiRanking')); ?>"><?php echo e(___('cricket.man_odi_teams_ranking')); ?></a>
                        </li>
                        <li class="sidebar-menu-item <?php echo e(set_menu(['TestRanking'])); ?>">
                            <a href="<?php echo e(route('TestRanking')); ?>"><?php echo e(___('cricket.man_test_teams_ranking')); ?></a>
                        </li>
                        <li class="sidebar-menu-item <?php echo e(set_menu(['T20BatterRanking'])); ?>">
                            <a href="<?php echo e(route('T20BatterRanking')); ?>"><?php echo e(___('cricket.man_t_20_batter_ranking')); ?></a>
                        </li>
                        <li class="sidebar-menu-item <?php echo e(set_menu(['T20BowlerRanking'])); ?>">
                            <a href="<?php echo e(route('T20BowlerRanking')); ?>"><?php echo e(___('cricket.man_t_20_bowler_ranking')); ?></a>
                        </li>
                        <li class="sidebar-menu-item <?php echo e(set_menu(['OdiBatterRanking'])); ?>">
                            <a href="<?php echo e(route('OdiBatterRanking')); ?>"><?php echo e(___('cricket.man_odi_batter_ranking')); ?></a>
                        </li>
                        <li class="sidebar-menu-item <?php echo e(set_menu(['OdiBowlerRanking'])); ?>">
                            <a href="<?php echo e(route('OdiBowlerRanking')); ?>"><?php echo e(___('cricket.man_odi_bowler_ranking')); ?></a>
                        </li>
                        <li class="sidebar-menu-item <?php echo e(set_menu(['TestBatterRanking'])); ?>">
                            <a href="<?php echo e(route('TestBatterRanking')); ?>"><?php echo e(___('cricket.man_test_batter_ranking')); ?></a>
                        </li>
                        <li class="sidebar-menu-item <?php echo e(set_menu(['TestBowlerRanking'])); ?>">
                            <a href="<?php echo e(route('TestBowlerRanking')); ?>"><?php echo e(___('cricket.man_test_bowler_ranking')); ?></a>
                        </li>
                        

                        
                        <li class="sidebar-menu-item <?php echo e(set_menu(['wT20Ranking'])); ?>">
                            <a href="<?php echo e(route('wT20Ranking')); ?>"><?php echo e(___('cricket.women_t_20_teams_ranking')); ?></a>
                        </li>
                        <li class="sidebar-menu-item <?php echo e(set_menu(['wOdiRanking'])); ?>">
                            <a href="<?php echo e(route('wOdiRanking')); ?>"><?php echo e(___('cricket.women_odi_teams_ranking')); ?></a>
                        </li>
                        <li class="sidebar-menu-item <?php echo e(set_menu(['wTestRanking'])); ?>">
                            <a href="<?php echo e(route('wTestRanking')); ?>"><?php echo e(___('cricket.women_test_teams_ranking')); ?></a>
                        </li>
                        <li class="sidebar-menu-item <?php echo e(set_menu(['WT20BatterRanking'])); ?>">
                            <a href="<?php echo e(route('WT20BatterRanking')); ?>"><?php echo e(___('cricket.w_t_20_batter_ranking')); ?></a>
                        </li>
                        <li class="sidebar-menu-item <?php echo e(set_menu(['WT20BowlerRanking'])); ?>">
                            <a href="<?php echo e(route('WT20BowlerRanking')); ?>"><?php echo e(___('cricket.w_t_20_bowler_ranking')); ?></a>
                        </li>
                        <li class="sidebar-menu-item <?php echo e(set_menu(['WOdiBatterRanking'])); ?>">
                            <a href="<?php echo e(route('WOdiBatterRanking')); ?>"><?php echo e(___('cricket.w_odi_batter_ranking')); ?></a>
                        </li>
                        <li class="sidebar-menu-item <?php echo e(set_menu(['WOdiBowlerRanking'])); ?>">
                            <a href="<?php echo e(route('WOdiBowlerRanking')); ?>"><?php echo e(___('cricket.w_odi_bowler_ranking')); ?></a>
                        </li>
                        <li class="sidebar-menu-item <?php echo e(set_menu(['WTestBatterRanking'])); ?>">
                            <a href="<?php echo e(route('WTestBatterRanking')); ?>"><?php echo e(___('cricket.w_test_batter_ranking')); ?></a>
                        </li>
                        <li class="sidebar-menu-item <?php echo e(set_menu(['WTestBowlerRanking'])); ?>">
                            <a href="<?php echo e(route('WTestBowlerRanking')); ?>"><?php echo e(___('cricket.w_test_bowler_ranking')); ?></a>
                        </li>
                        
                    </ul>
                </li>
            </ul>

            <ul class="sidebar-dropdown-menu parent-menu-list">
                <li class="sidebar-menu-item">
                    <a href="#" class="parent-item-content has-arrow">
                        <i class="fa-regular fa-futbol"></i>
                        <span class="on-half-expanded"><?php echo e(___('cricket.football')); ?></span>
                    </a>
                    <ul class="child-menu-list">
                        <li class="sidebar-menu-item <?php echo e(set_menu(['football_scores'])); ?>">
                            <a href="<?php echo e(url('football_scores')); ?>"><?php echo e(___('cricket.score')); ?></a>
                        </li>
                        <li class="sidebar-menu-item <?php echo e(set_menu(['footballTeamStatus'])); ?>">
                            <a href="<?php echo e(route('footballTeamStatus')); ?>"><?php echo e(___('cricket.man_teams')); ?></a>
                        </li>
                        <li class="sidebar-menu-item <?php echo e(set_menu(['footballWomenTeamStatus'])); ?>">
                            <a href="<?php echo e(route('footballWomenTeamStatus')); ?>"><?php echo e(___('cricket.women_teams')); ?></a>
                        </li>
                        <li class="sidebar-menu-item <?php echo e(set_menu(['leagues'])); ?>">
                            <a href="<?php echo e(route('leagues')); ?>"><?php echo e(___('football.leagues_matchs')); ?></a>
                        </li>
                        <li class="sidebar-menu-item <?php echo e(set_menu(['getleaguesTeamList'])); ?>">
                            <a href="<?php echo e(route('getleaguesTeamList')); ?>"><?php echo e(___('football.leagues_teams')); ?></a>
                        </li>
                        <li class="sidebar-menu-item <?php echo e(set_menu(['footballTeamManRankings'])); ?>">
                            <a href="<?php echo e(route('footballTeamManRankings')); ?>"><?php echo e(___('football.football_team_man_ranking_status')); ?></a>
                        </li>
                        <li class="sidebar-menu-item <?php echo e(set_menu(['footballTeamWomenRankings'])); ?>">
                            <a href="<?php echo e(route('footballTeamWomenRankings')); ?>"><?php echo e(___('football.football_team_women_ranking_status')); ?></a>
                        </li>
                        <li class="sidebar-menu-item <?php echo e(set_menu(['FootballManRanking'])); ?>">
                            <a href="<?php echo e(route('FootballManRanking')); ?>"><?php echo e(___('football.man_ranking')); ?></a>
                        </li>
                        <li class="sidebar-menu-item <?php echo e(set_menu(['FootballWomanRanking'])); ?>">
                            <a href="<?php echo e(route('FootballWomanRanking')); ?>"><?php echo e(___('football.woman_ranking')); ?></a>
                        </li>
                        <li class="sidebar-menu-item <?php echo e(set_menu(['FootballShedule'])); ?>">
                            <a href="<?php echo e(route('FootballShedule')); ?>"><?php echo e(___('cricket.shedule')); ?></a>
                        </li>
                        <li class="sidebar-menu-item <?php echo e(set_menu(['FootballArcive'])); ?>">
                            <a href="<?php echo e(route('FootballArcive')); ?>"><?php echo e(___('cricket.arcive')); ?></a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!--Football Featurs End -->

            <!-- News layout start -->
            <ul class="sidebar-dropdown-menu parent-menu-list">
                <li class="sidebar-menu-item <?php echo e(set_menu(['news'])); ?>">
                    <a href="<?php echo e(route('news')); ?>" class="parent-item-content">
                        <i class="fa-solid fa-newspaper"></i>
                        <span class="on-half-expanded"><?php echo e(___('cricket.news')); ?></span>
                    </a>
                </li>
            </ul>
            <!-- news layout end -->
        </div>
    </div>
</aside>
<?php /**PATH C:\laragon\www\khelardan\resources\views/backend/partials/publicsidebar.blade.php ENDPATH**/ ?>