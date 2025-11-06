<?php
  // Meminta input hari (1-7)
  echo "Masukkan nomor hari (1=Minggu, 2=Senin, ..., 7=Sabtu): ";
  $hari = (int) readline();

  // Percabangan switch
  switch ($hari) {
      case 1:
          echo "Hari Minggu: Waktu istirahat dan keluarga.\n";
          break;
      case 2:
      case 3:
      case 4:
      case 5:
      case 6:
          echo "Hari kerja: Waktu untuk bekerja.\n";
          break;
      case 7:
          echo "Hari Sabtu: Waktu untuk rekreasi.\n";
          break;
      default:
          echo "Nomor hari tidak valid. Masukkan 1-7.\n";
  }
