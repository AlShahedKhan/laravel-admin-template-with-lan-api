<?php

use App\Http\Controllers\LeagueController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Config;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\CurveController;
use App\Http\Controllers\PointController;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\MatchhController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\RankingController;
use App\Http\Controllers\FixturesController;
use App\Http\Controllers\CommentryController;
use App\Http\Controllers\GoalScoreController;
use App\Http\Controllers\ScoreupdateController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\FootballHomeController;
use App\Http\Controllers\FootballTeamController;
use App\Http\Controllers\UpdatebowlerController;
use App\Http\Controllers\FootballMatchController;
use App\Http\Controllers\FootballScoreController;
use App\Http\Controllers\FootballPlayerController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\CommentryCreateController;
use App\Http\Controllers\Backend\LanguageController;
use App\Http\Controllers\ScorebowlerfirstController;
use App\Http\Controllers\Backend\MyProfileController;
use App\Http\Controllers\ManagePublicTableController;
use App\Http\Controllers\ScorebattersecondController;
use App\Http\Controllers\ScorebowlersecondController;
use App\Http\Controllers\T20BattingRankingController;
use App\Http\Controllers\Backend\AuthenticationController;
use App\Http\Controllers\FootballRankingController;
use App\Http\Controllers\WebrtcStreamingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::group(['middleware' => ['XssSanitizer']], function () {

    Route::group(['middleware' => 'lang'], function () {

        // Non-auth routes
        Route::group(['middleware' => ['not.auth.routes']], function () {
            // controller namespace
            Route::controller(AuthenticationController::class)->group(function () {

                // if (Config::get('app.APP_DEMO')) {
                //     Route::get('/', function () {
                //         return view('welcome');
                //     });
                // } else {
                //     Route::get('/login',                            'loginPage')->name('login');
                // }

                // Route::get('bismillah_l_o_g_i_n_khe_lar_add_a','loginPage')->name('login');
                Route::get('ullash_login_buzz', 'loginPage')->name('login');
                Route::post('login', 'login')->name('login.auth');
                Route::get('register', 'registerPage')->name('registerPage');
                Route::post('register', 'register')->name('register');
                Route::get('verify-email/{email}/{token}', 'verifyEmail')->name('verify-email');


                // reset password
                Route::get('forgot-password', 'forgotPasswordPage')->name('forgot-password');
                Route::post('forgot-password', 'forgotPassword')->name('forgot.password');

                Route::get('reset-password/{email}/{token}', 'resetPasswordPage')->name('reset-password');
                Route::post('reset-password', 'resetPassword')->name('reset.password');
            });
        });


        // auth routes
        Route::group(['middleware' => ['auth.routes']], function () {

            // dashboard routes
            Route::get('dashboard', [App\Http\Controllers\Backend\DashboardController::class, 'index'])->name('dashboard');
            Route::get('dashboard/school', [App\Http\Controllers\Backend\DashboardController::class, 'schoolDashboard'])->name('school_dashboard');
            Route::get('dashboard/lms', [App\Http\Controllers\Backend\DashboardController::class, 'lmsDashboard'])->name('lms_dashboard');
            Route::get('dashboard/crm', [App\Http\Controllers\Backend\DashboardController::class, 'crmDashboard'])->name('crm_dashboard');
            Route::post('logout', [App\Http\Controllers\Backend\AuthenticationController::class, 'logout'])->name('logout');
            Route::post('searchMenuData', [App\Http\Controllers\Backend\DashboardController::class, 'searchMenuData'])->name('searchMenuData');

            Route::controller(RoleController::class)->prefix('roles')->group(function () {
                Route::get('/', 'index')->name('roles.index')->middleware('PermissionCheck:role_read');
                Route::get('/create', 'create')->name('roles.create')->middleware('PermissionCheck:role_create');
                Route::post('/store', 'store')->name('roles.store')->middleware('PermissionCheck:role_create');
                Route::get('/edit/{id}', 'edit')->name('roles.edit')->middleware('PermissionCheck:role_update');
                Route::put('/update/{id}', 'update')->name('roles.update')->middleware('PermissionCheck:role_update');
                Route::delete('/delete/{id}', 'delete')->name('roles.delete')->middleware('PermissionCheck:role_delete');
            });

            Route::controller(UserController::class)->prefix('users')->group(function () {
                Route::get('/', 'index')->name('users.index')->middleware('PermissionCheck:user_read');
                Route::get('/create', 'create')->name('users.create')->middleware('PermissionCheck:user_create');
                Route::post('/store', 'store')->name('users.store')->middleware('PermissionCheck:user_create');
                Route::get('/edit/{id}', 'edit')->name('users.edit')->middleware('PermissionCheck:user_update');
                Route::put('/update/{id}', 'update')->name('users.update')->middleware('PermissionCheck:user_update');
                Route::delete('/delete/{id}', 'delete')->name('users.delete')->middleware('PermissionCheck:user_delete');

                Route::get('/change-role', 'changeRole')->name('change.role');
                Route::post('/status', 'status')->name('users.status');
                Route::delete('/{id}', 'deletes')->name('users.deletes');
            });

            Route::controller(MyProfileController::class)->prefix('my')->group(function () {
                Route::get('/profile', 'profile')->name('my.profile');
                Route::get('/profile/edit', 'edit')->name('my.profile.edit');
                Route::put('/profile/update', 'update')->name('my.profile.update');

                Route::get('/password/update', 'passwordUpdate')->name('passwordUpdate');
                Route::put('/password/update/store', 'passwordUpdateStore')->name('passwordUpdateStore');
            });

            Route::controller(LanguageController::class)->prefix('languages')->group(function () {
                Route::get('/', 'index')->name('languages.index')->middleware('PermissionCheck:language_read');
                Route::get('/create', 'create')->name('languages.create')->middleware('PermissionCheck:language_create');
                Route::post('/store', 'store')->name('languages.store')->middleware('PermissionCheck:language_create');
                Route::get('/edit/{id}', 'edit')->name('languages.edit')->middleware('PermissionCheck:language_update');
                Route::put('/update/{id}', 'update')->name('languages.update')->middleware('PermissionCheck:language_update');
                Route::delete('/delete/{id}', 'delete')->name('languages.delete')->middleware('PermissionCheck:language_delete');

                Route::get('/terms/{id}', 'terms')->name('languages.edit.terms')->middleware('PermissionCheck:language_update_terms');
                Route::put('/update/terms/{code}', 'termsUpdate')->name('languages.update.terms')->middleware('PermissionCheck:language_update_terms');
                Route::get('/change-module', 'changeModule')->name('languages.change.module');

            });

            Route::controller(SettingController::class)->prefix('/')->group(function () {

                Route::get('/general-settings', 'generalSettings')->name('settings.general-settings')->middleware('PermissionCheck:general_settings_read');
                Route::post('/general-settings', 'updateGeneralSetting')->name('settings.general-settings')->middleware('PermissionCheck:general_settings_update');

                Route::get('/storage-setting', 'storagesetting')->name('settings.storagesetting')->middleware('PermissionCheck:storage_settings_read');
                Route::put('/storage-setting-update', 'storageSettingUpdate')->name('settings.storageSettingUpdate')->middleware("PermissionCheck:storage_settings_update");

                Route::get('/recaptcha-setting', 'recaptchaSetting')->name('settings.recaptcha-setting')->middleware('PermissionCheck:recaptcha_settings_read');
                Route::post('/recaptcha-setting', 'updateRecaptchaSetting')->name('settings.recaptcha-setting')->middleware('PermissionCheck:recaptcha_settings_update');

                Route::get('/email-setting', 'mailSetting')->name('settings.mail-setting')->middleware('PermissionCheck:email_settings_read');
                Route::post('/email-setting', 'updateMailSetting')->name('settings.mail-setting')->middleware('PermissionCheck:email_settings_update');

                //Theme Change
                Route::post('/change-theme', 'changeTheme')->name('changeTheme');
            });

            Route::controller(TeamController::class)->prefix('/teams')->group(function () {
                Route::get('/', 'index')->name('teams.index')->middleware('PermissionCheck:team_read');
                Route::post('/store', 'store')->name('teams.store')->middleware('PermissionCheck:team_create');
                Route::get('/delete/{id}', 'destroy')->name('teams.delete')->middleware('PermissionCheck:team_delete');
                Route::get('/edit/{id}', 'edit')->middleware('PermissionCheck:team_update');
                Route::post('/update', 'update')->name('teams.update')->middleware('PermissionCheck:team_update');
            });

            Route::controller(PlayerController::class)->prefix('/player')->group(function () {
                Route::get('/', 'index')->name('player.index')->middleware('PermissionCheck:player_read');
                Route::post('/store', 'store')->name('player.store')->middleware('PermissionCheck:player_create');
                Route::get('/delete/{id}', 'destroy')->name('player.delete')->middleware('PermissionCheck:player_delete');
                Route::get('/edit/{id}', 'edit')->middleware('PermissionCheck:player_update');
                Route::post('/update', 'update')->name('player.update')->middleware('PermissionCheck:player_update');
            });

            Route::controller(MatchhController::class)->prefix('/matchh')->group(function () {
                Route::get('/', 'index')->name('matchh.index')->middleware('PermissionCheck:matchh_read');
                Route::post('/store', 'store')->name('matchh.store')->middleware('PermissionCheck:matchh_create');
                Route::get('/delete/{id}', 'destroy')->name('matchh.delete')->middleware('PermissionCheck:matchh_delete');
                Route::get('/edit/{id}', 'edit')->middleware('PermissionCheck:matchh_update');
                Route::post('/update', 'update')->name('matchh.update')->middleware('PermissionCheck:matchh_update');
            });

            Route::controller(ScoreupdateController::class)->prefix('/scoreupdates')->group(function () {
                Route::get('/', 'index')->name('scoreupdates.index')->middleware('PermissionCheck:scoreupdates_read');
                Route::post('/store', 'store')->name('scoreupdates.store')->middleware('PermissionCheck:scoreupdates_create');
                Route::get('/delete/{id}', 'destroy')->name('scoreupdates.delete')->middleware('PermissionCheck:scoreupdates_delete');
                Route::get('/edit/{id}', 'edit')->middleware('PermissionCheck:scoreupdates_update');
                Route::post('/update', 'update')->name('scoreupdates.update')->middleware('PermissionCheck:scoreupdates_update');
            });

            Route::controller(UpdatebowlerController::class)->prefix('/updatebowler')->group(function () {
                Route::get('/', 'index')->name('updatebowler.index')->middleware('PermissionCheck:updatebowler_read');
                Route::post('/store', 'store')->name('updatebowler.store')->middleware('PermissionCheck:updatebowler_create');
                Route::get('/delete/{id}', 'destroy')->name('updatebowler.delete')->middleware('PermissionCheck:updatebowler_delete');
                Route::get('/edit/{id}', 'edit')->middleware('PermissionCheck:updatebowler_update');
                Route::post('/update', 'update')->name('updatebowler.update')->middleware('PermissionCheck:updatebowler_update');
            });

            Route::controller(ScoreController::class)->prefix('/score')->group(function () {
                Route::get('/', 'index')->name('score.index')->middleware('PermissionCheck:score_read');
                Route::post('/store', 'store')->name('score.store')->middleware('PermissionCheck:score_create');
                Route::get('/delete/{id}', 'destroy')->name('score.delete')->middleware('PermissionCheck:score_delete');
                Route::get('/edit/{id}', 'edit')->middleware('PermissionCheck:score_update');
                Route::post('/update', 'update')->name('score.update')->middleware('PermissionCheck:score_update');

                Route::get('/get-series-list', 'getSeriesList')->name('getSeriesListScore');
                Route::get('/get-team-list', 'getTeamList')->name('getTeamListScore');
                Route::get('/get-player-list', 'getPlayerList')->name('getPlayerListScore');
            });

            Route::controller(ScorebowlerfirstController::class)->prefix('/scorebowlerfirst')->group(function () {
                Route::get('/', 'index')->name('scorebowlerfirst.index')->middleware('PermissionCheck:scorebowlerfirst_read');
                Route::post('/store', 'store')->name('scorebowlerfirst.store')->middleware('PermissionCheck:scorebowlerfirst_create');
                Route::get('/delete/{id}', 'destroy')->name('scorebowlerfirst.delete')->middleware('PermissionCheck:scorebowlerfirst_delete');
                Route::get('/edit/{id}', 'edit')->middleware('PermissionCheck:scorebowlerfirst_update');
                Route::post('/update', 'update')->name('scorebowlerfirst.update')->middleware('PermissionCheck:scorebowlerfirst_update');

                Route::get('/get-team-list', 'getTeamList')->name('getTeamListScorebowlerfirst');
                Route::get('/get-player-list', 'getPlayerList')->name('getPlayerListScorebowlerfirst');
            });

            Route::controller(ScorebattersecondController::class)->prefix('/scorebattersecond')->group(function () {
                Route::get('/', 'index')->name('scorebattersecond.index')->middleware('PermissionCheck:scorebattersecond_read');
                Route::post('/store', 'store')->name('scorebattersecond.store')->middleware('PermissionCheck:scorebattersecond_create');
                Route::get('/delete/{id}', 'destroy')->name('scorebattersecond.delete')->middleware('PermissionCheck:scorebattersecond_delete');
                Route::get('/edit/{id}', 'edit')->middleware('PermissionCheck:scorebattersecond_update');
                Route::post('/update', 'update')->name('scorebattersecond.update')->middleware('PermissionCheck:scorebattersecond_update');

                Route::get('/get-team-list', 'getTeamList')->name('getTeamListScorebattersecond');
                Route::get('/get-player-list', 'getPlayerList')->name('getPlayerListScorebattersecond');
            });

            Route::controller(ScorebowlersecondController::class)->prefix('/scorebowlersecond')->group(function () {
                Route::get('/', 'index')->name('scorebowlersecond.index')->middleware('PermissionCheck:scorebowlersecond_read');
                Route::post('/store', 'store')->name('scorebowlersecond.store')->middleware('PermissionCheck:scorebowlersecond_create');
                Route::get('/delete/{id}', 'destroy')->name('scorebowlersecond.delete')->middleware('PermissionCheck:scorebowlersecond_delete');
                Route::get('/edit/{id}', 'edit')->middleware('PermissionCheck:scorebowlersecond_update');
                Route::post('/update', 'update')->name('scorebowlersecond.update')->middleware('PermissionCheck:scorebowlersecond_update');

                Route::get('/get-team-list', 'getTeamList')->name('getTeamListScorebowlersecond');
                Route::get('/get-player-list', 'getPlayerList')->name('getPlayerListScorebowlersecond');
            });

            Route::controller(CommentryCreateController::class)->prefix('/commentrycreate')->group(function () {
                Route::get('/', 'index')->name('commentrycreate.index')->middleware('PermissionCheck:commentrycreate_read');
                Route::post('/store', 'store')->name('commentrycreate.store')->middleware('PermissionCheck:commentrycreate_create');
                Route::get('/delete/{id}', 'destroy')->name('commentrycreate.delete')->middleware('PermissionCheck:commentrycreate_delete');
                Route::get('/edit/{id}', 'edit')->middleware('PermissionCheck:commentrycreate_update');
                Route::post('/update', 'update')->name('commentrycreate.update')->middleware('PermissionCheck:commentrycreate_update');
            });

            Route::controller(CommentryController::class)->prefix('/commentry')->group(function () {
                Route::get('/', 'index')->name('commentry.index')->middleware('PermissionCheck:commentry_read');
                Route::post('/store', 'store')->name('commentry.store')->middleware('PermissionCheck:commentry_create');
                Route::get('/delete/{id}', 'destroy')->name('commentry.delete')->middleware('PermissionCheck:commentry_delete');
                Route::get('/edit/{id}', 'edit')->middleware('PermissionCheck:commentry_update');
                Route::post('/update', 'update')->name('commentry.update')->middleware('PermissionCheck:commentry_update');

                Route::get('/get-team-list', 'getTeamList')->name('getTeamListCommentry');
                Route::get('/get-player-list', 'getPlayerList')->name('getPlayerListCommentry');
            });

            Route::controller(CurveController::class)->prefix('/curve')->group(function () {
                Route::get('/', 'index')->name('curve.index')->middleware('PermissionCheck:curve_read');
                Route::post('/store', 'store')->name('curve.store')->middleware('PermissionCheck:curve_create');
                Route::get('/delete/{id}', 'destroy')->name('curve.delete')->middleware('PermissionCheck:curve_delete');
                Route::get('/edit/{id}', 'edit')->middleware('PermissionCheck:curve_update');
                Route::post('/update', 'update')->name('curve.update')->middleware('PermissionCheck:curve_update');

                Route::get('/get-team-list', 'getTeamList')->name('getTeamListCurve');
                Route::get('/get-player-list', 'getPlayerList')->name('getPlayerListCurve');
            });



            // Football Start
            Route::controller(FootballTeamController::class)->prefix('/footballteams')->group(function () {
                Route::get('/', 'index')->name('footballteams.index')->middleware('PermissionCheck:football_team_read');
                Route::post('/store', 'store')->name('footballteams.store')->middleware('PermissionCheck:football_team_create');
                Route::get('/delete/{id}', 'destroy')->name('footballteams.delete')->middleware('PermissionCheck:football_team_delete');
                Route::get('/edit/{id}', 'edit')->middleware('PermissionCheck:football_team_update');
                Route::post('/update', 'update')->name('footballteams.update')->middleware('PermissionCheck:football_team_update');
            });

            Route::controller(FootballPlayerController::class)->prefix('/footballplayers')->group(function () {
                Route::get('/', 'index')->name('footballplayers.index')->middleware('PermissionCheck:football_players_read');
                Route::post('/store', 'store')->name('footballplayers.store')->middleware('PermissionCheck:football_players_create');
                Route::get('/delete/{id}', 'destroy')->name('footballplayers.delete')->middleware('PermissionCheck:football_players_delete');
                Route::get('/edit/{id}', 'edit')->middleware('PermissionCheck:football_players_update');
                Route::post('/update', 'update')->name('footballplayers.update')->middleware('PermissionCheck:football_players_update');
            });

            Route::controller(GoalScoreController::class)->prefix('/goalscores')->group(function () {
                Route::get('/', 'index')->name('goalscores.index')->middleware('PermissionCheck:goal_scores_read');
                Route::post('/store', 'store')->name('goalscores.store')->middleware('PermissionCheck:goal_scores_create');
                Route::get('/delete/{id}', 'destroy')->name('goalscores.delete')->middleware('PermissionCheck:goal_scores_delete');
                Route::get('/edit/{id}', 'edit')->middleware('PermissionCheck:goal_scores_update');
                Route::post('/update', 'update')->name('goalscores.update')->middleware('PermissionCheck:goal_scores_update');
            });

            Route::controller(FootballMatchController::class)->prefix('/footballmatchs')->group(function () {
                Route::get('/', 'index')->name('footballmatchs.index')->middleware('PermissionCheck:football_matchs_read');
                Route::post('/store', 'store')->name('footballmatchs.store')->middleware('PermissionCheck:football_matchs_create');
                Route::get('/delete/{id}', 'destroy')->name('footballmatchs.delete')->middleware('PermissionCheck:football_matchs_delete');
                Route::get('/edit/{id}', 'edit')->middleware('PermissionCheck:football_matchs_update');
                Route::post('/update', 'update')->name('footballmatchs.update')->middleware('PermissionCheck:football_matchs_update');
            });

            Route::controller(FootballScoreController::class)->prefix('/footballscores')->group(function () {
                Route::get('/', 'index')->name('footballscores.index')->middleware('PermissionCheck:football_scores_read');
                Route::post('/store', 'store')->name('footballscores.store')->middleware('PermissionCheck:football_scores_create');
                Route::get('/delete/{id}', 'destroy')->name('footballscores.delete')->middleware('PermissionCheck:football_scores_delete');
                // Route::get('/edit/{id}','edit')->middleware('PermissionCheck:footballscores_update');
                Route::get('/edit/{id}', 'edit');
                Route::post('/update', 'update')->name('footballscores.update');

                Route::get('/get-team-list', 'getTeamList')->name('getTeamListFootballscores');
                Route::get('/get-player-list', 'getPlayerList')->name('getPlayerListFootballscores');
            });

            Route::controller(ManagePublicTableController::class)->prefix('manage-public')->group(function () {
                Route::get('/', 'index')->name('manage-public.index');
                Route::post('/store', 'store')->name('manage-public.store');
                Route::get('/delete/{id}', 'destroy')->name('manage-public.delete');
                Route::get('/edit/{id}', 'edit');
                Route::post('/update', 'update')->name('manage-public.update');
            });

            Route::controller(NewsController::class)->prefix('news')->group(function () {
                Route::get('/', 'index')->name('news.index');
                Route::get('/create', 'create')->name('news.create');
                Route::post('/store', 'store')->name('news.store');
                Route::get('/edit/{id}', 'edit')->name('news.edit');
                Route::put('/update/{id}', 'update')->name('news.update');
                Route::delete('/delete/{id}', 'delete')->name('news.delete');
            });

            Route::controller(SeriesController::class)->prefix('series')->group(function () {
                Route::get('/', 'index')->name('series.index');
                Route::get('/create', 'create')->name('series.create');
                Route::post('/store', 'store')->name('series.store');
                Route::get('/edit/{id}', 'edit')->name('series.edit');
                Route::put('/update/{id}', 'update')->name('series.update');
                Route::delete('/delete/{id}', 'delete')->name('series.delete');
            });

            Route::controller(LeagueController::class)->prefix('leagues')->group(function () {
                Route::get('/', 'index')->name('leagues.index');
                Route::get('/create', 'create')->name('leagues.create');
                Route::post('/store', 'store')->name('leagues.store');
                Route::get('/edit/{id}', 'edit')->name('leagues.edit');
                Route::put('/update/{id}', 'update')->name('leagues.update');
                Route::delete('/delete/{id}', 'delete')->name('leagues.delete');
            });

            Route::controller(PointController::class)->prefix('points')->group(function () {
                Route::get('/', 'index')->name('points.index');
                Route::get('/create', 'create')->name('points.create');
                Route::post('/store', 'store')->name('points.store');
                Route::get('/edit/{id}', 'edit')->name('points.edit');
                Route::put('/update/{id}', 'update')->name('points.update');
                Route::delete('/delete/{id}', 'delete')->name('points.delete');
            });

            Route::controller(RankingController::class)->prefix('rankings')->group(function () {
                Route::get('/', 'index')->name('rankings.index');
                Route::post('/store', 'store')->name('rankings.store');
                Route::get('/delete/{id}', 'destroy')->name('rankings.delete');
                Route::get('/edit/{id}', 'edit');
                Route::post('/update', 'update')->name('rankings.update');
                Route::get('/get-player-list/{id}', 'getPlayerList')->name('getPlayerList');
            });

            Route::controller(FootballRankingController::class)->prefix('footballrankings')->group(function () {
                Route::get('/', 'index')->name('footballrankings.index');
                Route::post('/store', 'store')->name('footballrankings.store');
                Route::get('/delete/{id}', 'destroy')->name('footballrankings.delete');
                Route::get('/edit/{id}', 'edit');
                Route::post('/update', 'update')->name('footballrankings.update');

                Route::get('/get-player-list', 'getPlayerList')->name('getPlayerList');
            });

        });
    });
});

Route::get('get-states', [PublicController::class, 'getStates'])->name('getStates');
Route::get('get-graph', [PublicController::class, 'getGraph'])->name('getGraph');
Route::get('/', [PublicController::class, 'view'])->name('cricket');
Route::get('cricket-match-shedule', [PublicController::class, 'shedule'])->name('shedule');
Route::get('cricket-match-arcive', [PublicController::class, 'arcive'])->name('arcive');
Route::get('cricket-match-score-status/{matchId}', [PublicController::class, 'cricketMatchScoreStatus'])->name('cricketMatchScoreStatus');
Route::get('cricket-match-commentry-status/{matchId}', [PublicController::class, 'cricketMatchCommentryStatus'])->name('cricketMatchCommentryStatus');
Route::get('cricket-match-stats-status/{matchId}', [PublicController::class, 'cricketMatchStatsStatus'])->name('cricketMatchStatsStatus');
// Route::get('series-status', [PublicController::class, 'series'])->name('series');

Route::get('sports-news', [PublicController::class, 'news'])->name('news');
Route::get('show-sports-news/{newsId}', [PublicController::class, 'showNews'])->name('showNews');

Route::get('series-status', [PublicController::class, 'getSeriesList'])->name('series');
Route::get('match-list/{series_id}', [PublicController::class, 'getMatchList'])->name('getMatchList');

Route::get('series-team-status', [PublicController::class, 'getSeriesTeamList'])->name('getSeriesTeamList');
Route::get('team-list/{series_id}', [PublicController::class, 'getTeamList'])->name('getTeamList');

Route::get('leagues-status', [FootballHomeController::class, 'getLeaguesList'])->name('leagues');
Route::get('league-match-list/{leagues_id}', [FootballHomeController::class, 'getLeagueMatchList'])->name('getLeaguesList');

Route::get('leagues-team-status', [FootballHomeController::class, 'getleaguesTeamList'])->name('getleaguesTeamList');
Route::get('leagues-team-list/{leagues_id}', [FootballHomeController::class, 'getLeagueTeamList'])->name('getLeagueTeamList');

// match details
Route::get('football-match-score-status/{matchId}', [FootballHomeController::class, 'footballMatchScoreStatus'])->name('footballMatchScoreStatus');
Route::get('football_scores', [FootballHomeController::class, 'view'])->name('football');

Route::get('football-match-shedule', [FootballHomeController::class, 'FootballShedule'])->name('FootballShedule');

Route::get('football-match-arcive', [FootballHomeController::class, 'FootballArcive'])->name('FootballArcive');

Route::get('/languages/change', [LanguageController::class, 'changeLanguage'])->name('languages.change');

Route::get('cricket-team-status', [PlayerController::class, 'cricketTeamStatus'])->name('cricketTeamStatus');
Route::get('cricket-women-team-status', [PlayerController::class, 'cricketWomenTeamStatus'])->name('cricketWomenTeamStatus');
Route::get('football-team-status', [FootballPlayerController::class, 'footballTeamStatus'])->name('footballTeamStatus');
Route::get('football-women-team-status', [FootballPlayerController::class, 'footballWomenTeamStatus'])->name('footballWomenTeamStatus');


Route::get('t-20-batter-ranking-status', [RankingController::class, 'T20BatterRanking'])->name('T20BatterRanking');
Route::get('get-months', [RankingController::class, 'getMonths'])->name('getMonths');

Route::get('w-t-20-batter-ranking-status', [RankingController::class, 'WT20BatterRanking'])->name('WT20BatterRanking');
Route::get('t-20-bowler-ranking-status', [RankingController::class, 'T20BowlerRanking'])->name('T20BowlerRanking');
Route::get('w-t-20-bowler-ranking-status', [RankingController::class, 'WT20BowlerRanking'])->name('WT20BowlerRanking');
Route::get('odi-batter-ranking-status', [RankingController::class, 'OdiBatterRanking'])->name('OdiBatterRanking');
Route::get('w-odi-batter-ranking-status', [RankingController::class, 'WOdiBatterRanking'])->name('WOdiBatterRanking');
Route::get('odi-bowler-ranking-status', [RankingController::class, 'OdiBowlerRanking'])->name('OdiBowlerRanking');
Route::get('w-odi-bowler-ranking-status', [RankingController::class, 'WOdiBowlerRanking'])->name('WOdiBowlerRanking');
Route::get('test-batter-ranking-status', [RankingController::class, 'TestBatterRanking'])->name('TestBatterRanking');
Route::get('w-test-batter-ranking-status', [RankingController::class, 'WTestBatterRanking'])->name('WTestBatterRanking');
Route::get('test-bowler-ranking-status', [RankingController::class, 'TestBowlerRanking'])->name('TestBowlerRanking');
Route::get('w-test-bowler-ranking-status', [RankingController::class, 'WTestBowlerRanking'])->name('WTestBowlerRanking');

Route::get('t-20-ranking-status', [TeamController::class, 'T20Ranking'])->name('T20Ranking');
Route::get('odi-ranking-status', [TeamController::class, 'OdiRanking'])->name('OdiRanking');
Route::get('test-ranking-status', [TeamController::class, 'TestRanking'])->name('TestRanking');

Route::get('w-t-20-ranking-status', [TeamController::class, 'wT20Ranking'])->name('wT20Ranking');
Route::get('w-odi-ranking-status', [TeamController::class, 'wOdiRanking'])->name('wOdiRanking');
Route::get('w-test-ranking-status', [TeamController::class, 'wTestRanking'])->name('wTestRanking');

Route::get('mans-football-ranking-status', [FootballRankingController::class, 'FootballManRanking'])->name('FootballManRanking');
Route::get('women-football-ranking-status', [FootballRankingController::class, 'FootballWomanRanking'])->name('FootballWomanRanking');

Route::get('football-team-man-ranking-status', [FootballTeamController::class, 'footballTeamManRankings'])->name('footballTeamManRankings');
Route::get('football-team-woman-ranking-status', [FootballTeamController::class, 'footballTeamWomenRankings'])->name('footballTeamWomenRankings');

