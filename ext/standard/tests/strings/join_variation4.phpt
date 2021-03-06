--TEST--
Test join() function : usage variations - different values for 'glue' argument
--FILE--
<?php
/* Prototype  : string join( string $glue, array $pieces )
 * Description: Join array elements with a string
 * Source code: ext/standard/string.c
 * Alias of function: implode()
*/

/*
 * test join() by passing different glue arguments
*/

echo "*** Testing join() : usage variations ***\n";

$glues = array (
  "TRUE",
  true,
  false,
  array("key1", "key2"),
  "",
  " ",
  "string\x00between",
  -1.566599999999999,
  NULL,
  -0,
  '\0'
);

$pieces = array (
  2,
  0,
  -639,
  -1.3444,
  true,
  "PHP",
  false,
  NULL,
  "",
  " ",
  6999.99999999,
  "string\x00with\x00...\0"
);
/* loop through  each element of $glues and call join */
$counter = 1;
for($index = 0; $index < count($glues); $index ++) {
  echo "-- Iteration $counter --\n";
  var_dump( join($glues[$index], $pieces) );
  $counter++;
}

echo "Done\n";
?>
--EXPECTF--
*** Testing join() : usage variations ***
-- Iteration 1 --
string(91) "2TRUE0TRUE-639TRUE-1.3444TRUE1TRUEPHPTRUETRUETRUETRUE TRUE6999.99999999TRUEstring with ... "
-- Iteration 2 --
string(58) "2101-6391-1.3444111PHP1111 16999.999999991string with ... "
-- Iteration 3 --
string(47) "20-639-1.34441PHP 6999.99999999string with ... "
-- Iteration 4 --

Warning: Array to string conversion in %s on line %d

Deprecated: join(): Passing glue string after array is deprecated. Swap the parameters in %s on line %d
string(13) "key1Arraykey2"
-- Iteration 5 --
string(47) "20-639-1.34441PHP 6999.99999999string with ... "
-- Iteration 6 --
string(58) "2 0 -639 -1.3444 1 PHP      6999.99999999 string with ... "
-- Iteration 7 --
string(201) "2string between0string between-639string between-1.3444string between1string betweenPHPstring betweenstring betweenstring betweenstring between string between6999.99999999string betweenstring with ... "
-- Iteration 8 --
string(124) "2-1.56660-1.5666-639-1.5666-1.3444-1.56661-1.5666PHP-1.5666-1.5666-1.5666-1.5666 -1.56666999.99999999-1.5666string with ... "
-- Iteration 9 --
string(47) "20-639-1.34441PHP 6999.99999999string with ... "
-- Iteration 10 --
string(58) "2000-6390-1.3444010PHP0000 06999.999999990string with ... "
-- Iteration 11 --
string(69) "2\00\0-639\0-1.3444\01\0PHP\0\0\0\0 \06999.99999999\0string with ... "
Done
