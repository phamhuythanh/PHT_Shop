<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\CreateFormRequest;
use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Services\Menu\MenuService;

class MenuController extends Controller
{

    protected $menuService;

    public  function __construct(MenuService $menuService)
    {
        $this->menuService =$menuService;
    }

    public function index()
    {
        return view('admin.menus.list', [
           'title' => 'Danh sách danh mục',
            'menus' => $this->menuService->getAll()
        ]);
    }

    public function create(){
        return view('admin.menus.add', [
            'title' => 'Thêm danh mục mới',
            'menus' => $this->menuService->getParent()
        ]);

    }

    public function store(CreateFormRequest $request): \Illuminate\Http\RedirectResponse
    {
        $result = $this->menuService->create($request);

        return redirect()->back();
    }

    public function show(Menu $menu)
    {
        return view('admin.menus.edit', [
            'title' => 'Chỉnh sửa danh mục : '.$menu->name,
            'menu' => $menu,
            'menus' => $this->menuService->getParent()
        ]);
    }

    public function destroy(Request $request): \Illuminate\Http\JsonResponse
    {

        $result = $this->menuService->destroy($request);

        if($result){
            return response()->json([
                'error' => false,
                'messgae' => 'Xóa danh mục thành công'
            ]);
        }
        return response()->json([
            'error' => true
        ]);

    }

}
