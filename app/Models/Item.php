<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Filesystem\Filesystem;
use App\Models\Prediction;

class Item extends Model
{
    use HasFactory;

    public function prediction(){
        return $this->hasOne(Prediction::class);
    }

    public static $discreteAttributes = [
        'jenis_kelamin' => [
            'L',
            'P'
        ],
        'jarak_tempat_tinggal_ke_kampus' => [
            'Dekat',
            'Jauh'
        ],
        'ikut_organisasi' => [
            'Ya',
            'Tidak'
        ],
        'ikut_ukm' => [
            'Ya',
            'Tidak'
        ],
        'pekerjaan_orang_tua' => [
            'Wiraswasta',
            'Buruh',
            'Petani',
            'Karyawan Swasta',
            'PNS',
            'Pedagang',
            'Nelayan',
            'Pensiunan',
            'Wirausaha',
            'Sudah Meninggal'
        ],
        'penghasilan_orang_tua' => [
            'Rendah',
            'Sedang',
            'Tinggi'
        ]
    ];

    public static $continousAttributes = [
        'sks',
        'ipk',
        'tanggungan'
    ];

    public static function seed()
    {
        $csvArr = array_map('str_getcsv', file(base_path('public\data\dataset.csv')));

        for($i=0; $i<count($csvArr); $i++){
            Item::create([
                'jenis_kelamin' => $csvArr[$i][1],
                'jarak_tempat_tinggal_ke_kampus' => $csvArr[$i][2],
                'sks' => intval($csvArr[$i][3]),
                'ikut_organisasi' => ($csvArr[$i][4]),
                'ikut_ukm' => ($csvArr[$i][5]),
                'ipk' => floatval($csvArr[$i][6]),
                'pekerjaan_orang_tua' => $csvArr[$i][7],
                'penghasilan_orang_tua' => $csvArr[$i][8],
                'tanggungan' => intval($csvArr[$i][9]),
                'beasiswa' => ($csvArr[$i][10] == 'true') ? true : false
            ]);
        }

        // foreach($jsonArr as $data){
        //     Item::create([
        //         'jenis_kelamin' => $data['Jenis Kelamin'],
        //         'jarak_tempat_tinggal_ke_kampus' => $data['Jarak Tempat Tinggal ke Kampus'],
        //         'sks' => $data['SKS'],
        //         'ikut_organisasi' => $data['Ikut Organisasi'],
        //         'ikut_ukm' => $data['Ikut UKM'],
        //         'ipk' => $data['IPK'],
        //         'pekerjaan_orang_tua' => $data['Pekerjaan Orang Tua'],
        //         'penghasilan_orang_tua' => $data['Penghasilan'],
        //         'tanggungan' => $data['Tanggungan'],
        //         'beasiswa' => $data['Status Beasiswa']
        //     ]);
        // }
    }

    public function getPropertiesAsArray()
    {
        return [
            'jenis_kelamin' => $this->jenis_kelamin,
            'jarak_tempat_tinggal_ke_kampus' => $this->jarak_tempat_tinggal_ke_kampus,
            'sks' => $this->sks,
            'ikut_organisasi' => $this->ikut_organisasi,
            'ikut_ukm' => $this->ikut_ukm,
            'ipk' => $this->ipk,
            'pekerjaan_orang_tua' => $this->pekerjaan_orang_tua,
            'penghasilan_orang_tua' => $this->penghasilan_orang_tua,
            'tanggungan' => $this->tanggungan
        ];
    }

    public static function getProbabilities($input)
    {
        $positiveResult = (double) 1.0;
        $negativeResult = (double) 1.0;

        foreach(static::$discreteAttributes as $attr => $value){
            $dp = DiscreteProbability::where([
                ['attribute', "$attr" ],
                ['value', "$input[$attr]"]
            ])->get();

            $positiveProbability = $dp->where('beasiswa', true)->first()->probability; 
            $negativeProbability = $dp->where('beasiswa', false)->first()->probability; 
            $positiveResult *= $positiveProbability; 
            $negativeResult *= $negativeProbability;
        }

        foreach(Item::$continousAttributes as $attr){
            $cp = ContinousProbability::where('attribute', "$attr")->get();
            
            
            $positiveProbability = $cp->where('beasiswa', true)->first()->getProbability($input[$attr]);
            $negativeProbability = $cp->where('beasiswa', false)->first()->getProbability($input[$attr]);
            $positiveResult *= $positiveProbability;
            $negativeResult *= $negativeProbability;
        }

        // $positiveResult = round($positiveResult, 7);
        // $negativeResult = round($negativeResult, 7);

        $positiveResultNormalized = (double) $positiveResult / $cp->count();
        // $positiveResultNormalized = round($positiveResultNormalized, 7);
        $negativeResultNormalized = (double) $negativeResult / $cp->count();
        // $negativeResultNormalized = round($negativeResultNormalized, 7);

        return [
            'positive' => $positiveResultNormalized,
            'negative' => $negativeResultNormalized,
        ];
    }

}
