<?php

namespace App\Http\Controllers\Admin;

use App\Model\admin\Perm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class PermController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Perm::all();
        return view('admin/permission/show', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin/permission/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|max:50|unique:perms',
            'for' => 'required'
        ]);

        $permissions= new Perm();
        $permissions->name = $request->name;
        $permissions->for = $request->for;
        $permissions->save();

        return redirect(route('permission.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\admin\Perm  $perm
     * @return \Illuminate\Http\Response
     */
    public function show(Perm $perm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\admin\Perm  $perm
     * @return \Illuminate\Http\Response
     */
    public function edit(Perm $permission)
    {;
        $permission = Perm::find($permission->id);
        return view ('admin/permission/edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\admin\Perm  $perm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Perm $permission)
    {
        $this->validate($request,[
            'name' => 'required|max:50',
            'name' => 'required'
        ]);

        $permission= Perm::find($permission->id);
        $permission->name = $request->name;
        $permissions->for = $request->for;
        $permission->save();

        return redirect(route('permission.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\admin\Perm  $perm
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perm $permission)
    {
        Perm::where('id', $permission->id)->delete();
        return redirect()->back();
    }
}
