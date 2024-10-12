
<?php
// $page = $_SERVER['PHP_SELF'];
// $sec = '5';
?>

<head>
    
</head>
<?php $__env->startSection('admin_content'); ?>
    <title><?php echo e(___('cricket.cricket')); ?></title>
    <div class="page-content">
        <div class="card">
            <h3 class="card-header"><?php echo e(___('cricket.live')); ?></h3>
            <div class="card-body">
                <div class="slick-carousel">
                    <?php $__currentLoopData = $match2->sortByDesc('match_datetime'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="card">
                            <a href="<?php echo e(route('cricketMatchScoreStatus', @$row->id)); ?>">
                                <?php
                                    $teamOne = @$row->team->team_name;
                                    $goalOne = @$row->score->goal->goal;
                                    $teamTwo = @$row->team2->team_name;
                                    $goalTwo = @$row->score->goal2->goal;
                                ?>
                                <div class="card-body">
                                    <h6 class="card-title">
                                        <strong><?php echo e(___('cricket.' . $teamOne)); ?></strong> <?php echo e(___('cricket.' . $goalOne)); ?>

                                        - <strong><?php echo e(___('cricket.' . $teamTwo)); ?></strong>
                                        <?php echo e(___('cricket.' . $goalTwo)); ?>

                                    </h6>
                                    <p class="card-text">
                                        <?php
                                            $date = $row->match_datetime;
                                        ?>
                                        <?php echo e(___('cricket.' . $date)); ?></p>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>



            <h3 class="card-header"><?php echo e(___('cricket.upcomming_match')); ?></h3>
            <div class="card-body">
                <div class="slick-carousel">
                    <?php $__currentLoopData = $match->sortByDesc('match_datetime'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="card">
                            <a href="<?php echo e(route('cricketMatchScoreStatus', @$row->id)); ?>">
                                <?php
                                    $teamOne = @$row->team->team_name;
                                    $goalOne = @$row->score->goal->goal;
                                    $teamTwo = @$row->team2->team_name;
                                    $goalTwo = @$row->score->goal2->goal;
                                ?>
                                <div class="card-body">
                                    <h6 class="card-title">
                                        <strong><?php echo e(___('cricket.' . $teamOne)); ?></strong> <?php echo e(___('cricket.' . $goalOne)); ?>

                                        - <strong><?php echo e(___('cricket.' . $teamTwo)); ?></strong>
                                        <?php echo e(___('cricket.' . $goalTwo)); ?>

                                    </h6>
                                    <p class="card-text">
                                        <?php
                                            $date = $row->match_datetime;
                                        ?>
                                        <?php echo e(___('cricket.' . $date)); ?></p>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

            <h3 class="card-header"><?php echo e(___('cricket.game_over')); ?></h3>
            <div class="card-body">
                <div class="slick-carousel">
                    <?php $__currentLoopData = $match1->sortByDesc('match_datetime'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="card">
                            <a href="<?php echo e(route('cricketMatchScoreStatus', @$row->id)); ?>">
                                <?php
                                    $teamOne = @$row->team->team_name;
                                    $goalOne = @$row->score->goal->goal;
                                    $teamTwo = @$row->team2->team_name;
                                    $goalTwo = @$row->score->goal2->goal;
                                ?>
                                <div class="card-body">
                                    <h6 class="card-title">
                                        <strong><?php echo e(___('cricket.' . $teamOne)); ?></strong> <?php echo e(___('cricket.' . $goalOne)); ?>

                                        - <strong><?php echo e(___('cricket.' . $teamTwo)); ?></strong>
                                        <?php echo e(___('cricket.' . $goalTwo)); ?>

                                    </h6>
                                    <p class="card-text">
                                        <?php
                                            $date = $row->match_datetime;
                                        ?>
                                        <?php echo e(___('cricket.' . $date)); ?></p>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>


            <div id="matchData">

            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


    <script>
        $(document).ready(function() {
            $('.slick-carousel').slick({
                dots: true,
                infinite: true,
                speed: 300,
                slidesToShow: 4,
                slidesToScroll: 1,
                responsive: [{
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            infinite: true,
                            dots: true
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.publichome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Shahed\Herd\khelardan\resources\views/public/index.blade.php ENDPATH**/ ?>