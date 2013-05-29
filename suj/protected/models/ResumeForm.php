<?php


class ResumeForm extends CFormModel
{
    public $resume;
    
    
    /**
     * Declares the validation rules.
     */
    //to be changed

    public function rules() {
        return array(
            // name, email, subject and body are required
            array('resume ', 'safe'),
            // email has to be a valid email address
           // array('address,contact, image, about','safe'),
            
            // verifyCode needs to be entered correctly
            array('resume', 'file','on'=>'insert','types'=>'pdf',  ),
           
// array('title', 'length', 'max'=>255, 'on'=>'insert,update'),
     //       array('email, username','unique','className'=>'member'),
            //array('verifyCode', 'captcha', 'allowEmpty' => !CCaptcha::checkRequirements()),
           );
    }
    

    /*
     * Declares customized attribute labels.
     * If not declared here, an attribute would have a label that is
     * the same as its name with the first letter in upper case.
     */

    public function attributeLabels() {
        return array(
        );
    }

}
?>