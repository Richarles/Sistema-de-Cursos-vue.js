<?php

namespace App\Http\Controllers;

use App\Services\CurseService;
use Illuminate\Http\Request;

class CurseController extends Controller
{
    protected $curseService;

    public function __construct(CurseService $curseService)
    {
        $this->curseService = $curseService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $listCurse = $this->curseService->listCurse($request);

        return $listCurse; 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $createCurse = $this->curseService->createCurse($request);

        return response()->json($createCurse);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $editCurse = $this->curseService->editCurse($id);

        return $editCurse;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->curseService->updateCurse($request,$id);

        return response()->json('Curse updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->curseService->deleteCurse($id);

        return response()->json('Curse deleted!');
    }
}
