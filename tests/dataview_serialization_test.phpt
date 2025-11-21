--TEST--
DataView Serialization Tests
--DESCRIPTION--
Test DataView serialization and unserialization
--SKIPIF--
<?php if(!extension_loaded('buffer')) die('skip buffer n/a'); ?>
--FILE--
<?php

$buffer = new ArrayBuffer(16);
$view = new DataView($buffer, 4, 8);

$view->setInt32(0, 0x12345678, true);
$view->setInt32(4, 0x87654321, true);

$serialized = serialize($view);
$unserialized = unserialize($serialized);

var_dump($unserialized->byteOffset);
var_dump($unserialized->byteLength);
var_dump($unserialized->buffer instanceof ArrayBuffer);
var_dump($unserialized->buffer !== null);

var_dump(dechex($unserialized->getUint32(0, true)));
var_dump(dechex($unserialized->getUint32(4, true)));

$unserialized->setInt32(0, 0xABCDEF00, true);
var_dump(dechex($unserialized->getUint32(0, true)));

?>
--EXPECT--
int(4)
int(8)
bool(true)
bool(true)
string(8) "12345678"
string(8) "87654321"
string(8) "abcdef00"

