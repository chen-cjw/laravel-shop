<?php

namespace App\Http\Controllers\Api;

use App\Models\Introduce;
use App\Transformers\IntroduceTransformer;
use Illuminate\Http\Request;

class IntroducesController extends Controller
{
    public function show()
    {
        return $this->response()->item(Introduce::findOrFail(1),new IntroduceTransformer());
    }
}
