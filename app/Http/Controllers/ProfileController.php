<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\User;
use App\Repos\FileRepository;
use App\Repos\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    protected $userModel;
    protected $fileModel;

    public function __construct(
        UserRepository $userModel,
        FileRepository $fileModel
    ) {
        $this->userModel = $userModel;
        $this->fileModel = $fileModel;
    }
    
    /**
     * Профиль авторизированого юзера
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('profile', [
            'posts' => Auth::user()->posts
        ]);
    }

    /**
     * Профиль юзера по айди
     *
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        return view('profile-detail', [
            'user' => $this->userModel->find($id)
        ]);
    }

    /**
     * Обновление фотографии профиля
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateAvatar(Request $request)
    {
        if ($request->hasFile('avatar')) {
            $file = File::create([
                'name' => $request->file('avatar')->store('avatars', 'public')
            ]);

            $user = User::find(Auth::user()->id);
            $current_file_id = $user->file_id;

            $user->update([
                'file_id' => $file->id
            ]);

            if ($current_file_id != 1) {
                $file = File::find($current_file_id);

                Storage::disk('public')->delete($file->name);
                
                $file->delete();
            }
        }

        return response()->json(['msg' => 'update']);
    }
}
