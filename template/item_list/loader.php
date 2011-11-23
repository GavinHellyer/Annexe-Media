<?php
/**
 * @ver 1.0
 * @template List of Items
 * @css true
*/
?>
<?php if ($items) { ?>
  <?php $_items = $this->array_to_object($items); ?>
  <?php foreach($_items as $_item) { ?>

<div class="temp-item-list">
  <ul>
    <li>
      <div class="video-image"><img src="<?php echo $this->generate_image($_item->img, $_item->link.'.jpg', '250x370', true); ?>" /></div>
      <div class="video-title"><?php echo $_item->title; ?></div>
      <div class="video-story"><?php echo $_item->story; ?></div>
      <div class="video-rating">
        <?php echo $this->generate_rating($_item->rating)."\n"; ?>
      </div>

      <?php if ($_item->certificate) { ?>

      <div class="video-certificate"><?php echo $_item->certificate; ?></div>

      <?php } ?>

    </li>
  </ul>
</div>

  <?php } ?>
<?php } else { ?>

<div class="message">No Items Found</div>

<?php } ?>