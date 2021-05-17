<?php

namespace App\Http\Controllers;

use App\Http\Requests\ObraRequest;
use App\Models\ModelObra;
class ObraController extends Controller
{   
    private $objObra;

    public function __construct(){
        $this->objObra = new ModelObra;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $obras=$this->objObra->all();
        return view('index', compact('obras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('incluir');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ObraRequest $request)
    {
        $cad=$this->objObra->create([
            'titulo'=>$request->titulo,
            'nome_artista'=>$request->nome_artista,
            'altura'=>$request->altura,
            'largura'=>$request->largura,
            'profundidade'=>$request->profundidade,
            'preco'=>$request->preco
        ]);

        if($cad){
            return redirect('obras');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $obra=$this->objObra->find($id);
        return view('dados', compact('obra'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $obra=$this->objObra->find($id);
        return view('incluir', compact('obra'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ObraRequest $request, $id)
    {
        $this->objObra->where(['id'=>$id])->update([
            'titulo'=>$request->titulo,
            'nome_artista'=>$request->nome_artista,
            'altura'=>$request->altura,
            'largura'=>$request->largura,
            'profundidade'=>$request->profundidade,
            'preco'=>$request->preco
        ]);
        
        
        return redirect('obras');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del=$this->objObra->destroy($id);
        
        return($del)?"sim":"não";
    }
}
