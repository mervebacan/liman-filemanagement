<?php
namespace App\Controllers;

use Liman\Toolkit\Shell\Command;
class FileController
{
    public function add()
    {
        $command = Command::runSudo("useradd -p $(echo @{:password} | openssl passwd -1 -stdin) -s /bin/bash -g users @{:username}",[
            "username" => request("username"),
            "password" => request("password")

        ]);
        Command::runSudo("mkhomedir_helper @{:filename}", [
            "filename" => request("filename")
            

        ]);
        return respond(__("Başarıyla eklendi"), 200);
    }
    public function get()
    {
        $cmd = Command::runSudo("getent passwd {1000..5000} | cut -d: -f1");
        $files = explode("\n", $cmd);
        $list = [];
        foreach ($files as $file){
            array_push($list, [     
                //array içerisinde array oluşturuyoruz
                "file" =>$file

            ]);
        }
        return view("table", [
            "value" => $list, //table değer alır ve bunu listeye göndeririz
            "title" => ["İSİM", "İZİNLER", "SAHİP", "GRUP", "DOSYA BOYUTU", "SON DEĞİŞTİRİLME"],  
            "display" => ["file", "permissions", "owner", "group", "filesize", "lastmodified"], //listeleyecğimiz data ismi     
            "menu" => [
                "Sil" => [
                    "target" => "deletefile",
                    "icon" => "fa-trash"
                ]
            ]
        
        ]);

    }
}