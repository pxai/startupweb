<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* User
* represents web User
* CI mixes entity and DAO: http://ellislab.com/codeigniter/user-guide/general/models.html#auto_load_model
*/
class User_model extends CI_Model {

	/* The Unique user's ID on the connected provider */
	private $identifier = NULL;

	/* User website, blog, web page */
	private $webSiteURL = NULL;

	/* URL link to profile page on the IDp web site */
	private $profileURL = NULL;

	/* URL link to user photo or avatar */
	private $photoURL = NULL;

	/* User dispalyName provided by the IDp or a concatenation of first and last name. */
	private $displayName = NULL;

	/* A short about_me */
	private $description = NULL;

	/* User's first name */
	private $firstName = NULL;

	/* User's last name */
	private $lastName = NULL;

	/* male or female */
	private $gender = NULL;

	/* language */
	private $language = NULL;

	/* User age, we dont calculate it. we return it as is if the IDp provide it. */
	private $age = NULL;

	/* User birth Day */
	private $birthDay = NULL;

	/* User birth Month */
	private $birthMonth = NULL;

	/* User birth Year */
	private $birthYear = NULL;

	/* User email. Note: not all of IDp garant access to the user email */
	private $email = NULL;
	
	/* Verified user email. Note: not all of IDp garant access to verified user email */
	private $emailVerified = NULL;

	/* phone number */
	private $phone = NULL;

	/* complete user address */
	private $address = NULL;

	/* user country */
	private $country = NULL;

	/* region */
	private $region = NULL;

	/** city */
	private $city = NULL;

	/* Postal code  */
	private $zip = NULL;

	/* queries */
	private $INSERT_QUERY = "insert into users (identifier, websiteurl, profileurl, photourl, displayname, description, firstname, lastname, gender, language, age, birthday, birthmonth, birthyear, email, emailverified, phone, address, country, region, city, zip) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
	private $SELECT_BY_ID_QUERY = "SELECT * FROM users WHERE id = ? ";
	private $SELECT_BY_IDENTIFIER = "SELECT * FROM users WHERE identifier = ? ";


	/**
	* inisialize the user object,
	*/
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }


	/**
	* creates a new user in DB.
	* $userdata comes from hybridauth
	*/
	public function create ($userdata) {
		$result = $this->db->query($this->INSERT_QUERY, $userdata);
		return $this->db->insert_id();
	}

	/**
	* returns one user from DB.
	*/
	public function readById ($id) {
		$result = $this->db->query($this->SELECT_BY_ID_QUERY, array($id));
		$user = $result->result();

		return $user;
	}

	/**
	* returns one user from DB.
	*/
	public function readByIdentifier ($identifier) {
		$result = $this->db->query($this->SELECT_BY_IDENTIFIER, array($identifier));
		$user = $result->result();

		return $user[0];
	}
	// getters/setters
	/**
	*get identifier
	*/
	public function getIdentifier () {
	return $this->identifier;
	}

	/*
	*set identifier
	*/
	public function setIdentifier ($identifier) {
	$this->identifier = identifier;
	}


	/**
	*get webSiteURL
	*/
	public function getWebSiteURL () {
	return $this->webSiteURL;
	}

	/*
	*set webSiteURL
	*/
	public function setWebSiteURL ($webSiteURL) {
	$this->webSiteURL = webSiteURL;
	}


	/**
	*get profileURL
	*/
	public function getProfileURL () {
	return $this->profileURL;
	}

	/*
	*set profileURL
	*/
	public function setProfileURL ($profileURL) {
	$this->profileURL = profileURL;
	}


	/**
	*get photoURL
	*/
	public function getPhotoURL () {
	return $this->photoURL;
	}

	/*
	*set photoURL
	*/
	public function setPhotoURL ($photoURL) {
	$this->photoURL = photoURL;
	}


	/**
	*get displayName
	*/
	public function getDisplayName () {
	return $this->displayName;
	}

	/*
	*set displayName
	*/
	public function setDisplayName ($displayName) {
	$this->displayName = displayName;
	}


	/**
	*get description
	*/
	public function getDescription () {
	return $this->description;
	}

	/*
	*set description
	*/
	public function setDescription ($description) {
	$this->description = description;
	}


	/**
	*get firstName
	*/
	public function getFirstName () {
	return $this->firstName;
	}

	/*
	*set firstName
	*/
	public function setFirstName ($firstName) {
	$this->firstName = firstName;
	}


	/**
	*get lastName
	*/
	public function getLastName () {
	return $this->lastName;
	}

	/*
	*set lastName
	*/
	public function setLastName ($lastName) {
	$this->lastName = lastName;
	}


	/**
	*get gender
	*/
	public function getGender () {
	return $this->gender;
	}

	/*
	*set gender
	*/
	public function setGender ($gender) {
	$this->gender = gender;
	}


	/**
	*get language
	*/
	public function getLanguage () {
	return $this->language;
	}

	/*
	*set language
	*/
	public function setLanguage ($language) {
	$this->language = language;
	}


	/**
	*get age
	*/
	public function getAge () {
	return $this->age;
	}

	/*
	*set age
	*/
	public function setAge ($age) {
	$this->age = age;
	}


	/**
	*get birthDay
	*/
	public function getBirthDay () {
	return $this->birthDay;
	}

	/*
	*set birthDay
	*/
	public function setBirthDay ($birthDay) {
	$this->birthDay = birthDay;
	}


	/**
	*get birthMonth
	*/
	public function getBirthMonth () {
	return $this->birthMonth;
	}

	/*
	*set birthMonth
	*/
	public function setBirthMonth ($birthMonth) {
	$this->birthMonth = birthMonth;
	}


	/**
	*get birthYear
	*/
	public function getBirthYear () {
	return $this->birthYear;
	}

	/*
	*set birthYear
	*/
	public function setBirthYear ($birthYear) {
	$this->birthYear = birthYear;
	}


	/**
	*get email
	*/
	public function getEmail () {
	return $this->email;
	}

	/*
	*set email
	*/
	public function setEmail ($email) {
	$this->email = email;
	}


	/**
	*get emailVerified
	*/
	public function getEmailVerified () {
	return $this->emailVerified;
	}

	/*
	*set emailVerified
	*/
	public function setEmailVerified ($emailVerified) {
	$this->emailVerified = emailVerified;
	}


	/**
	*get phone
	*/
	public function getPhone () {
	return $this->phone;
	}

	/*
	*set phone
	*/
	public function setPhone ($phone) {
	$this->phone = phone;
	}


	/**
	*get address
	*/
	public function getAddress () {
	return $this->address;
	}

	/*
	*set address
	*/
	public function setAddress ($address) {
	$this->address = address;
	}


	/**
	*get country
	*/
	public function getCountry () {
	return $this->country;
	}

	/*
	*set country
	*/
	public function setCountry ($country) {
	$this->country = country;
	}


	/**
	*get region
	*/
	public function getRegion () {
	return $this->region;
	}

	/*
	*set region
	*/
	public function setRegion ($region) {
	$this->region = region;
	}


	/**
	*get city
	*/
	public function getCity () {
	return $this->city;
	}

	/*
	*set city
	*/
	public function setCity ($city) {
	$this->city = city;
	}


	/**
	*get zip
	*/
	public function getZip () {
	return $this->zip;
	}

	/*
	*set zip
	*/
	public function setZip ($zip) {
	$this->zip = zip;
	}

}

/* End of file user.php */
/* Location: ./application/models/user.php */
