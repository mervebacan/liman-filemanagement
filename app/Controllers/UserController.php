<?php
namespace App\Controllers;

use Liman\Toolkit\Shell\Command;
class UserController
{
    public function add()
    {
        $command = Command::runSudo("useradd -p $(echo @{:password} | openssl passwd -1 -stdin) -s /bin/bash -g users @{:username}",[
            "username" => request("username"),
            "password" => request("password")

        ]);

        Command::runSudo("mkhomedir_helper @{:username}", [
            "username" => request("username")

        ]);
        return respond(__("Başarıyla eklendi"), 200);
    }
    public function get()
    {
        $cmd = Command::runSudo("getent passwd {1000..5000} | cut -d: -f1");
        $users = explode("\n", $cmd);
        $list = [];
        foreach ($users as $user){
            array_push($list, [     
                //array içerisinde array oluşturuyoruz
                "user" =>$user
            ]);
        }
        return view("table", [
            "value" => $list, //table değer alır ve bunu listeye göndeririz
            "title" => ["Kullanıcı Adı"],  
            "display" => ["user"], //listeleyecğimiz data ismi     
            "menu" => [
                "Sil" => [
                    "target" => "deleteUser",
                    "icon" => "fa-trash"
                ]
            ]
        
        ]);

    }
    //public function delete()
    //{
          ////vae_dump(request("username"));
    //    Command::runSudo("userdel -r @{:username}", ["username" => request("username")]);
    //    return respond("Başarıyla silindi!", 200);
    //}
}