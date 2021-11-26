<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PersonalInformation;
use App\Models\User;

use App\Http\Requests\StorePersonalInformationRequest;

class PersonalInformationController extends Controller
{
    public function store(StorePersonalInformationRequest $request) {
        $user = User::findOrFail($request->user);
        $dta = $request->only(['nombre', 'apellidos', 'sexo', 'direccion', 'fecha_nacimiento']);
        $info = PersonalInformation::create($dta + ['user_id' => $user->id]);
        return $info;
    }
}
