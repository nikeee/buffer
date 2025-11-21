--TEST--
DataView Endianness Tests
--DESCRIPTION--
Test little-endian and big-endian byte order handling
--SKIPIF--
<?php if(!extension_loaded('buffer')) die('skip buffer n/a'); ?>
--FILE--
<?php

$buffer = new ArrayBuffer(16);
$view = new DataView($buffer);

// Write 0x1234 in little-endian (default false = big-endian)
$view->setUint16(0, 0x1234, false); // big-endian: [0x12, 0x34]
$view->setUint16(2, 0x1234, true);  // little-endian: [0x34, 0x12]

echo "getUint16(0, false) big-endian = ";
var_dump(dechex($view->getUint16(0, false))); // Should be 0x1234
echo "getUint16(2, true) little-endian = ";
var_dump(dechex($view->getUint16(2, true)));  // Should be 0x1234

$view->setUint32(4, 0x12345678, false); // big-endian
$view->setUint32(8, 0x12345678, true);  // little-endian

echo "getUint32(4, false) big-endian = ";
var_dump(dechex($view->getUint32(4, false))); // Should be 0x12345678
echo "getUint32(8, true) little-endian = ";
var_dump(dechex($view->getUint32(8, true)));  // Should be 0x12345678

$view->setFloat32(12, 1.0, false);
$view->setFloat32(12, 1.0, true);
echo "getFloat32(12, true) = ";
var_dump($view->getFloat32(12, true));

?>
--EXPECT--
getUint16(0, false) big-endian = string(4) "1234"
getUint16(2, true) little-endian = string(4) "1234"
getUint32(4, false) big-endian = string(8) "12345678"
getUint32(8, true) little-endian = string(8) "12345678"
getFloat32(12, true) = float(1)

