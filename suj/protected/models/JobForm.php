<?php


class JobForm extends CFormModel
{
	public $title;
	public $description;
	public $type;
        public $salary;
        public $created;
        public $modified;
	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// name, email, subject and body are required
			array('title, description, type', 'required'),
		
                        array('salary','safe'),
                    
                      array('created,modified','default',
                            'value'=>new CDbExpression('NOW()'),
                        'setOnEmpty'=>false,'on'=>'insert'),
    
                        // verifyCode needs to be entered correctly
		//	array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
		);
	}

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return array(
			'verifyCode'=>'Verification Code',
		);
	}
}