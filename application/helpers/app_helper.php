<?php

/**
*@author Sandra Rono
*/

function get_tutorname($id)
{
	$CI =& get_instance();
	$query = $CI->db->query("SELECT CONCAT(fname, ' ',lname) AS name FROM tutors WHERE staff_no = '$id'");
	$result = $query->row();

	return $result->name;
}

function get_studentname($adm)
{
	$CI =& get_instance();
	$query = $CI->db->query("SELECT CONCAT(fname, ' ',lname) AS name FROM students WHERE adm_no = '$adm'");
	$result = $query->row();

	return $result->name;
}

function get_subjectname($id)
{
	$CI =& get_instance();
	$query = $CI->db->get_where('subject', array('sub_id' => $id));
	$result = $query->row();

	return $result->sub_name;
}

function get_classname($id)
{
	$CI =& get_instance();
	$query = $CI->db->get_where('classes', array('class_id' => $id));
	$result = $query->row();

	return $result->class_name;
}

function get_zonename($id)
{
	$CI =& get_instance();
	$query = $CI->db->get_where('zones', array('zone_id' => $id));
	$result = $query->row();

	return $result->zone_name;
}

?>