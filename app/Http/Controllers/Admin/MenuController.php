<?php

namespace App\Http\Controllers\Admin;

use App\Lang;
use App\Menu_group;
use App\Submenu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use phpDocumentor\Reflection\DocBlock\Description;

class MenuController extends Controller
{
    public function index()
    {
        return view('admin.menu');
    }

    public function getmenugroup()
    {
        $menu = Menu_group::with('lang')->get();
        $langs = Lang::all();
        return [$menu, $langs];
    }

    public function deletegroupmenu(Request $request)
    {
        return Menu_group::where('id', $request->id)->delete();

    }

    public function savegroupmenu(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        if ($request->editflag != false) {
            $save = Menu_group::where('id', $request->groupid)->first();
        } else {
            $save = new Menu_group();
        }

        $save->name = $request->name;
        $save->lang_id = $request->langselect['id'];
        $save->save();
    }














    public function submenu($id)
    {
        return view('admin.submenu', compact('id'));
    }


    public function getsubmenu(Request $request)
    {
        return Submenu::where([['parent', $request->parentid],['menu_group_id', $request->groupid]])->get();

    }

    public function deletesubmenu(Request $request)
    {
        return Submenu::where('id', $request->id)->delete();

    }


    public function savesubmenu(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        if ($request->editflag != false) {
            $save = Submenu::where('id', $request->menuid)->first();
        } else {
            $save = new Submenu();
        }

        $save->name = $request->name;
        $save->icon = $request->icon;
        $save->url = $request->url;
        $save->parent = $request->parentid;
        $save->menu_group_id = $request->groupid;
        $save->save();
    }


































}
