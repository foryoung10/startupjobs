<?php

class job extends CActiveRecord {
    
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }
    
  /*  public function relations() {
    return array(
      // other relations
      array('company', self::BELONGS_TO, 'company', 'CID'),
    );
    }
    */
    public function relations()
    {
        return array(
            'company'=>array(self::BELONGS_TO, 'company', 'CID'),
            
        );
    }
    public function rules() {
   
        return array(
            
        );
    }
}


?>
