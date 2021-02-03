<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminCOntroller extends Controller
{
    public function admin()
    {
        return view('admin.admin');
    }
     public function insert()
    {
        return view('admin.insert');
    }
     public function update()
    {
        return view('admin.update');
    }
    public function delete()
    {
        return view('admin.delete');
    }
    public function insertpost(Request $request)
    {
        $this->validate($request,[
     'nom' => 'required',
     'prix' => 'required',       
 ]);
     $data = array(

     'nom' =>$request->nom,    
     'prix' =>(float)$request->prix,
 );
      $id=random_int(1,1000);
       \DB::table('items')
        ->updateOrInsert(
        ['id'=> $id ,'nom' => $data['nom'], 'prix' => $data['prix'],]
    );
        return redirect()->to('/insert');
    }
    public function updatepost(Request $request)
    {
      $this->validate($request,[
      'item' => 'required',
     'nom' => 'required',
     'prix' => 'required',       
 ]);
      $data = array(
      'item' => $request->item,
     'nom' =>$request->nom,    
     'prix' =>(float)$request->prix,
 );
      \DB::table('items')
        ->updateOrInsert(
        [ 'nom' => $data['item'] ],
        ['nom' => $data['nom'], 'prix' => $data['prix']
    ]);
     return redirect()->to('/update');

    }
    public function deletepost(Request $request)
    {
        $this->validate($request,[
     'item' => '',       
 ]);
     
     $data = $request->item ;

  \DB::table('items')->where('nom',$data)->delete();
        return redirect()->to('/delete');
    }
}
