{{-- $rate で評価値を1-5で指定 --}}

<div class="rating">
    <?php for($i = 5; $i > 0; $i--):?>
        <?php if($rate >= $i):?>
            <label style="color:#FFD700"></label>
        <?php else:?>
            <label style="color:#ddd"></label>
        <?php endif;?>
    <?php endfor; ?>
</div>
