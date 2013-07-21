<?php

namespace CsnUser\Model;
// I don't have the filters here now I can implement the Interface
// Use with Zend\Db\ResultSet\ResultSet. You send it as argument to the Adapter ot TableDataGateway
/*
The form’s bind() method attaches the model to the form. This is used in two ways:

When displaying the form, the initial values for each element are extracted from the model.
After successful validation in isValid(), the data from the form is put back into the model.
These operations are done using a hydrator object. There are a number of hydrators, but the default 
one is Zend\Stdlib\Hydrator\ArraySerializable which expects to find two methods in the model: 
getArrayCopy() and exchangeArray(). We have already written exchangeArray() in our Album entity, 
so just need to write getArrayCopy():
*/
class User // implements ArrayObject - but I should define a lot of methods
{
    public $usr_id;
    public $usr_name;
    public $usr_password;
    public $usr_email;	
    public $usrl_id;	
    public $lng_id;	
    public $usr_active;	
    public $usr_question;	
    public $usr_answer;	
    public $usr_picture;	
    public $usr_password_salt;
    public $usr_registration_date;
    public $usr_registration_token;	
    public $usr_email_confirmed;	

	// ArrayObject, or at least implement exchangeArray. For Zend\Db\ResultSet\ResultSet to work
	// 1) hydration!!!!! <- This is enough for resultSet to work but not for the form
    public function exchangeArray($data) 
    {
        $this->usr_id     = (!empty($data['usr_id'])) ? $data['usr_id'] : null;
        $this->usr_name = (!empty($data['usr_name'])) ? $data['usr_name'] : null;
        $this->usr_password = (!empty($data['usr_password'])) ? $data['usr_password'] : null;
        $this->usr_email = (!empty($data['usr_email'])) ? $data['usr_email'] : null;
        $this->usrl_id = (!empty($data['usrl_id'])) ? $data['usrl_id'] : null;
        $this->lng_id = (!empty($data['lng_id'])) ? $data['lng_id'] : null;
        $this->usr_active = (isset($data['usr_active'])) ? $data['usr_active'] : null;
        $this->usr_question = (!empty($data['usr_question'])) ? $data['usr_question'] : null;
        $this->usr_answer = (!empty($data['usr_answer'])) ? $data['usr_answer'] : null;
        $this->usr_picture = (!empty($data['usr_picture'])) ? $data['usr_picture'] : null;
        $this->usr_password_salt = (!empty($data['usr_password_salt'])) ? $data['usr_password_salt'] : null;
        $this->usr_registration_date = (!empty($data['usr_registration_date'])) ? $data['usr_registration_date'] : null;
        $this->usr_registration_token = (!empty($data['usr_registration_token'])) ? $data['usr_registration_token'] : null;
        $this->usr_email_confirmed = (isset($data['usr_email_confirmed'])) ? $data['usr_email_confirmed'] : null;
    }
	
	// 2) Extraction. For extraction the standard Hydrator the Form expects getArrayCopy to be able to bind
	// -> Extracts the data
    // Add the following method:
    public function getArrayCopy()
    {
        return get_object_vars($this);
    }	
}