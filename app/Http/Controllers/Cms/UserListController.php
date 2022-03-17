<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class UserListController extends Controller
{
    public function index(Request $request) {
        if ($request->ajax()) {
            $data = User::select('*');

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row) {
                   $btn = '<div class="text-center">' ;
                   $btn = $row->is_verified ? $btn.'<a href="javascript:void(0)" class="btn btn-success btn-disabled">Verified</a>' : $btn.'<a href="javascript:void(0)" class="btn btn-primary">Approve</a>';
                   $btn = $btn.'</div>';

                   return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('pages.cms.user-list');
    }

    public function approveUser($id) {
        try {
            User::whereId($id)->update([
               'is_verified' => true,
            ]);

            return response()->json([
               'success' => true,
               'message' => 'User with id '.$id.' successfully verify'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage(),
                'message' => 'User with id '.$id.' failed to verify',
            ]);
        }
    }
}
