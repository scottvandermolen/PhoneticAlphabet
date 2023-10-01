<?php
	/**
	* PHP Phonetic Alphabet Unit Tests
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
		// Allow the display of errors during debugging.
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
	}
	
	echo "<pre>";
	echo "/***************************************************************************************\\\n";
	echo "| PHP Phonetic Alphabet Library                                                         |\n";
	echo "|                                                                                       |\n";
	echo "| Copyright (c) 2023, Scott Vander Molen; some rights reserved.                         |\n";
	echo "|                                                                                       |\n";
	echo "| This work is licensed under a Creative Commons Attribution 4.0 International License. |\n";
	echo "| To view a copy of this license, visit https://creativecommons.org/licenses/by/4.0/    |\n";
	echo "|                                                                                       |\n";
	echo "\***************************************************************************************/\n";
	echo "</pre>";

	include 'phonetic.lib.php';
	use ScottVM\Phonetic as Phonetic;
	
	/**
	* Encodes a plain text message into phonetic alphabet and compares to the expected result.
	* 
	* @param input The plain text message to encode.
	* @param expected The expected encoded result.
	* @return boolean Whether the result matched the expectation.
	*/
	function testEncode($input, $expected)
	{
		$actual = Phonetic\encodeMessage(strtoupper($input));
		$result = $actual == $expected;

		echo "Unit Test: encodeMessage()\n";
		echo "Input:     " . strtolower($input) . "\n";
		echo "Expected:  " . $expected . "\n";
		echo "Actual:    " . $actual . "\n";
		echo "Result:    Test " . ($result ? "successful" : "failed") . "!\n\n";
		
		return $result;
	}
	
	/**
	* Decodes a phonetic alphabet-encoded message into plain text and compares to the expected result.
	* 
	* @param input The encoded message to decode.
	* @param expected The expected plain text result.
	* @return boolean Whether the result matched the expectation.
	*/
	function testDecode($input, $expected)
	{
		$actual = Phonetic\decodeMessage($input);
		$result = $actual == strtolower($expected);

		echo "Unit Test: decodeMessage()\n";
		echo "Input:     " . strtolower($input) . "\n";
		echo "Expected:  " . strtolower($expected) . "\n";
		echo "Actual:    " . $actual . "\n";
		echo "Result:    Test " . ($result ? "successful" : "failed") . "!\n\n";
		
		return $result;
	}
	
	echo "<pre>";
	$test1 = testEncode("Hello world!", "hotel echo lima lima oscar | whiskey oscar romeo lima delta exclamation-mark");
	$test2 = testDecode("hotel echo lima lima oscar | whiskey oscar romeo lima delta exclamation-mark", "Hello world!");
	echo "</pre>";
?>