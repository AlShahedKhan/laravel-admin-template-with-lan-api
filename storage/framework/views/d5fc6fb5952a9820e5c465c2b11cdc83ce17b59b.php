<aside class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <div class="sidebar-logo">
            <a href="<?php echo e(route('dashboard')); ?>">
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
            <!--Admin Tools Start -->
            <h6 class="sidebar-menu-section-heading">
                <?php echo e(___('common.admin')); ?> <span class="on-half-expanded"> <?php echo e(___('cricket.tools')); ?></span>
            </h6>
            <!--Admin Tools End -->

            <!-- parent menu list start  -->
            <ul class="sidebar-dropdown-menu parent-menu-list">
                <?php if(hasPermission('dashboard_read')): ?>
                    <li class="sidebar-menu-item <?php echo e(set_menu(['dashboard'])); ?>">
                        <a href="<?php echo e(route('dashboard')); ?>" class="parent-item-content">
                            
                            <i class="las la-tachometer-alt"></i>
                            <span class="on-half-expanded"><?php echo e(___('common.dashboard')); ?></span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if(hasPermission('user_read') || hasPermission('role_read')): ?>
                    <li class="sidebar-menu-item <?php echo e(set_menu(['users*', 'roles*'])); ?>">
                        <a class="parent-item-content has-arrow">
                            
                            <i class="las la-user-tag"></i>
                            <span class="on-half-expanded"><?php echo e(___('common.users_&_roles')); ?></span>
                        </a>

                        <!-- second layer child menu list start  -->

                        <ul class="child-menu-list">
                            <?php if(hasPermission('role_read')): ?>
                                <li class="sidebar-menu-item <?php echo e(set_menu(['roles*'])); ?>">
                                    <a href="<?php echo e(route('roles.index')); ?>"><?php echo e(___('users_roles.roles')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if(hasPermission('user_read')): ?>
                                <li class="sidebar-menu-item <?php echo e(set_menu(['users*'])); ?>">
                                    <a href="<?php echo e(route('users.index')); ?>"><?php echo e(___('users_roles.users')); ?></a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                <?php endif; ?>

                <!-- second layer child menu list end  -->

                <!-- Language layout start -->
                <?php if(hasPermission('language_read')): ?>
                    <li class="sidebar-menu-item <?php echo e(set_menu(['languages*'])); ?>">
                        <a href="<?php echo e(route('languages.index')); ?>" class="parent-item-content">
                            <i class="las la-language"></i>
                            <span class="on-half-expanded"><?php echo e(___('language.languages')); ?></span>
                        </a>
                    </li>
                <?php endif; ?>
                <!-- Language layout end -->

                <!-- Settings layout start -->
                <?php if(hasPermission('general_settings_read') ||
                        hasPermission('storage_settings_read') ||
                        hasPermission('recaptcha_settings_read') ||
                        hasPermission('email_settings_read')): ?>
                    <li class="sidebar-menu-item <?php echo e(set_menu(['setting*'])); ?>">
                        <a href="#" class="parent-item-content has-arrow">
                            <i class="las la-cog"></i>
                            <span class="on-half-expanded"><?php echo e(___('common.settings')); ?></span>
                        </a>

                        <!-- second layer child menu list start  -->
                        <ul class="child-menu-list">
                            <?php if(hasPermission('general_settings_read')): ?>
                                <li class="sidebar-menu-item <?php echo e(set_menu(['settings.general-settings'])); ?>">
                                    <a
                                        href="<?php echo e(route('settings.general-settings')); ?>"><?php echo e(___('settings.general_settings')); ?></a>
                                </li>
                            <?php endif; ?>

                            <?php if(hasPermission('storage_settings_read')): ?>
                                <li class="sidebar-menu-item <?php echo e(set_menu(['settings.storagesetting'])); ?>">
                                    <a
                                        href="<?php echo e(route('settings.storagesetting')); ?>"><?php echo e(___('settings.storage_settings')); ?></a>
                                </li>
                            <?php endif; ?>

                            <?php if(hasPermission('recaptcha_settings_read')): ?>
                                <li class="sidebar-menu-item <?php echo e(set_menu(['settings.recaptcha-setting'])); ?>">
                                    <a
                                        href="<?php echo e(route('settings.recaptcha-setting')); ?>"><?php echo e(___('settings.recaptcha_settings')); ?></a>
                                </li>
                            <?php endif; ?>

                            <?php if(hasPermission('email_settings_read')): ?>
                                <li class="sidebar-menu-item <?php echo e(set_menu(['settings.mail-setting'])); ?>">
                                    <a
                                        href="<?php echo e(route('settings.mail-setting')); ?>"><?php echo e(___('settings.email_settings')); ?></a>
                                </li>
                            <?php endif; ?>
                        </ul>
                        <!-- second layer child menu list end  -->
                    </li>
                <?php endif; ?>
                <!-- Settings layout end -->

                <!-- Components Layout End -->
            </ul>
            <!-- parent menu list end  -->

            <!--Cricket Start -->
            <h6 class="sidebar-menu-section-heading">
                <?php echo e(___('cricket.cricket')); ?> <span class="on-half-expanded"><?php echo e(___('cricket.tools')); ?></span>
            </h6>
            <!--Cricket End -->

            <!-- parent menu list start  -->
            <ul class="sidebar-dropdown-menu parent-menu-list">
                <?php if(hasPermission('score_read') || hasPermission('scorebowlerfirst_read')): ?>
                    <!--First Innings Start -->
                    <li class="sidebar-menu-item">
                        <a href="#" class="parent-item-content has-arrow">
                            <i class="fa-solid fa-calculator"></i>
                            <span class="on-half-expanded"><?php echo e(___('cricket.first_innings')); ?></span>
                        </a>
                        <ul class="child-menu-list">
                            <?php if(hasPermission('score_read')): ?>
                                <li class="sidebar-menu-item <?php echo e(set_menu(['score.index'])); ?>">
                                    <a href="<?php echo e(route('score.index')); ?>"><?php echo e(___('cricket.batter_first')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if(hasPermission('scorebowlerfirst_read')): ?>
                                <li class="sidebar-menu-item <?php echo e(set_menu(['scorebowlerfirst.index'])); ?>">
                                    <a
                                        href="<?php echo e(route('scorebowlerfirst.index')); ?>"><?php echo e(___('cricket.bowler_first')); ?></a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <!--First Innings End -->
                <?php endif; ?>

                <!--Second Innings Start -->
                <?php if(hasPermission('scorebattersecond_read') || hasPermission('scorebowlersecond_read')): ?>
                    <li class="sidebar-menu-item">
                        <a href="#" class="parent-item-content has-arrow">
                            <i class="fa-solid fa-calculator"></i>
                            <span class="on-half-expanded"><?php echo e(___('cricket.second_innings')); ?> </span>
                        </a>
                        <ul class="child-menu-list">
                            <?php if(hasPermission('scorebattersecond_read')): ?>
                                <li class="sidebar-menu-item <?php echo e(set_menu(['scorebattersecond.index'])); ?>">
                                    <a
                                        href="<?php echo e(route('scorebattersecond.index')); ?>"><?php echo e(___('cricket.batter_second')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if(hasPermission('scorebowlersecond_read')): ?>
                                <li class="sidebar-menu-item <?php echo e(set_menu(['scorebowlersecond.index'])); ?>">
                                    <a
                                        href="<?php echo e(route('scorebowlersecond.index')); ?>"><?php echo e(___('cricket.bowler_second')); ?></a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                <?php endif; ?>
                <!--Second Innings End -->

                <!-- Matchs start -->
                <?php if(hasPermission('matchh_read')): ?>
                    <li class="sidebar-menu-item <?php echo e(set_menu(['matchh.index'])); ?>">
                        <a href="<?php echo e(route('matchh.index')); ?>" class="parent-item-content">
                            <i class="fa-solid fa-equals"></i>
                            <span class="on-half-expanded"><?php echo e(___('cricket.matchs')); ?></span>
                        </a>
                    </li>
                <?php endif; ?>
                <!--Matchs End -->

                <!-- Teams start -->
                <?php if(hasPermission('team_read')): ?>
                    <li class="sidebar-menu-item <?php echo e(set_menu(['teams.index'])); ?>">
                        <a href="<?php echo e(route('teams.index')); ?>" class="parent-item-content">
                            <i class="fa-solid fa-people-group"></i>
                            <span class="on-half-expanded"><?php echo e(___('cricket.teams')); ?></span>
                        </a>
                    </li>
                <?php endif; ?>
                <!--Teams End -->

                <!-- Player start -->
                <?php if(hasPermission('player_read')): ?>
                    <li class="sidebar-menu-item <?php echo e(set_menu(['player.index'])); ?>">
                        <a href="<?php echo e(route('player.index')); ?>" class="parent-item-content">
                            <i class="fa-solid fa-person"></i>
                            <span class="on-half-expanded"><?php echo e(___('cricket.players')); ?></span>
                        </a>
                    </li>
                <?php endif; ?>
                <!--Player End -->



                <!--Score Update Start -->
                <?php if(hasPermission('scoreupdates_read') || hasPermission('updatebowler_read')): ?>
                    <li class="sidebar-menu-item">
                        <a href="#" class="parent-item-content has-arrow">
                            <i class="fa-solid fa-newspaper"></i>
                            <span class="on-half-expanded"><?php echo e(___('cricket.score_update')); ?> </span>
                        </a>
                        <ul class="child-menu-list">
                            <?php if(hasPermission('scoreupdates_read')): ?>
                                <li class="sidebar-menu-item <?php echo e(set_menu(['scoreupdates.index'])); ?>">
                                    <a href="<?php echo e(route('scoreupdates.index')); ?>"><?php echo e(___('cricket.batter')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if(hasPermission('updatebowler_read')): ?>
                                <li class="sidebar-menu-item <?php echo e(set_menu(['updatebowler.index'])); ?>">
                                    <a href="<?php echo e(route('updatebowler.index')); ?>"><?php echo e(___('cricket.bowler')); ?></a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                <?php endif; ?>
                <!--Score Update End -->

                <!--Commentry Start -->
                <?php if(hasPermission('commentry_read') || hasPermission('commentrycreate_read')): ?>
                    <li class="sidebar-menu-item">
                        <a href="#" class="parent-item-content has-arrow">
                            <i class="fa-solid fa-microphone"></i>
                            <span class="on-half-expanded"><?php echo e(___('cricket.commentry')); ?> </span>
                        </a>
                        <ul class="child-menu-list">
                            <?php if(hasPermission('commentry_read')): ?>
                                <li class="sidebar-menu-item <?php echo e(set_menu(['commentry.index'])); ?>">
                                    <a href="<?php echo e(route('commentry.index')); ?>"><?php echo e(___('cricket.commentry')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if(hasPermission('commentrycreate_read')): ?>
                                <li class="sidebar-menu-item <?php echo e(set_menu(['commentrycreate.index'])); ?>">
                                    <a
                                        href="<?php echo e(route('commentrycreate.index')); ?>"><?php echo e(___('cricket.commentry_create')); ?></a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                <?php endif; ?>
                <!--Commentry End -->

                <!--Curve Start -->
                <?php if(hasPermission('managepublictable_read')): ?>
                    <li class="sidebar-menu-item">
                        <a href="#" class="parent-item-content has-arrow">
                            <i class="fa-solid fa-chart-simple"></i>
                            <span class="on-half-expanded"><?php echo e(___('cricket.manage_table')); ?> </span>
                        </a>
                        <ul class="child-menu-list">
                            <li class="sidebar-menu-item <?php echo e(set_menu(['manage-public.index'])); ?>">
                                <a href="<?php echo e(route('manage-public.index')); ?>"><?php echo e(___('cricket.manage_table')); ?></a>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>
                <!--Curve End -->

                <!-- shedule start -->
                
                <li class="sidebar-menu-item <?php echo e(set_menu(['shedule'])); ?>">
                    <a href="<?php echo e(route('shedule')); ?>" class="parent-item-content">
                        <i class="fa-solid fa-equals"></i>
                        <span class="on-half-expanded"><?php echo e(___('cricket.shedule')); ?></span>
                    </a>
                </li>
                
                <!--shedule End -->

                <!-- arcive start -->
                
                <li class="sidebar-menu-item <?php echo e(set_menu(['arcive'])); ?>">
                    <a href="<?php echo e(route('arcive')); ?>" class="parent-item-content">
                        <i class="fa-solid fa-equals"></i>
                        <span class="on-half-expanded"><?php echo e(___('cricket.arcive')); ?></span>
                    </a>
                </li>
                
                <!--arcive End -->

                <!-- points start -->
                <?php if(hasPermission('point_read')): ?>
                    <li class="sidebar-menu-item <?php echo e(set_menu(['points.index'])); ?>">
                        <a href="<?php echo e(route('points.index')); ?>" class="parent-item-content">
                            <i class="fa-solid fa-equals"></i>
                            <span class="on-half-expanded"><?php echo e(___('cricket.points.index')); ?></span>
                        </a>
                    </li>
                <?php endif; ?>
                <!--points End -->

                <!-- rankings start -->
                <?php if(hasPermission('ranking_read')): ?>
                    <li class="sidebar-menu-item <?php echo e(set_menu(['rankings.index'])); ?>">
                        <a href="<?php echo e(route('rankings.index')); ?>" class="parent-item-content">
                            <i class="fa-solid fa-equals"></i>
                            <span class="on-half-expanded"><?php echo e(___('cricket.rankings')); ?></span>
                        </a>
                    </li>
                <?php endif; ?>
                <!--rankings End -->

                <!-- Series start -->
                <?php if(hasPermission('series_read')): ?>
                    <li class="sidebar-menu-item <?php echo e(set_menu(['series.index'])); ?>">
                        <a href="<?php echo e(route('series.index')); ?>" class="parent-item-content">
                            <i class="fa-solid fa-equals"></i>
                            <span class="on-half-expanded"><?php echo e(___('cricket.series')); ?></span>
                        </a>
                    </li>
                <?php endif; ?>
                <!--Series End -->

                <!-- News start -->
                <?php if(hasPermission('news_read')): ?>
                    <li class="sidebar-menu-item <?php echo e(set_menu(['news.index'])); ?>">
                        <a href="<?php echo e(route('news.index')); ?>" class="parent-item-content">
                            <i class="fa-solid fa-equals"></i>
                            <span class="on-half-expanded"><?php echo e(___('cricket.news')); ?></span>
                        </a>
                    </li>
                <?php endif; ?>
                <!--News End -->

                <!--Score Start -->
                <li class="sidebar-menu-item">
                    <a href="<?php echo e(url('/')); ?>" class="parent-item-content ">
                        <i class="fa-solid fa-house-user"></i>
                        <span class="on-half-expanded"><?php echo e(___('cricket.cricket')); ?> </span>
                    </a>
                </li>
                <!--Score End -->

                <!-- third layer child menu list End  -->
            </ul>
            <!-- parent menu list end  -->

            <!--Static Tools Start -->
            <h6 class="sidebar-menu-section-heading">
                <?php echo e(___('football.football')); ?> <span class="on-half-expanded"><?php echo e(___('football.tools')); ?></span>
            </h6>
            <!--Static Tools End -->

            <!-- parent menu list start  -->
            <ul class="sidebar-dropdown-menu parent-menu-list">

                <!-- Teams start -->
                <?php if(hasPermission('football_team_read')): ?>
                    <li class="sidebar-menu-item <?php echo e(set_menu(['footballteams.index'])); ?>">
                        <a href="<?php echo e(route('footballteams.index')); ?>" class="parent-item-content">
                            <i class="fa-solid fa-people-group"></i>
                            <span class="on-half-expanded"><?php echo e(___('football.football_teams')); ?></span>
                        </a>
                    </li>
                <?php endif; ?>
                <!--Teams End -->

                <!--Leagues start -->
                <?php if(hasPermission('leagues_read')): ?>
                    <li class="sidebar-menu-item <?php echo e(set_menu(['leagues.index'])); ?>">
                        <a href="<?php echo e(route('leagues.index')); ?>" class="parent-item-content">
                            <i class="fa-solid fa-people-group"></i>
                            <span class="on-half-expanded"><?php echo e(___('football.leagues')); ?></span>
                        </a>
                    </li>
                <?php endif; ?>

                <!--Leagues End -->

                <!-- Football players start -->
                <?php if(hasPermission('football_players_read')): ?>
                    <li class="sidebar-menu-item <?php echo e(set_menu(['footballplayers.index'])); ?>">
                        <a href="<?php echo e(route('footballplayers.index')); ?>" class="parent-item-content">
                            <i class="fa-solid fa-person"></i>
                            <span class="on-half-expanded"><?php echo e(___('football.football_players')); ?></span>
                        </a>
                    </li>
                <?php endif; ?>
                <!--Football players End -->

                <!-- Goal Score start -->
                <?php if(hasPermission('goal_scores_read')): ?>
                    <li class="sidebar-menu-item <?php echo e(set_menu(['goalscores.index'])); ?>">
                        <a href="<?php echo e(route('goalscores.index')); ?>" class="parent-item-content">
                            <i class="fa-solid fa-newspaper"></i>
                            <span class="on-half-expanded"><?php echo e(___('football.goal_score')); ?></span>
                        </a>
                    </li>
                <?php endif; ?>
                <!--Goal Score End -->

                <!-- Football Match start -->
                <?php if(hasPermission('football_matchs_read')): ?>
                    <li class="sidebar-menu-item <?php echo e(set_menu(['footballmatchs.index'])); ?>">
                        <a href="<?php echo e(route('footballmatchs.index')); ?>" class="parent-item-content">
                            <i class="fa-solid fa-equals"></i>
                            <span class="on-half-expanded"><?php echo e(___('football.football_match')); ?></span>
                        </a>
                    </li>
                <?php endif; ?>
                <!--Football Match End -->

                <!-- Football score start -->
                <?php if(hasPermission('football_scores_read')): ?>
                    <li class="sidebar-menu-item <?php echo e(set_menu(['footballscores.index'])); ?>">
                        <a href="<?php echo e(route('footballscores.index')); ?>" class="parent-item-content">
                            <i class="fa-solid fa-newspaper"></i>
                            <span class="on-half-expanded"><?php echo e(___('football.football_score')); ?></span>
                        </a>
                    </li>
                <?php endif; ?>
                <!--Football score End -->
                <!-- Football score start -->
                <?php if(hasPermission('footballrankings_read')): ?>
                <li class="sidebar-menu-item <?php echo e(set_menu(['footballrankings.index'])); ?>">
                    <a href="<?php echo e(route('footballrankings.index')); ?>" class="parent-item-content">
                        <i class="fa-solid fa-newspaper"></i>
                        <span class="on-half-expanded"><?php echo e(___('football.football_rankings')); ?></span>
                    </a>
                </li>
                <?php endif; ?>
                <!--Football score End -->

                <!--football Start -->
                <li class="sidebar-menu-item <?php echo e(set_menu(['football_scores'])); ?>">
                    <a href="<?php echo e(url('football_scores')); ?>" class="parent-item-content">
                        <i class="fa-regular fa-futbol"></i>
                        <span class="on-half-expanded"><?php echo e(___('football.football')); ?> </span>
                    </a>
                </li>
                <!--football End -->
            </ul>
            <!-- parent menu list end  -->
        </div>
    </div>
</aside>
<?php /**PATH C:\laragon\www\khelardan\resources\views/backend/partials/sidebar.blade.php ENDPATH**/ ?>