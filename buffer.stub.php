<?php
/**
 * @generate-class-entries
 */

/** @strict-properties */
final class ArrayBuffer {
    public function __construct(int $byteLength) {}

    public function __serialize(): array {}

    public function __unserialize(array $data): void {}
}

/** @strict-properties */
abstract class TypedArray implements ArrayAccess, IteratorAggregate {
    /** @implementation-alias TypedArray::__construct */
    public function __construct(ArrayBuffer $buffer, int $byteOffset = 0, ?int $length = null) {}

    /**
     * @param int $offset
     */
    public function offsetGet($offset): int|float {}

    /**
     * @param int $offset
     * @param int|float $value
     */
    public function offsetSet($offset, $value): void {}

    /**
     * @param int $offset
     */
    public function offsetExists($offset): bool {}

    /**
     * @param int $offset
     */
    public function offsetUnset($offset): void {}

    public function getIterator(): Iterator {}

    public function __serialize(): array {}

    public function __unserialize(array $data): void {}
}

final class Int8Array extends TypedArray {
    /**
     * @param int $offset
     * @implementation-alias TypedArray::offsetGet
     */
    public function offsetGet($offset): int {}
}

final class UInt8Array extends TypedArray {
    /**
     * @param int $offset
     * @implementation-alias TypedArray::offsetGet
     */
    public function offsetGet($offset): int {}
}

final class Int16Array extends TypedArray {
    /**
     * @param int $offset
     * @implementation-alias TypedArray::offsetGet
     */
    public function offsetGet($offset): int {}
}

final class UInt16Array extends TypedArray {
    /**
     * @param int $offset
     * @implementation-alias TypedArray::offsetGet
     */
    public function offsetGet($offset): int {}
}

final class Int32Array extends TypedArray {
    /**
     * @param int $offset
     * @implementation-alias TypedArray::offsetGet
     */
    public function offsetGet($offset): int {}
}

final class UInt32Array extends TypedArray {
}

final class FloatArray extends TypedArray {
    /**
     * @param int $offset
     * @implementation-alias TypedArray::offsetGet
     */
    public function offsetGet($offset): float {}
}

final class DoubleArray extends TypedArray {
    /**
     * @param int $offset
     * @implementation-alias TypedArray::offsetGet
     */
    public function offsetGet($offset): float {}
}

/**
 * The DataView view provides a low-level interface for reading and writing multiple number types
 * in an ArrayBuffer regardless of the platform's endianness.
 *
 * @see https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/DataView
 * @strict-properties
 */
final class DataView {
    /** The ArrayBuffer referenced by this view. */
    public readonly ArrayBuffer $buffer;

    /** The offset (in bytes) of this view from the start of its ArrayBuffer. */
    public readonly int $byteOffset;

    /** The length (in bytes) of this view from the start of its ArrayBuffer. */
    public readonly int $byteLength;

    /**
     * Creates a new DataView object.
     *
     * @param ArrayBuffer $buffer An existing ArrayBuffer to use as the storage for the new DataView object.
     * @param int $byteOffset The offset, in bytes, to the first byte in the specified buffer for the new view to reference. If not specified, the view of the buffer will start with the first byte.
     * @param int|null $byteLength The number of elements in the byte array. If unspecified, length of the view will match the buffer's length.
     * @see https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/DataView/DataView
     */
    public function __construct(ArrayBuffer $buffer, int $byteOffset = 0, ?int $byteLength = null) {}

    /**
     * Gets a signed 8-bit integer (byte) at the specified byte offset from the start of the view.
     *
     * @param int $byteOffset The offset, in byte, from the start of the view where to read the data.
     * @return int A signed 8-bit integer number.
     * @throws Exception If the byteOffset is outside the buffer range.
     * @see https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/DataView/getInt8
     */
    public function getInt8(int $byteOffset): int {}

    /**
     * Gets an unsigned 8-bit integer (unsigned byte) at the specified byte offset from the start of the view.
     *
     * @param int $byteOffset The offset, in byte, from the start of the view where to read the data.
     * @return int An unsigned 8-bit integer number.
     * @throws Exception If the byteOffset is outside the buffer range.
     * @see https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/DataView/getUint8
     */
    public function getUint8(int $byteOffset): int {}

    /**
     * Gets a signed 16-bit integer (short) at the specified byte offset from the start of the view.
     *
     * @param int $byteOffset The offset, in byte, from the start of the view where to read the data.
     * @param bool $littleEndian Indicates whether the 16-bit int is stored in little- or big-endian format. If false or undefined, a big-endian value is read.
     * @return int A signed 16-bit integer number.
     * @throws Exception If the byteOffset is outside the buffer range.
     * @see https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/DataView/getInt16
     */
    public function getInt16(int $byteOffset, bool $littleEndian = false): int {}

    /**
     * Gets an unsigned 16-bit integer (unsigned short) at the specified byte offset from the start of the view.
     *
     * @param int $byteOffset The offset, in byte, from the start of the view where to read the data.
     * @param bool $littleEndian Indicates whether the 16-bit int is stored in little- or big-endian format. If false or undefined, a big-endian value is read.
     * @return int An unsigned 16-bit integer number.
     * @throws Exception If the byteOffset is outside the buffer range.
     * @see https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/DataView/getUint16
     */
    public function getUint16(int $byteOffset, bool $littleEndian = false): int {}

    /**
     * Gets a signed 32-bit integer (long) at the specified byte offset from the start of the view.
     *
     * @param int $byteOffset The offset, in byte, from the start of the view where to read the data.
     * @param bool $littleEndian Indicates whether the 32-bit int is stored in little- or big-endian format. If false or undefined, a big-endian value is read.
     * @return int A signed 32-bit integer number.
     * @throws Exception If the byteOffset is outside the buffer range.
     * @see https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/DataView/getInt32
     */
    public function getInt32(int $byteOffset, bool $littleEndian = false): int {}

    /**
     * Gets an unsigned 32-bit integer (unsigned long) at the specified byte offset from the start of the view.
     *
     * @param int $byteOffset The offset, in byte, from the start of the view where to read the data.
     * @param bool $littleEndian Indicates whether the 32-bit int is stored in little- or big-endian format. If false or undefined, a big-endian value is read.
     * @return int|float An unsigned 32-bit integer number. On 32-bit systems, large values may be returned as float.
     * @throws Exception If the byteOffset is outside the buffer range.
     * @see https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/DataView/getUint32
     */
    public function getUint32(int $byteOffset, bool $littleEndian = false): int {}

    /**
     * Gets a signed 32-bit float (float) at the specified byte offset from the start of the view.
     *
     * @param int $byteOffset The offset, in byte, from the start of the view where to read the data.
     * @param bool $littleEndian Indicates whether the 32-bit float is stored in little- or big-endian format. If false or undefined, a big-endian value is read.
     * @return float A signed 32-bit float number.
     * @throws Exception If the byteOffset is outside the buffer range.
     * @see https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/DataView/getFloat32
     */
    public function getFloat32(int $byteOffset, bool $littleEndian = false): float {}

    /**
     * Gets a signed 64-bit float (double) at the specified byte offset from the start of the view.
     *
     * @param int $byteOffset The offset, in byte, from the start of the view where to read the data.
     * @param bool $littleEndian Indicates whether the 64-bit float is stored in little- or big-endian format. If false or undefined, a big-endian value is read.
     * @return float A signed 64-bit float number.
     * @throws Exception If the byteOffset is outside the buffer range.
     * @see https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/DataView/getFloat64
     */
    public function getFloat64(int $byteOffset, bool $littleEndian = false): float {}

    /**
     * Stores a signed 8-bit integer (byte) value at the specified byte offset from the start of the view.
     *
     * @param int $byteOffset The offset, in byte, from the start of the view where to store the data.
     * @param int $value The value to set.
     * @return void
     * @throws Exception If the byteOffset is outside the buffer range.
     * @see https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/DataView/setInt8
     */
    public function setInt8(int $byteOffset, int $value): void {}

    /**
     * Stores an unsigned 8-bit integer (unsigned byte) value at the specified byte offset from the start of the view.
     *
     * @param int $byteOffset The offset, in byte, from the start of the view where to store the data.
     * @param int $value The value to set.
     * @return void
     * @throws Exception If the byteOffset is outside the buffer range.
     * @see https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/DataView/setUint8
     */
    public function setUint8(int $byteOffset, int $value): void {}

    /**
     * Stores a signed 16-bit integer (short) value at the specified byte offset from the start of the view.
     *
     * @param int $byteOffset The offset, in byte, from the start of the view where to store the data.
     * @param int $value The value to set.
     * @param bool $littleEndian Indicates whether the 16-bit int is stored in little- or big-endian format. If false or undefined, a big-endian value is written.
     * @return void
     * @throws Exception If the byteOffset is outside the buffer range.
     * @see https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/DataView/setInt16
     */
    public function setInt16(int $byteOffset, int $value, bool $littleEndian = false): void {}

    /**
     * Stores an unsigned 16-bit integer (unsigned short) value at the specified byte offset from the start of the view.
     *
     * @param int $byteOffset The offset, in byte, from the start of the view where to store the data.
     * @param int $value The value to set.
     * @param bool $littleEndian Indicates whether the 16-bit int is stored in little- or big-endian format. If false or undefined, a big-endian value is written.
     * @return void
     * @throws Exception If the byteOffset is outside the buffer range.
     * @see https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/DataView/setUint16
     */
    public function setUint16(int $byteOffset, int $value, bool $littleEndian = false): void {}

    /**
     * Stores a signed 32-bit integer (long) value at the specified byte offset from the start of the view.
     *
     * @param int $byteOffset The offset, in byte, from the start of the view where to store the data.
     * @param int $value The value to set.
     * @param bool $littleEndian Indicates whether the 32-bit int is stored in little- or big-endian format. If false or undefined, a big-endian value is written.
     * @return void
     * @throws Exception If the byteOffset is outside the buffer range.
     * @see https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/DataView/setInt32
     */
    public function setInt32(int $byteOffset, int $value, bool $littleEndian = false): void {}

    /**
     * Stores an unsigned 32-bit integer (unsigned long) value at the specified byte offset from the start of the view.
     *
     * @param int $byteOffset The offset, in byte, from the start of the view where to store the data.
     * @param int $value The value to set.
     * @param bool $littleEndian Indicates whether the 32-bit int is stored in little- or big-endian format. If false or undefined, a big-endian value is written.
     * @return void
     * @throws Exception If the byteOffset is outside the buffer range.
     * @see https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/DataView/setUint32
     */
    public function setUint32(int $byteOffset, int $value, bool $littleEndian = false): void {}

    /**
     * Stores a signed 32-bit float (float) value at the specified byte offset from the start of the view.
     *
     * @param int $byteOffset The offset, in byte, from the start of the view where to store the data.
     * @param float $value The value to set.
     * @param bool $littleEndian Indicates whether the 32-bit float is stored in little- or big-endian format. If false or undefined, a big-endian value is written.
     * @return void
     * @throws Exception If the byteOffset is outside the buffer range.
     * @see https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/DataView/setFloat32
     */
    public function setFloat32(int $byteOffset, float $value, bool $littleEndian = false): void {}

    /**
     * Stores a signed 64-bit float (double) value at the specified byte offset from the start of the view.
     *
     * @param int $byteOffset The offset, in byte, from the start of the view where to store the data.
     * @param float $value The value to set.
     * @param bool $littleEndian Indicates whether the 64-bit float is stored in little- or big-endian format. If false or undefined, a big-endian value is written.
     * @return void
     * @throws Exception If the byteOffset is outside the buffer range.
     * @see https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/DataView/setFloat64
     */
    public function setFloat64(int $byteOffset, float $value, bool $littleEndian = false): void {}

    public function __serialize(): array {}
    public function __unserialize(array $data): void {}
}
