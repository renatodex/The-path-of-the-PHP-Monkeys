<?php
	$tpm = new TPMStoryPage();
	$story_pages = json_decode($tpm->findAll());
?>

<?php foreach($story_pages as $story_page): ?>
  <?php $next_story_page = $story_page->next ?>
  <div class="contend" id="<?php echo $story_page->nome ?>">
    <ul>
      <li style="width:<?php echo $story_page->wl ?>px; background:url(<?php echo TPM_BASE_URL. $story_page->left_url_full ?>) no-repeat center right;"></li>
      <li class="main" style="width:<?php echo $story_page->wm ?>px; background:url(<?php echo TPM_BASE_URL . $story_page->main_url_full ?>) no-repeat center center;">
        <?php echo $story_page->titulo ?>
      </li>
      <li style="width:<?php echo $story_page->wr ?>px; background:url(<?php echo TPM_BASE_URL . $story_page->right_url_full ?>) no-repeat left center;"></li>
    </ul>

    <div class="desc">
      <h1><?php echo $story_page->titulo ?></h1>
      <span>---------------------------</span>
      <p><?php echo $story_page->desc ?></p>

      <?php if($next_story_page != null): ?>
        <a href="#<?php echo $next_story_page->nome ?>" title="Continue" class="play">Continue...</a>
      <?php endif; ?>
    </div>
  </div>
<?php endforeach;  ?>