<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\DiscreteProbability;
use App\Models\ContinousProbability;
use App\Models\Prediction;

class ItemController extends Controller
{
    public function index()
    {
        return view('index', [
            'title' => 'Diagnostic',
            'post' => [
                'jenis_kelamin' => null,
                'jarak_tempat_tinggal_ke_kampus' => null,
                'sks' => null,
                'ikut_organisasi' => null,
                'ikut_ukm' => null,
                'ipk' => null,
                'pekerjaan_orang_tua' => null,
                'penghasilan_orang_tua' => null,
                'tanggungan' => null
            ]
        ]);
    }

    public function diagnose(Request $request)
    {
        $rules = [
            'jenis_kelamin' => 'required',
            'jarak_tempat_tinggal_ke_kampus' => 'required',
            'sks' => 'required',
            'ikut_organisasi' => 'required',
            'ikut_ukm' => 'required',
            'ipk' => 'required',
            'pekerjaan_orang_tua' => 'required',
            'penghasilan_orang_tua' => 'required',
            'tanggungan' => 'required'
        ];

        $validatedData = $request->validate($rules);
        // dd($validatedData);
        
        $resultProbabilities = Item::getProbabilities($validatedData);
        
        $result = ($resultProbabilities['positive'] >= $resultProbabilities['negative']) ? true : false;

        return view('index', [
            'title' => 'Diagnostic',
            'result' => $result,
            'post' => $validatedData
        ]);
    }
    
    public function about()
    {
        return view('about', [
            'title' => 'About',
            'accuracy' => Prediction::getAccuracy()
        ]);
    }

    public function learning()
    {
        return view('learning.index', [
            'title' => 'Learning',
            'items' => Item::all()
        ]);
    }
    
    public function discrete_probability()
    {
        return view('learning.discrete_probability', [
            'title' => 'Discrete Probability',
            'discrete_probabilities' => DiscreteProbability::all()
        ]);
    }
    
    public function continous_probability()
    {
        return view('learning.continous_probability', [
            'title' => 'Continous Probability',
            'continous_probabilities' => ContinousProbability::all()
        ]);
    }
    
    public function prediction()
    {
        $all = Prediction::all();
        $correct_prediction = $all->where('is_accurate', true)->count();
        // dd(Prediction::where('is_accurate', true)->get() );
        // dd($all);
        $false_prediction = $all->where('is_accurate', false)->count();
        $accuracy = round( 100*($correct_prediction / ($correct_prediction + $false_prediction)), 2);

        return view('learning.prediction', [
            'title' => 'Prediction',
            'predictions' => $all,
            'correct_prediction' => $correct_prediction,
            'false_prediction' => $false_prediction,
            'accuracy' => $accuracy,
        ]);
    }




}
