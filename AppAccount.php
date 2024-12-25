<?php

require_once 'Account.php';

// Buat instance dari class Account
$account = new Account();

// Uji menambahkan akun baru
echo "=== TEST: Menambahkan Akun ===" . PHP_EOL;
$account->MainCreateAccount('Buat Akun', 'user1', 'password123');
$account->MainCreateAccount('Buat Akun', 'user2', 'password456');

echo "=== TEST: Melihat Semua Akun ===" . PHP_EOL;
$account->MainCreateAccount('Lihat Akun');

echo "=== TEST: Login Berhasil ===" . PHP_EOL;
$account->Login('Login', 'user1', 'password123');

echo "=== TEST: Login Gagal (Password Salah) ===" . PHP_EOL;
$account->Login('Login', 'user1', 'wrongpassword');

echo "=== TEST: Memperbarui Password ===" . PHP_EOL;
$account->MainCreateAccount('Update Password', 'user1', 'newpassword123'); // Seharusnya memanggil UpdatePassword()
$account->Login('Login', 'user1', 'newpassword123');