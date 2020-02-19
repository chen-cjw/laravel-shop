<?php
namespace App\Transformers;
use App\Models\Categories;
use App\Models\Introduce;
use League\Fractal\TransformerAbstract;

class IntroduceTransformer extends TransformerAbstract
{
    public function transform(Introduce $introduce)
    {
        return [
            'id' => $introduce->id,
            'description' => $introduce->description,
            'created_at' => $introduce->created_at->toDateTimeString(),
            'updated_at' => $introduce->updated_at->toDateTimeString(),
        ];
    }
}