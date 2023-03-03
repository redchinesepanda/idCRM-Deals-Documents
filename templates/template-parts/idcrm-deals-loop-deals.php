<?php if ( !empty( $args['data'] ) ): ?>
    <?php foreach($args['data'] as $arg): ?>
        <a href="<?php echo $arg['post_url']; ?>" class="d-flex align-items-center border-bottom py-3">
            <div class="user-img position-relative d-inline-block mr-0 mr-md-3">
                <img src="<?php echo $arg['post_thumbnail'];  ?>" alt="user" class="rounded-circle w-100" />
            </div>
            <div class="w-85 d-md-flex align-items-center v-middle ps-3">
                <div class="w-85">
                    <h5 class="mb-0 mt-1 font-weight-medium">
                        <?php echo $arg['post_title']; ?>
                    </h5>
                    <div class="text-nowrap ms-auto time small">
                        <?php echo $arg['post_date']; ?>
                    </div>
                    <span class="fs-6 text-nowrap d-block text-truncate mail-desc text-muted fw-normal">
                        <i class="icon-<?php echo $arg['post_icon']; ?> events-item-inner"></i>
                        <?php echo $arg['post_content']; ?>
                    </span>
                </div>
            </div>
        </a>
    <?php endforeach; ?>
<?php else: ?>
    <h5 class="mb-0 mt-1 font-weight-medium">
        <?php echo $args['message']; ?>
    </h5>
<?php endif; ?>