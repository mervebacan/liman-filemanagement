<?php
namespace App\Controllers;

use Liman\Toolkit\Shell\Command;
class FileController
{
    public function create()
    {
        $command = Command::runSudo("mkdir /home/liman/@{:filename}", [
            "filename" => $file

        ]);
    Command::runSudo("touch /home/liman/ ", [
        "filename" => request("filename")
    ]);

    return respond(__("Başarıyla eklendi"), 200);
    }
public function get()
{
    $cmd = Command::runSudo("ls -lah /home/liman");
    $files = explode("\n", $cmd);

    $list=[];
    
    foreach ($files as $file){
    $file =preg_replace('/\s+/', ' ', $file);
    $file = explode(" ", $file);  
        array_push($list,[
            "filesize" => $file[4],
            "name" => $file[2],
            "permissions" => $file[0],
            "owner" => $file[3],
            "group" => $file[1],
            "lastmodified" => $file[5]

        ]);     
          
    }     

    return view("table", [
        "value" => $list, //table değer alır ve bunu listeye göndeririz
        "title" => ["İSİM", "İZİNLER", "SAHİP", "GRUP", "DOSYA BOYUTU", "SON DEĞİŞTİRİLME"],  
        "display" => ["name", "permissions", "owner", "group", "filesize", "lastmodified"]//listeleyecğimiz data ismi     
    
        ]);
}

}