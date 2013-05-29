<?php

class application extends CActiveRecord {
    
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }
    
    public function rules() {
        return array(
            
        );
    }

    public function relations() {
        return array(
        // other relations
                'job'=> array(self::BELONGS_TO, 'job', 'JID'),
                'company'=> array(self::BELONGS_TO, 'company', 'CID'),
                'user'=> array(self::BELONGS_TO, 'user', 'ID'),
      
        
        );
    } 
}

?>
