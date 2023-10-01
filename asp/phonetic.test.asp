<%@ CodePage=65001 Language="VBScript"%>
<%
	Option Explicit
	
	' Ensure that UTF-8 encoding is used instead of Windows-1252
	Session.CodePage = 65001
	Response.CodePage = 65001
	Response.CharSet = "UTF-8"
	Response.ContentType = "text/html"
	
	dim Phonetic
	
	' Option 1: component not registered
	' Change the path if the wsc file is stored in a different folder.
	set Phonetic = GetObject("script:c:\inetpub\wwwroot\phonetic.lib.wsc")
	
	' Option 2: component registered on local machine
	'set Phonetic = CreateObject("ScottVM.Phonetic")
	
	' Option 3: component registered on remote machine
	'set Phonetic = CreateObject("ScottVM.Phonetic, "remote-machine-name")
	
	' Encodes a plain text message into phonetic alphabet code and compares to the expected result.
	' 
	' @param input The plain text message to encode.
	' @param expected The expected encoded result.
	' @return boolean Whether the result matched the expectation.
	function testEncode(input, expected)
		dim actual
		actual = Phonetic.encodeMessage(input)
		
		dim result
		dim resultText
		if actual = expected then
			result = true
			resultText = "successful"
		else
			result = false
			resultText = "failed"
		end if

		Response.Write "Unit Test: encodeMessage()" & vbCrLf
		Response.Write "Input:     " & lcase(input) & vbCrLf
		Response.Write "Expected:  " & expected & vbCrLf
		Response.Write "Actual:    " & actual & vbCrLf
		Response.Write "Result:    Test " & resultText &  "!" & vbCrLf & vbCrLf
		
		testEncode = result
	end function
	
	' Decodes a phonetic alphabet-encoded message into plain text and compares to the expected result.
	' 
	' @param input The encoded message to decode.
	' @param expected The expected plain text result.
	' @return boolean Whether the result matched the expectation.
	function testDecode(input, expected)
		dim actual
		actual = Phonetic.decodeMessage(input)
		
		dim result
		dim resultText
		if actual = lcase(expected) then
			result = true
			resultText = "successful"
		else
			result = false
			resultText = "failed"
		end if

		Response.Write "Unit Test: decodeMessage()" & vbCrLf
		Response.Write "Input:     " & input & vbCrLf
		Response.Write "Expected:  " & lcase(expected) & vbCrLf
		Response.Write "Actual:    " & actual & vbCrLf
		Response.Write "Result:    Test " & resultText &  "!" & vbCrLf & vbCrLf
		
		testDecode = result
	end function
	
	' Create an HTML container for our output.
	Response.Write "<!DOCTYPE html>" & vbCrLf
	Response.Write "<html lang=""en"">" & vbCrLf
	Response.Write "<meta http-equiv=""Content-Type"" content=""text/html;charset=UTF-8"" />" & vbCrLf
	Response.Write "<body>" & vbCrLf
	
	' Display code header
	Response.Write "<pre>"
	Response.Write "/***************************************************************************************\" & vbCrLf
	Response.Write "| ASP Phonetic Alphabet Library                                                         |" & vbCrLf
	Response.Write "|                                                                                       |" & vbCrLf
	Response.Write "| Copyright (c) 2023, Scott Vander Molen; some rights reserved.                         |" & vbCrLf
	Response.Write "|                                                                                       |" & vbCrLf
	Response.Write "| This work is licensed under a Creative Commons Attribution 4.0 International License. |" & vbCrLf
	Response.Write "| To view a copy of this license, visit https://creativecommons.org/licenses/by/4.0/    |" & vbCrLf
	Response.Write "|                                                                                       |" & vbCrLf
	Response.Write "\***************************************************************************************/" & vbCrLf
	Response.Write "</pre>"
	
	' Run unit tests
	Response.Write "<pre>"
	
	dim test1
	test1 = testEncode("Hello world!", "hotel echo lima lima oscar | whiskey oscar romeo lima delta exclamation-mark")
	
	dim test2
	test2 = testDecode("hotel echo lima lima oscar | whiskey oscar romeo lima delta exclamation-mark", "Hello world!")
	
	Response.Write "</pre>" & vbCrLf
	
	' Close the HTML container.
	Response.Write "</body>" & vbCrLf
	Response.Write "</html>"
	
	set Phonetic = nothing
%>