<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actuator;

class actuatorsController extends Controller
{
    public function index(){
        return Actuator::paginate();
    }

    //consultar un sensor
    public function show($id){
        return Actuator::find($id);
    }

    //crear un sensor
    public function store(Request $request){
        $this->validate($request,[
            'name' => 'required|unique:sensors',
            'type' => 'required',
            'value' => 'required',
            //'date' => 'required',
            //'user_id' => 'required',
        ]);
        $actuators = new Actuator();
        $actuators->fill($request->all());
        $actuators->date('Y-m-d H:i:s');
        $actuators->save();
        return $actuators;
    }

    //actualizar un sensor
    public function update(Request $request,$id){
        $this->validate($request,[
            'name' => 'filled|unique:sensors',
        ]);
       $actuators = Actuator::find($id);
       $actuators->update($request->all());
       if(!$actuators) return response('',404);
       $actuators->update($request->all());
       $actuators->save();
       return $actuators;
    }

    //eliminar un sensor
    public function destroy($id){
        $actuators = Actuator::find($id);
        if(!$actuators) return response('',404); 
        $actuators->delete();
        return $actuators;
    }
}
