<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class UserListController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function index(Request $request) {
        if ($request->ajax()) {
            $data = User::select('*');

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row) {
                   $btn = '<div class="text-center">';
                   $btn = $row->is_verified ? $btn.'<btn href="javascript:void(0)" class="btn btn-success btn-disabled" id="btn-verified">Verified</btn>' : $btn.'<btn class="btn btn-primary" data-user-id="'.$row->id.'" id="btn-approve">Approve</btn>';
                   $btn = $btn.'</div>';

                   return $btn;
                })
                ->addColumn('avatar', function($row) {
                    $avatarPath = $row->avatar !== null ? asset($row->avatar) : 'https://randomuser.me/api/portraits/men/'.rand(1, 75).'.jpg';
                    $avatar = '<div class="avatar text-center">';
                    $avatar = $avatar.'<img class="img-fluid" src="'.$avatarPath.'">';
                    $avatar = $avatar.'</div>';

                    return $avatar;
                })
                ->rawColumns(['action', 'avatar'])
                ->make(true);
        }

        return view('pages.cms.user-list');
    }

    public function approveUser($id) {
        try {
            $user = User::whereId($id)->first();
            $user->is_verified = true;

            if ($user->save()) {
                return response()->json([
                    'success' => true,
                    'message' => 'User with id '.$id.' successfully verify',
                    'user' => $user,
                ]);
            } else {
                throw new \Exception("Failed to approve this user, please try again");
            }

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage(),
                'message' => 'User with id '.$id.' failed to verify',
            ]);
        }
    }
}
