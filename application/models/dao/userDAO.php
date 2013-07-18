<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* UserDAO
* user operations
*/
public class UserDAO  {

	private $INSERT_QUERY = "insert into users (identifier, websiteurl, profileurl, photourl, displayname, description, firstname, lastname, gender, language, age, birthday, birthmonth, birthyear, email, emailverified, phone, address, country, region, city, zip) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
	private $SELECT_BY_ID_QUERY = "SELECT * FROM users WHERE id = ? ";
	/**
	* inisialize the user object,
	*/
	function __construct() {
	}

	/**
	* creates a new user in DB.
	* $userdata comes from hybridauth
	*/
	function create ($userdata) {
		$result = $this->db->query($INSERT_QUERY, $userdata);
	}

	/**
	* returns one user from DB.
	*/
	function readById ($id) {
		$result = $this->db->query($SELECT_BY_ID_QUERY, array($id));
		$user = $result->result();

		return $user;
	}

	/**
	* returns one user from DB.
	*/
	function readById ($id) {
		$result = $this->db->query($SELECT_BY_ID_QUERY, array($id));
		$user = $result->result();

		return $user;
	}

}

/* End of file user.php */
/* Location: ./application/models/dao/userDAO.php */