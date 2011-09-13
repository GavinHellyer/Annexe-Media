<?php
/**
 * @ver 1.0
 * @template Dashboard
 * @css true
 * @js true
*/
?>
<?php if ($apps) { ?>
  <?php $_apps = $this->array_to_object($apps); ?>

<div id="temp-dashboard">

  <?php foreach($_apps as $_app) { ?>
    <?php $icon = ((isset($_app->icon) && $_app->icon) ? '<img src="'.$_app->icon.'" />' : $_app->name); ?>

  <div class="app-icon">
    <a href="<?php echo SERVER_HOST.$_app->app; ?>" data-tooltip="<?php echo $_app->name; ?><?php echo (($_app->description) ? " - ".$_app->description : ''); ?>"><?php echo $icon; ?></a>
  </div>

  <?php } ?>

</div>

<?php } else { ?>

<div class="message">No Apps Found</div>

<?php } ?>