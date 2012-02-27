<?php
/**
 * @ver 1.0
 * @template List of Folder Path Items
 * @css true
 * @js true
*/
?>
<?php if ($items) { ?>
  <?php $_items = $this->array_to_object($items); ?>

<div class="temp-folder-list">
  <ul>

  <?php foreach($_items as $_item_header => $_item) { ?>

    <li class="folder-item-header">

      <?php echo $_item_header; ?>

    </li>

    <?php foreach($_item as $_index) { ?>

      <li class="folder-item" data-format="folder-normal">

        <?php echo $_index->folder; ?>

      </li>

    <?php } ?>
  <?php } ?>

  </ul>
</div>

<?php } else { ?>

<div class="message">No Items Found</div>

<?php } ?>