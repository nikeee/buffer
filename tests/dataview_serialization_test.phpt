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

echo "unserialized->byteOffset = ";
var_dump($unserialized->byteOffset);
echo "unserialized->byteLength = ";
var_dump($unserialized->byteLength);
echo "unserialized->buffer instanceof ArrayBuffer = ";
var_dump($unserialized->buffer instanceof ArrayBuffer);
echo "unserialized->buffer !== null = ";
var_dump($unserialized->buffer !== null);

echo "unserialized->getUint32(0) = ";
var_dump(dechex($unserialized->getUint32(0, true)));
echo "unserialized->getUint32(4) = ";
var_dump(dechex($unserialized->getUint32(4, true)));

$unserialized->setInt32(0, 0xABCDEF00, true);
echo "unserialized->getUint32(0) after modification = ";
var_dump(dechex($unserialized->getUint32(0, true)));

?>
--EXPECT--
unserialized->byteOffset = int(4)
unserialized->byteLength = int(8)
unserialized->buffer instanceof ArrayBuffer = bool(true)
unserialized->buffer !== null = bool(true)
unserialized->getUint32(0) = string(8) "12345678"
unserialized->getUint32(4) = string(8) "87654321"
unserialized->getUint32(0) after modification = string(8) "abcdef00"

