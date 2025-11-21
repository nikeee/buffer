--TEST--
DataView Interoperability Tests
--DESCRIPTION--
Test DataView interoperability with TypedArrays
--SKIPIF--
<?php if(!extension_loaded('buffer')) die('skip buffer n/a'); ?>
--FILE--
<?php

$buffer = new ArrayBuffer(16);

$view = new DataView($buffer);
$view->setInt32(0, 0x12345678, true);
$view->setInt32(4, 0x87654321, true);

$int32s = new Int32Array($buffer);
// Use sprintf to handle negative numbers correctly
echo "Int32Array[0] read from DataView = ";
var_dump(sprintf("%08x", $int32s[0] & 0xFFFFFFFF));
echo "Int32Array[1] read from DataView = ";
var_dump(sprintf("%08x", $int32s[1] & 0xFFFFFFFF));

$int32s[0] = 0xABCDEF00;
$int32s[1] = 0x00FEDCBA;

echo "DataView->getUint32(0) read from Int32Array = ";
var_dump(sprintf("%08x", $view->getUint32(0, true) & 0xFFFFFFFF));
echo "DataView->getUint32(4) read from Int32Array = ";
var_dump(sprintf("%08x", $view->getUint32(4, true) & 0xFFFFFFFF));

$view2 = new DataView($buffer, 0, 16);
$view2->setFloat32(8, 3.14, true);

$floats = new FloatArray($buffer);
echo "FloatArray[2] read from DataView = ";
var_dump(round($floats[2], 2));

?>
--EXPECT--
Int32Array[0] read from DataView = string(8) "12345678"
Int32Array[1] read from DataView = string(8) "87654321"
DataView->getUint32(0) read from Int32Array = string(8) "abcdef00"
DataView->getUint32(4) read from Int32Array = string(8) "00fedcba"
FloatArray[2] read from DataView = float(3.14)

