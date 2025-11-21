--TEST--
DataView Float Tests
--DESCRIPTION--
Test Float32 and Float64 operations
--SKIPIF--
<?php if(!extension_loaded('buffer')) die('skip buffer n/a'); ?>
--FILE--
<?php

$buffer = new ArrayBuffer(16);
$view = new DataView($buffer);

$view->setFloat32(0, 3.14159, true);
$view->setFloat32(4, -42.5, true);
$view->setFloat32(8, 0.0, true);
$view->setFloat32(12, -0.0, true);

echo "getFloat32(0) = ";
var_dump(round($view->getFloat32(0, true), 5));
echo "getFloat32(4) = ";
var_dump($view->getFloat32(4, true));
$zero1 = $view->getFloat32(8, true);
$zero2 = $view->getFloat32(12, true);
echo "getFloat32(8) zero = ";
var_dump($zero1 == 0.0 ? 0.0 : $zero1);
echo "getFloat32(12) negative zero = ";
var_dump($zero2 == 0.0 ? 0.0 : $zero2);

$buffer2 = new ArrayBuffer(24);
$view2 = new DataView($buffer2);

$view2->setFloat64(0, 3.141592653589793, true);
$view2->setFloat64(8, -42.5, true);
$view2->setFloat64(16, 0.0, true);

echo "getFloat64(0) = ";
var_dump($view2->getFloat64(0, true));
echo "getFloat64(8) = ";
var_dump($view2->getFloat64(8, true));
echo "getFloat64(16) = ";
var_dump($view2->getFloat64(16, true));

$view2->setFloat32(0, INF, true);
$view2->setFloat32(4, -INF, true);
echo "getFloat32(0) INF = ";
var_dump(is_infinite($view2->getFloat32(0, true)));
echo "getFloat32(4) -INF = ";
var_dump(is_infinite($view2->getFloat32(4, true)));

?>
--EXPECT--
getFloat32(0) = float(3.14159)
getFloat32(4) = float(-42.5)
getFloat32(8) zero = float(0)
getFloat32(12) negative zero = float(0)
getFloat64(0) = float(3.141592653589793)
getFloat64(8) = float(-42.5)
getFloat64(16) = float(0)
getFloat32(0) INF = bool(true)
getFloat32(4) -INF = bool(true)

