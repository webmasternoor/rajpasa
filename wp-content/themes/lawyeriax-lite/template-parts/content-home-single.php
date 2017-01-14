<div class="col-md-4 news-box">
  <div class="news-title-wrap">
    <div class="news-date">
      <?php
      $day    = get_the_time('d');
      $month  = get_the_time('M'); ?>

      <span><?php echo $day ?></span>
      <span><?php echo $month ?></span>
    </div>
    <div class="news-post-title-wrap">
      <h4 class="news-post-title">
        <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
      </h4>
    </div>
    <div class="news-posted-on">
      <a href="<?php the_author_link(); ?> " title="<?php the_author(); ?>"><?php the_author(); ?></a>
      <a href="<?php comments_link() ?>"><?php comments_number( 'no comments', '1 comment', '% comments' ); ?></a>
    </div>
  </div>
  <?php if (has_post_thumbnail()) { ?>
  <div class="news-img-wrap">
    <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
      <?php the_post_thumbnail('post-thumbnails-home',array( 'alt' => get_the_title()));?>

    </a>
  </div> <?php }
  if(!empty(get_post()->post_content)) {
  ?>
  <div class="border-left news-content-wrap">
    <p><?php the_excerpt();?></p>
  </div>
  <?php } ?>
</div>
