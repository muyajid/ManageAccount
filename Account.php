<?php

# Class Account Modifier

class CreateAccount
{
    protected $arrContact = [];

    protected function AddAccount($keyUsername, $valuePassword)
    {
        if(isset($this->arrContact[$keyUsername])) {
            echo "Account Atas Nama $keyUsername Sudah Terdaftar" . PHP_EOL;
            return;
        } else {
            $this->arrContact[$keyUsername] = $valuePassword;
            echo "Account Atas Nama $keyUsername Berhasil Di Tambahkan" . PHP_EOL;
        }
    }

    protected function ReadAccount(): void
    {
        foreach($this->arrContact as $key => $pass) {
            echo "  Username :: $key  Password :: $pass" . PHP_EOL;
        }
    }

    protected function UpdatePassword($username, $password) 
    {
        if(!isset($this->arrContact[$username])) {
            echo "Username Atas Nama $username Tidak Ditemukan" . PHP_EOL;
            return;
        } else {
            $this->arrContact[$username] = $password;
            echo "Password Berhasil Di Update" . PHP_EOL;
        }
    }

    protected function DeleteAccount($usernameKey, $passwordValue)
    {
        if(!isset($this->arrContact[$usernameKey])) {
            echo "Account Atas Nama $usernameKey Tidak Ditemukan" . PHP_EOL;
        } else {
            if($this->arrContact[$usernameKey] !== $passwordValue) {
                echo "Password Anda Salah, Tidak Diizinkan Mengghapus Password" . PHP_EOL;
                return;
            } else {
                unset($this->arrContact[$usernameKey]);
                echo "Account Atas Nama $usernameKey Berhasil Di Hapus" . PHP_EOL;
            }
        }

        //Chek Apakah Array Kosong
        $empty = empty($this->arrContact) ? "Array Ini Kosong \n\n" : " ";
        echo $empty;
    }

    public function MainCreateAccount($inputPilihan, $inputUsername = '', $inputPassword = '')
    {
        switch($inputPilihan) 
        {
            case 'Buat Akun':
                $this->AddAccount($inputUsername, $inputPassword);
                break;
            case 'Lihat Akun':
                $this->ReadAccount();
                break;
            case 'Update Password':
                $this->UpdatePassword($inputUsername, $inputPassword);
                break;
            case 'Hapus Akun':
                $this->DeleteAccount($inputUsername, $inputPassword);
                break;
            default:
                echo "Pilihan Tidak Valid" . PHP_EOL;
                return;
                break;
        }
    }
}

# Class Akun

class Account extends CreateAccount
{
    private string $usernameAccount;
    private string $passwordAccount;

    public function SetAccount($inputUsername, $inputPassword)
    {
        $this->usernameAccount = $inputUsername;
        $this->passwordAccount = $inputPassword;
    }
    public function GetUsername() { return $this->usernameAccount; }
    public function GetPassword() { return $this->passwordAccount; }

    const AUTHOR = "-- Muhammad Yazid Arsy";

    public function Login(string $inputOpsi, $usernameInput, $passwordInput)
    {
        switch($inputOpsi)
        {
            case 'Login':
                $this->SetAccount($usernameInput, $passwordInput);

                if(!isset($this->arrContact[$this->GetUsername()])) {
                    echo "Account Tidak Ditemukan" . PHP_EOL;
                } else {

                    if( $this->arrContact[$this->GetUsername()] === $this->GetPassword()) {
                        echo "Kamu Berhasil Login Selamat Datang ". $this->GetUsername() . PHP_EOL;
                    }else {
                        echo "Username || Password Salah Kamu Tidak Diizinkan Masuk" . PHP_EOL;
                        return;
                    }

              
                }
                break;

            case 'Buat Akun':
                $this->AddAccount($usernameInput, $passwordInput);
                break;

            default :
                echo "Pilihan Tidak Valid". self::AUTHOR . PHP_EOL;
                break;
        }
    }
}