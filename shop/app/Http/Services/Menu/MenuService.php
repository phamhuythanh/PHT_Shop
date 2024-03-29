<?php


namespace App\Http\Services\Menu;


use App\Models\Menu;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class MenuService
{
    public function getParent()
    {
        return Menu::where('parent_id', 0)->get();
    }

    public function getAll()
    {
        return Menu::orderbyDesc('id')->paginate(20);
    }

    public function create($request)
    {
        try {
            Menu::create([
                'name' => $request->input('name'),
                'parent_id' => $request->input('parent_id'),
                'description' => $request->input('description'),
                'content' => $request->input('content'),
                'active' => $request->input('active')
            ]);
            Session::flash('success','Thêm danh mục thành công!');
        } catch (Exception $err)
        {
            Session::flash('error', $err->getMessage());
            return false;
        }
        return true;
    }

    public function destroy($request){
        $id = (int) $request->input('id');
        $menu = Menu::where('id', $id)->first();

        if($menu){
            return Menu::where('id',$id)->orWhere('parent_id', $id)->delete();
        }

        return false;
    }

}
