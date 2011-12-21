--TEST--
bitset_count
--SKIPIF--
<?php if (!extension_loaded("bitset")) print "skip"; ?>
--FILE--
<?php 
 if( bitset_count ( bitset_empty() ) == 0 )
      echo "empty input - ok\n";

 if( bitset_count( bitset_empty(1024) ) == 0 )
      echo "set of zero - ok\n";

 if( bitset_count( bitset_fill(1024) ) == 1024 )
      echo "set of one - ok\n";

 $bitset = bitset_empty(1024);
 bitset_incl( $bitset, 1006 );
 if( bitset_count( $bitset ) == 1 )
      echo "non-trivial input - ok\n";

 $bitset = bitset_fill(1024);
 bitset_excl( $bitset, 1006 );
 if( bitset_count( $bitset ) == 1023 )
      echo "non-trivial excl input - ok\n";

 $bitset = bitset_empty(1024);
 bitset_incl( $bitset, 1023 );
 if( bitset_count( $bitset ) == 1 )
      echo "non-trivial aligned input1 - ok\n";

 $bitset = bitset_empty();
 bitset_incl( $bitset, 3 );
 bitset_incl( $bitset, 5 );
 bitset_incl( $bitset, 67 );
 if( bitset_count( $bitset ) == 3 )
      echo "non-trivial aligned input2 - ok\n";
?>
--EXPECT--
empty input - ok
set of zero - ok
set of one - ok
non-trivial input - ok
non-trivial excl input - ok
non-trivial aligned input1 - ok
non-trivial aligned input2 - ok
