<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu as MenuModel;
use \App\Http\Resources\MenuResource;

class MenuController extends Controller
{
    public function index()
    {
        $data = [
            'menu'  => MenuModel::all(),
            'page'  => 'Menu',
            'toko'  => 'Market 001'
        ];
        return view('menus.menu', compact('data'));
    }

    //API
    public function list_menu(Request $request)
    {
        try {
                $query = MenuModel::where($request->column, 'LIKE', '%' . $request->keyword . '%')
                                    ->paginate(
                                        $perPage = $request->perPage, $columns = ['*'], 'page', $request->pageSelect
                                    );
                $menus = MenuResource::collection($query);

                return $menus;
        }catch(Exception $e){
            return response()->json($this->generate_response(
                array(
                    "message" => $e->getMessage(),
                    "status_code" => $e->getCode()
                )
            ));
        }
    }
}
