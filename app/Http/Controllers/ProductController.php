<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function newProduct(Request $request){
        $statement = "CALL sp_add_new_product(?,?,?,?,?,?,?,?)";
        $params = [
            $request['code'],
            $request['name'],
            floatval($request['price']),
            $request['detail'],
            $request['width'],
            $request['height'],
            $request['isUpdate'],
            $request['id']
        ];
        $data = DB::select($statement, $params);
        return $data;
    }

    public function getProducts(Request $request){
        $statement = "CALL sp_get_products()";
        $data = DB::select($statement);
        $results = collect($data);
        $paginator = new \Illuminate\Pagination\LengthAwarePaginator($results, 30, 10, 1);
        return $paginator;
    }

    public function deleteProduct(Request $request){
        return DB::statement("DELETE FROM products WHERE id = '".$request['id']."'");
    }

    public function getProductById(Request $request){
        return DB::select('select * from products where id="'.$request['id'].'"')[0];
    }
    public function updateProducts(Request $request){
        $statement = "CALL sp_add_new_product(?,?,?,?,?,?,?,?)";
        $params = [
            $request['code'],
            $request['name'],
            floatval($request['price']),
            $request['detail'],
            $request['width'],
            $request['height'],
            $request['isUpdate'],
            $request['id']
        ];
        $data = DB::select($statement, $params);
        return $data;
    }
}
