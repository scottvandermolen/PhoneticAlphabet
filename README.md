# Phonetic Alphabet Library for PHP and ASP

A library for encoding plain text strings to NATO Phonetic Alphabet and decoding NATO Phonetic Alphabet strings to plain text.

## Project Status

No further development is planned, as this library is considered complete.

## Installation

### PHP

Place phonetic.lib.php in any location on your web server. For additional security, you may wish to place it in a location that isn't directly accessible by users, though attempts to access the library directly will generate a 404 error.

The file phonetic.test.php is not required in order to use the library and does not need to be placed on the web server unless you want to run unit tests.

### ASP Classic

Place phonetic.lib.wsc in any location on your web server, or on another machine on the same network. For additional security, you may wish to place it in a location that isn't directly accessible by users.

Optionally, you may register the Windows Script Component by right-clicking on the file in Windows Explorer and choosing Register.

The file phonetic.test.asp is not required in order to use the library and does not need to be placed on the web server unless you want to run unit tests.

## Usage

### PHP

```PHP
// Change the path if you're storing the library in a different folder.
include 'phonetic.lib.php';

// Feel free to alias the namespace if you don't want to write my name every time you call one of my functions. 😉
use ScottVM\Phonetic as Phonetic;

// The string we want to encode.
$plainText = "Hello world!";

// Returns 'hotel echo lima lima oscar | whiskey oscar romeo lima delta exclamation-mark'
$secretMessage = Phonetic\encodeMessage($plainText);

// Returns the original plain text message.
$revealedMessage = Phonetic\decodeMessage($secretMessage);
```

### ASP Classic

```ASP
dim Phonetic

' Option 1: component not registered
' Change the path if the wsc file is stored in a different folder.
set Phonetic = GetObject("script:c:\inetpub\wwwroot\phonetic.lib.wsc")

' Option 2: component registered on local machine
'set Phonetic = CreateObject("ScottVM.Phonetic")

' Option 3: component registered on remote machine
'set Phonetic = CreateObject("ScottVM.Phonetic, "remote-machine-name")

' The string we want to encode.
dim plainText
plainText = "Hello world!"

' Returns 'hotel echo lima lima oscar | whiskey oscar romeo lima delta exclamation-mark'
dim secretMessage
secretMessage = Phonetic.encodeMessage(plainText)

' Returns the original plain text message.
dim revealedMessage
revealedMessage = Phonetic.decodeMessage(secretMessage)
```

## Contributing

Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

See phonetic.test.php or phonetic.test.asp for unit tests.

## Authors

Version 1.0 written February 2009 by Scott Vander Molen

Version 2.0 written October 2023 by Scott Vander Molen

## License
This work is licensed under a [Creative Commons Attribution 4.0 International License](https://creativecommons.org/licenses/by/4.0/).