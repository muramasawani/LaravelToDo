<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Input;
use App\Http\Requests\todoRequest;
use Validator;

class todoController extends Controller
{
    function index(Request $request){
        $todolist = DB::table('todolist')->get();

        return view('hello',['todolist'=>$todolist]);
    }

    function add(Request $request){
        $validator = Validator::make($request->all(),[
            'genre' => 'numeric|between:1,3',
            'content' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('/hello')
                    ->withErrors($validator)
                    ->withInput();
        }else{
            $genre = $request->input('genre');
            $content = $request->input('content');

            DB::table('todolist')->insert(
                ['genre' => $genre, 'content' => $content]
            );
        }

        $todolist = DB::table('todolist')->orderBy('id')->get();

        return view('hello',['todolist'=>$todolist,'status'=>true,]);
    }

    function delete($id){
        DB::table('todolist')->where('id', '=', $id)->delete();

        $todolist = DB::table('todolist')->orderBy('id')->get();

        return redirect()->to('hello');
    }

}
