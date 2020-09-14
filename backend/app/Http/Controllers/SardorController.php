<?php

namespace App\Http\Controllers;

use App\{
    Viloyat,
    Shaxar,
    Maxalla
};

use Illuminate\Http\Request;

class SardorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

//    public function index()
//    {
//        $list = Viloyat::select('viloyats.id as id','viloyats.name as vil_name','viloyats.hokimi as vil_hokim','shaxars.name as shaxar_name','maxallas.name as maxalla_name')->leftJoin('shaxars', 'shaxars.viloyat_id', 'viloyats.id')
//            ->leftJoin('maxallas', 'shaxars.id', 'maxallas.tuman_id')->get();
//        return $list;
//    }
    public function index()
    {
        $vil = Viloyat::
        // all();
          with('shaxar')
        ->with('shaxar.maxalla')
        ->get();

        $list=[];

        foreach ($vil as $key=>$value){
                foreach ($value['shaxar'] as $ke => $val) {
                        foreach ($val['maxalla'] as $k => $v) {
                            array_push($list, (object)
                            [
                                'Vilid' => $value->id,
                                'Vilname' => $value->name,
                                'Vilmaydon' => $value->maydoni,
                                'Vilhokim' => $value->hokimi,

                                'ShaxId' => $val->id,
                                'ShaxName' => $val->name,
                                'ShaxHokimi' => $val->hokimi,

                                'MaxId' => $v->id,
                                'MaxName' => $v->name,
                                'MaxRais' => $v->rais,
                            ]);
                        }
                        array_push($list, (object)
                        [
                            'Vilid' => $value->id,
                            'Vilname' => $value->name,
                            'Vilmaydon' => $value->maydoni,
                            'Vilhokim' => $value->hokimi,

                            'ShaxId' => $val->id,
                            'ShaxName' => $val->name,
                            'ShaxHokimi' => $val->hokimi,
                        ]);
                    }
                }

//            array_push($list, (object)
//            [
//                'Vilid' => $value->id,
//                'Vilname'=>$value->name,
//                'Vilmaydon'=>$value->maydoni,
//                'Vilhokim'=>$value->hokimi,
//
//            ]);




        // return $vil;
        return $list;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
