<h2><?php echo __('Tax list') ?></h2>

<table class="fatture">
  <thead>
    <tr>
      <th><?php echo __("name") ?></th>
      <th><?php echo __("value") ?></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($tassa_list as $tassa): ?>
    <tr>
      <td><a href="<?php echo url_for('tax/edit?id='.$tassa->getId()) ?>" title="<?php echo $tassa->getNome() ?>"><?php echo $tassa->getNome() ?></a></td>
      <td><?php echo $tassa->getValore() ?></td>
      <td><?php echo link_to(image_tag('icons_tango/trash-full.png', 'alt=delete'), 'tax/delete?id='.$tassa->getId(), 'post=true&confirm='.__('are you sure?').' title=delete') ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>