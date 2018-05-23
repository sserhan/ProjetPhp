<?php

namespace App\Http\Controllers;

use App\Items;
use CsvReader;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Excel;

class ImportExportController extends Controller
{
    public function importExport()
    {
        return view('importExport');

    }

    public function readCsv(Request $request){
        $file=$request->file('import_file');
        $file->store('public');
        $nomFichier = asset('storage' . '/' . $file->getFileName());
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

    /*
    public function loadExcelFile($file){
        $nomFichier = $file->getRealPath;
        $spreadSheet = null;
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        try {
            $spreadSheet = $reader->load($nomFichier);

        } catch (Exception $e) {
            echo $e->getTrace();
        }
        return $spreadSheet;
    }

    public function readExcelFile($spreadSheet){
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

    }
    public function downloadExcel($type)
    {
        $data = Items::get()->toArray();
        return Excel::download/Excel::store('itsolutionstuff_example', function($excel) use ($data) {
            $excel->sheet('mySheet', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($type);
    }

    public function importExcel()
    {
        if(Input::hasFile('import_file')){
            $path = Input::file('import_file')->getRealPath();
            $data = Excel::load($path, function($reader) {
            })->get();
            if(!empty($data) && $data->count()){
                foreach ($data as $key => $value) {
                    $insert[] = ['nom' => $value->nom, 'prenom' => $value->prenom, 'mail' => $value->mail];
                }
                if(!empty($insert)){
                    DB::table('items')->insert($insert);
                    dd('Insert Record successfully.');
                }
            }
        }

        return back();

    }
    */
}
