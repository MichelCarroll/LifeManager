<?php
// auto-generated by sfDatabaseConfigHandler
// date: 2011/02/23 12:39:02

return array(
'doctrine' => new sfDoctrineDatabase(array (
  'dsn' => 'mysql:host=localhost;dbname=lifemanager',
  'username' => 'lifemanager',
  'password' => 'lifemanager',
  'attributes' => 
  array (
    'tblname_format' => 'lm_%s',
  ),
  'name' => 'doctrine',
)),);