<?php

class Application_Model_City extends Zend_Db_Table_Abstract
{
    protected $_name = 'city';
    protected $_dependentTables= array('Application_Model_Car');





}

