<div class="pagination clearfix">

    <div class="previous-btn">

        <?php

        if($pagination['previous']):?>

            <a href="<?=site_url('home/'.$pagination['previous'])?>">

                <button class="btn btn-warning" type="button">Previous</button>

            </a>

    </div>

    <div class="next-btn">

        <?php endif;

        if($pagination['next']):?>

            <a href="<?=site_url('home/'.$pagination['next'])?>"><button type="button" class="btn btn-warning">Next</button></a>

        <?php endif;?>

    </div>

</div> <!-- pagination -->