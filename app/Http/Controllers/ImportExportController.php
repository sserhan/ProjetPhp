<?php

namespace App\Http\Controllers;

use App\Items;
use App\User;
use CsvReader;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Excel;

class ImportExportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function importExport()
    {
        return view('importExport');

    }

    public function readCsv(Request $request){
        $path = $request->file('import_file')->storeAs(
            'upload', $request->user()->id . '.csv');
        //$reader = CsvReader::open(storage_path() . '/app/upload/' . $request->user()->id . '.csv',';');
        $utilisateur = new User();
        $row = 1;
        if (($handle = fopen(storage_path() . '/app/upload/' . $request->user()->id . '.csv', "r")) !== FALSE):
            while (($data = fgetcsv($handle, 1000, ";")) !== FALSE):
                $num = count($data);
                $row++;
                for ($c=0; $c < $num; $c++):
                    if($row > 1):
                        echo $data[0] . " | ";
                        $utilisateur->nom = $data[$c];
                        $utilisateur->prenom = $data[$c];
                        $utilisateur->email = $data[$c];
                        $utilisateur->password = md5(rand(1,10000));
                        $utilisateur->google_id = 'manual';
                        $test = $utilisateur->save();
                        echo $test . ",";
                    endif;
                endfor;
            endwhile;
            fclose($handle);
        endif;
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
