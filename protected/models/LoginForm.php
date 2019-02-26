<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class LoginForm extends CFormModel
{
	public $username;
	public $password;
	public $rememberMe;

	private $_identity;

	//public $verifyCode;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			//array('validationKey', 'validateKey', 'fieldError'=>'username'),
			// username and password are required
			array('username, password', 'required'),
			// rememberMe needs to be a boolean
			array('rememberMe', 'boolean'),
			// password needs to be authenticated
			array('password', 'authenticate'),
			//array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),

		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
            'username'=>tt('Логин (регистрозависимый)'),
            'password'=>tt('Пароль'),
			'rememberMe'=>'Remember me next time',
		);
	}

	/**
	 * Authenticates the password.
	 * This is the 'authenticate' validator as declared in rules().
	 */
	public function authenticate($attribute,$params)
	{
		if(!$this->hasErrors())
		{
			$this->_identity=new UserIdentity($this->username,$this->password);
			$errorCode = $this->_identity->authenticate();

			/*var_dump($errorCode);

			var_dump($this->_identity);*/

			if($errorCode === 3) {
				$this->addError('password', tt('Ваша учетная запись заблокирована на {min_count} минут, так как вы {count} раз неправильно ввели свой пароль',array(
					'{min_count}'=>$this->_identity->_lockout_min,
					'{count}'=>$this->_identity->_lockout_attempts
				)));
			}elseif($errorCode!==0){
				$this->addError('password', tt('Неправильный логин или пароль'));
			}
		}
	}

	/**
	 * Logs in the user using the given username and password in the model.
	 * @return boolean whether login is successful
	 */
	public function login()
	{
		if($this->_identity===null)
		{
			$this->_identity=new UserIdentity($this->username,$this->password);
			$this->_identity->authenticate();
		}
		if($this->_identity->errorCode===UserIdentity::ERROR_NONE)
		{
            $duration=$this->rememberMe ? 3600*24*30 : 0; // 30 days
			Yii::app()->user->login($this->_identity,$duration);
			UsersHistory::getNewLogin();
			return true;
		}
		else
			return false;
	}
}
