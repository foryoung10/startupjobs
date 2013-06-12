<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class UpdateForm extends CFormModel
{       public $cname;
	public $image;
	public $coverpicture;
	public $mission;
        public $culture;
        public $benefits;
        public $address;
        public $contact;
        public $website;
        public $facebook;
        public $awards;
        public $started;
        public $summary;
        public $cover_letter;
    
	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// name, email, subject and body are required
	     array('cname, address,contact,mission,culture,benefits,image,coverpicture','safe'),
          
             array('image', 'file',
                   'types'=>'jpg, png, jpeg, gif',
                   'maxSize' => 1024 * 1024 * 3,   
                   'allowEmpty'=>true, ),
             array('coverpicture', 'file',
                   'types'=>'jpg, png, jpeg',
                   'maxSize' => 1024 * 1024 * 3,   
                   'allowEmpty'=>true, ),
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
                        'cemail'    => 'Email Address',
                        'cname'     => 'Company Name',
                        'image'     => 'Company logo',
                        'cover'     => 'Cover Photo',
		);
	}
}