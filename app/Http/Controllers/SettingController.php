<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repository\UserRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

use function auth;

class SettingController extends Controller
{
    public $userRepository;

    /**
     * SettingController constructor.
     *
     * @param  UserRepository  $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        return view('settings');
    }

    /**
     * Update AutoBid settings.
     *
     * @param  Request  $request
     *
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $this->userRepository->update(auth()->user(), ['auto_bid' => $request->input('auto_bid')]);

        return redirect()->back()->with('success', 'Settings Updated');
    }

    /**
     * Update profile settings (name, username, email).
     *
     * @param  Request  $request
     *
     * @return RedirectResponse
     */
    public function updateProfile(Request $request): RedirectResponse
    {
        // Validate input data
        $request->validate([
            'name'     => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . auth()->id(),
            'email'    => 'required|string|email|max:255|unique:users,email,' . auth()->id(),
        ]);

        // Update user profile
        $this->userRepository->update(auth()->user(), [
            'name'     => $request->input('name'),
            'username' => $request->input('username'),
            'email'    => $request->input('email'),
        ]);

        return redirect()->back()->with('success', 'Profile Updated Successfully');
    }
}
