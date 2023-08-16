<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Prediksi;
use Illuminate\Http\Request;
use App\Charts\PrediksiChart;
use Phpml\Classification\SVC;
use App\Exports\PrediksiExport;
use App\Imports\PrediksiImport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Phpml\SupportVectorMachine\Kernel;
use Illuminate\Console\View\Components\Alert;

class PrediksiController extends Controller
{
    // svm predict
    protected $clasifier;
    public function __construct(){
        $this->clasifier = new SVC();
    }
    // tampil data stroke
    public function index(){
        $data = Prediksi::paginate(10);
        // dd($data);

        return view('data-training',compact('data'));

    }

    // Menambahkan Data Catalog
    public function tdstroke(){
        return view('tdstroke');
    }
    public function insertstroke(Request $request){
        // dd($request->all());
        Prediksi::create($request->all());
        return redirect()->route('stroke')->with('success','Data Berhasil Di Tambahkan');
    }

    // Tampil Data
    public function tampildata($id){
        $data = Prediksi::find($id);
        // dd($data);
        return view('updatedata', compact('data'));
    }

    // update data
    public function updatedata(Request $request, $id){
        $data = Prediksi::find($id);
        $data->update($request->all());
        return redirect()->route('stroke')->with('success','Data Berhasil Di Update');
    }

    // delete data
    public function delete($id){
        $data = Prediksi::find($id);
        $data->delete();
        return redirect()->route('stroke')->with('success','Data Berhasil Di Hapus');
    }

    // delete all data

    // import excel
    public function importexcel(Request $request){
        // validasi excel
        $this->validate($request,[
            'file'=> 'required|mimes:csv,xls,xlsx'
        ]);
        // menangkap file
        $data = $request->file('file');
        Excel::import(new PrediksiImport, $data);

        return redirect()->back();
    }

    // prediksi
    public function predict(Request $request){
        $predictStroke = Prediksi::select(['id', 'gender', 'age', 'hypertension', 'heart_disease', 'ever_married', 'avg_gluose_level', 'bmi', 'smoking_status','stroke'])->get()->toArray();

        $prediksi = [];
        $label_prediksi = [];

        $ids_prediksi = [];

        for ($i = 0; $i < count($predictStroke); $i++){
            array_push($prediksi, [
                $predictStroke[$i]['gender'],
                $predictStroke[$i]['age'],
                $predictStroke[$i]['hypertension'],
                $predictStroke[$i]['heart_disease'],
                $predictStroke[$i]['ever_married'],
                $predictStroke[$i]['avg_gluose_level'],
                $predictStroke[$i]['bmi'],
                $predictStroke[$i]['smoking_status']
            ]);
            array_push($label_prediksi, $predictStroke[$i]['stroke']);
            array_push($ids_prediksi, $predictStroke[$i]['id']);
        }
        // dd($prediksi);

        // Train Svm classifier
        $classifier = new SVC(Kernel::LINEAR, $cost = 1000);
        $classifier->train($prediksi, $label_prediksi);
        // dd($classifier);

        // mengambil data permintaan
        $gender = $request->input('gender');
        $age = $request->input('age');
        $hypertension = $request->input('hypertension');
        $heart_disease = $request->input('heart_disease');
        $ever_married = $request->input('ever_married');
        $avg_gluose_level = $request->input('avg_gluose_level');
        $bmi = $request->input('bmi');
        $smoking_status = $request->input('smoking_status');

        // menetapkan data array
        $test = [
            (string) $gender,
            (int) $age,
            (string) $hypertension,
            (string) $heart_disease,
            (string) $ever_married,
            (string) $avg_gluose_level,
            (string) $bmi,
            (string) $smoking_status,
        ];
        // dd($test);

        // prediksi dengan classifier
        $result = $classifier->predict($test);
        // dd($result);
        return view('prediksi',[
            'result' => $result,
        ]);
    }
    // form prediksi
    public function predictForm(){
        return view('prediksi');
    }
    // login
    public function login(){
        return view('login');
    }

    // delete all data
    public function deleteall(Request $request){
        $data = Prediksi::truncate();
        $data->delete();
        return redirect()->route('stroke')->with('success','Semua Data Berhasil Di Hapus');
    }


    // form panduan
    public function panduan(){
        return view('panduan');
    }

    // export pdf
    public function exportpdf(){
        $data = Prediksi::all();
        view()->share('data', $data);
        $pdf = PDF::loadview('datastroke-pdf');
        return $pdf->download('data.pdf');
    }

    // export excel
    public function exportexcel(){
        return Excel::download(new PrediksiExport, 'datastroke.xlsx');
    }


}
