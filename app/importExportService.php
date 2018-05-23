<?php

namespace App;

use App\User;
use Illuminate\Http\Request;
use Wilgucki\Csv\Facades\Reader;
use Illuminate\Support\Facades\Input;

/**
 * Created by PhpStorm.
 * User: zakari
 * Date: 23/05/18
 * Time: 15:13
 */

class importExportService
{
    public function importFile(){
       $file = Input::file('import_csv');
       return $file;

        /* $file = $request->file('excel');
        $destination = '/public/upload';
        $file->move($destination,$file->getClientOriginalName());
        return $file;*/
    }

    public function readCsv(){
        $file = $this->importFile();
        $nomFichier = public_path() . '/upload/' . $file->getClientOriginalName();
        $reader = CsvReader::open($nomFichier,';');
        $user = array();
        $utilisateur = new User();
        while (($line = $reader->readLine()) !== false) {
            $userString = array(explode( ';',$reader->readLine()));
            $create['nom'] = $userString[0];
            $create['prenom'] = $userString[1];
            $create['email'] = $userString[2];
            $create['password'] = md5(rand(1,10000));
            $utilisateur->addNew($create);

        }


    }
}