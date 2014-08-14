<?php
// created: 2014-08-07 11:35:47
$viewdefs['lm_TechnicalSupport']['EditView'] = array (
  'templateMeta' => 
  array (
    'maxColumns' => '2',
    'widths' => 
    array (
      0 => 
      array (
        'label' => '10',
        'field' => '30',
      ),
      1 => 
      array (
        'label' => '10',
        'field' => '30',
      ),
    ),
    'useTabs' => false,
    'tabDefs' => 
    array (
      'DEFAULT' => 
      array (
        'newTab' => false,
        'panelDefault' => 'expanded',
      ),
    ),
  ),
  'panels' => 
  array (
    'default' => 
    array (
      0 => 
      array (
        0 => 'name',
      ),
      1 => 
      array (
        0 => 
        array (
          'name' => 'type',
          'studio' => 'visible',
          'label' => 'LBL_TYPE',
        ),
      ),
      2 => 
      array (
        0 => 
        array (
          'name' => 'priority',
          'studio' => 'visible',
          'label' => 'LBL_PRIORITY',
        ),
      ),
      3 => 
      array (
        0 => 'description',
      ),
    ),
  ),
);