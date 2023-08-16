<?php

namespace App\Http\Controllers;


use App\Models\Store;
use Illuminate\Http\Request;
use function PHPUnit\Framework\returnArgument;

class StoreController extends Controller
{

    public function search(Request $request)
    {
        $perPage = !empty($request->input('per_page')) ? $request->input('per_page') : 10;
        $page = !empty($request->input('page')) ? $request->input('page') : 1;

        $store_name = $request->input('store_name', '');
        $phone = $request->input('phone', '');
        $address = $request->input('address', '');

        $query = Store::query();

        if (!empty($store_name)) {
            $query->where('store_name', 'like', '%' . $store_name . '%');
        }
        if (!empty($phone)) {
            $query->where('phone', 'like', '%' . $phone . '%');
        }
        if (!empty($address)) {
            $query->where('address', 'like', '%' . $address . '%');
        }

        $items = $query->paginate($perPage, ['*'], 'page', $page)->toArray();

        if (empty($items['data'])) {
            $items = $query->paginate($perPage, ['*'], 'page', 1)->toArray();
        }

        if (!empty($items['data'])) {
            return response()->json($items['data']);
        }
        return response()->json([]);
    }

    public function create(Request $request)
    {
        $data = [
            'user_id' => !empty($request->input('user_id')) ? $request->input('user_id') : '',
            'store_name' => !empty($request->input('store_name')) ? $request->input('store_name') : '',
            'address' => !empty($request->input('address')) ? $request->input('address') : '',
            'phone' => !empty($request->input('phone')) ? $request->input('phone') : ''
        ];
        $model = new Store($data);
        if ($model->validateData($data)) {
            if ($model->save()) {
                return response()->json(['message' => 'Save Store Success'], 200);
            }
        }
        return response()->json(['message' => 'Save Store False'], 200);
    }

    public function update(Request $request)
    {
        $id = $request->input('id') ? intval($request->input('id')) : '';
        $model = Store::where('id', $id)->first();
        if (!empty($model)) {
            $model->user_id = !empty($request->input('user_id')) ? $request->input('user_id') : $model->user_id;
            $model->store_name = !empty($request->input('store_name')) ? $request->input('store_name') : $model->store_name;
            $model->address = !empty($request->input('address')) ? $request->input('address') : $model->address;
            $model->phone = !empty($request->input('phone')) ? $request->input('phone') : $model->phone;
            if ($model->validateData($model->toArray())) {
                if ($model->save()) {
                    return response()->json(['message' => 'Update Store Success'], 200);
                }
            }
        }
        return response()->json(['message' => 'Update Store False'], 200);
    }

    public function delete($id)
    {
        $model = Store::where('id', $id)->first();
        if (!empty($model)) {
            if ($model->delete()) {
                return response()->json(['message' => 'Delete Store Success'], 200);
            }
            return response()->json(['message' => 'Delete Store False'], 200);
        }
        return response()->json(['message' => 'Delete Store False'], 200);
    }

    public function detail($id)
    {
        $model = Store::where('id', $id)->first();
        if (!empty($model)) {
            return response()->json(['message' => 'Get detail Store Success', 'data' => $model], 200);
        }
        return response()->json(['message' => 'Get detail Store Success', 'data' => []], 200);
    }



}
