<?php echo select_tag('stato',options_for_select(array(
  'in fase di approvazione' => 'In fase di approvazione',
  'approvato' => 'Approvato',
  'non approvato' => 'Non approvato',
  'chiuso' => 'Chiuso',
),$bug->getStato()))?>