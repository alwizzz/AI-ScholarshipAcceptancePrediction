<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Item;

class DiscreteProbability extends Model
{
    use HasFactory;

    public static function seed($attribute, $value)
    {
        $data = Item::select($attribute, 'beasiswa')->where([
            [$attribute, $value]
        ])->get();
    
        $dataCount = $data->count();
        $positiveCount = $data->where('beasiswa', true)->count();
        $negativeCount = $data->where('beasiswa', false)->count();

        $positiveProbability = $positiveCount / $dataCount; 
        $negativeProbability = $negativeCount / $dataCount;

        // if($positiveProbability == 0){ $positiveProbability = 0.00000000000001;}
        // if($negativeProbability == 0){ $negativeProbability = 0.00000000000001;}

        DiscreteProbability::create([
            'attribute' => $attribute,
            'value' => $value,
            'beasiswa' => true,
            'probability' => $positiveProbability
        ]);
        DiscreteProbability::create([
            'attribute' => $attribute,
            'value' => $value,
            'beasiswa' => false,
            'probability' => $negativeProbability
        ]);
    }

}
