<?php
/**
 * @param integer
 * @return string
 */
function numToRupiah($angka){
	$hasil_rupiah = "Rp " . number_format($angka,0,',','.');
	return $hasil_rupiah;
 
}