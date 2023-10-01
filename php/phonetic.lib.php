<?php
	namespace ScottVM\Phonetic; 
	
	/**
	* PHP Phonetic Alphabet Library
	* 
	* Copyright (c) 2023, Scott Vander Molen; some rights reserved.
	* 
	* This work is licensed under a Creative Commons Attribution 4.0 International License.
	* To view a copy of this license, visit https://creativecommons.org/licenses/by/4.0/
	* 
	* @author  Scott Vander Molen
	* @version 2.0
	* @since   2023-10-01
	*/
	
	// Change debugmode to true if you need to see error messages.
	$debugmode = false;
	if ($debugmode)
	{
		// Allow the display of error during debugging.
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
	}
	else
	{
		// Display a 404 error if the user attempts to access this file directly.
		if (__FILE__ == $_SERVER['SCRIPT_FILENAME'])
		{
			header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
			exit("<!DOCTYPE HTML PUBLIC \"-//IETF//DTD HTML 2.0//EN\">\r\n<html><head>\r\n<title>404 Not Found</title>\r\n</head><body>\r\n<h1>Not Found</h1>\r\n<p>The requested URL " . $_SERVER['SCRIPT_NAME'] . " was not found on this server.</p>\r\n</body></html>");
		}
	}

	// Mapping of unicode characters to phonetic alphabet.
	$phonetic = array(
		" " => "|",
		"A" => "alfa",
		"B" => "bravo",
		"C" => "charlie",
		"D" => "delta",
		"E" => "echo",
		"F" => "foxtrot",
		"G" => "golf",
		"H" => "hotel",
		"I" => "india",
		"J" => "juliett",
		"K" => "kilo",
		"L" => "lima",
		"M" => "mike",
		"N" => "november",
		"O" => "oscar",
		"P" => "papa",
		"Q" => "quebec",
		"R" => "romeo",
		"S" => "sierra",
		"T" => "tango",
		"U" => "uniform",
		"V" => "victor",
		"W" => "whiskey",
		"X" => "xray",
		"Y" => "yankee",
		"Z" => "zulu",
		"0" => "zero",
		"1" => "one",
		"2" => "two",
		"3" => "tree",
		"4" => "fower",
		"5" => "fife",
		"6" => "six",
		"7" => "seven",
		"8" => "eight",
		"9" => "niner",
		"." => "stop",
		"," => "comma",
		"?" => "question-mark",
		"'" => "apostrophe",
		"!" => "exclamation-mark",
		"/" => "slant",
		"(" => "brackets-on",
		")" => "brackets-off",
		"&" => "ampersand",
		":" => "colon",
		";" => "semi-colon",
		"–" => "hyphen",
		"_" => "underscore",
		"“" => "quote",
		"”" => "unquote"
	);
	
	/**
	* Encodes a plain text message into phonetic alphabet.
	* 
	* @param message The plain text message to encode.
	* @return string The encoded message. Words are separated by pipes.
	*/
	function encodeMessage($message)
	{
		global $phonetic;
		$result = "";
		
		// Loop through the message one character at a time.
		for ($i = 0; $i <= strlen($message) - 1; $i++)
		{
			$character = strtoupper(substr($message, $i, 1));
			$result .= (array_key_exists($character, $phonetic) ? $phonetic[$character] : "") . " ";
		}
		
		$result = strtolower(rtrim($result));
		return $result;
	}
	
	/**
	* Decodes a phonetic alphabet-encoded message into plain text.
	* 
	* @param message The encoded message to decode.
	* @return string The decoded plain text message.
	*/
	function decodeMessage($message)
	{
		global $phonetic;
		$result = "";
		$characters = explode(" ", $message);
		
		foreach ($characters as &$character)
		{
			$result .= in_array($character, $phonetic, true) ? array_search($character, $phonetic, true) : "";
		}
		unset($character);
		
		return strtolower($result);
	}
?>