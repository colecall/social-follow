<?php

namespace App\Http\Controllers;

use App\Models\FakeAccount;
use App\Models\RealAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FakeAccountController extends Controller
{
    /**
     * Show the Create Fake Account page.
     *
     * @param  \App\Models\RealAccount  $realAccount
     * @return \Illuminate\Http\Response
     */
    public function linkFollInstagram(RealAccount $realAccount)
    {
        $fakeAccounts = FakeAccount::where('user_id', Auth::user()->id)->where('social_media', 'Instagram')->get();
        return view('account.instagram.fake-account', compact('fakeAccounts'));
    }

    public function linkFollTiktok(RealAccount $realAccount)
    {
        $fakeAccounts = FakeAccount::where('user_id', Auth::user()->id)->where('social_media', 'Tiktok')->get();
        return view('account.tiktok.fake-account', compact('fakeAccounts'));
    }

    public function linkSubsYoutube(RealAccount $realAccount)
    {
        $fakeAccounts = FakeAccount::where('user_id', Auth::user()->id)->where('social_media', 'Youtube')->get();
        return view('account.youtube.fake-account', compact('fakeAccounts'));
    }

    public function linkLikePost(RealAccount $realAccount)
    {
        $likePost = FakeAccount::where('user_id', Auth::user()->id)->get();
        return view('fake_accounts.create_fake_account', compact('likePost'));
    }

    public function linkCommentPost(RealAccount $realAccount)
    {
        $commentPost = FakeAccount::where('user_id', Auth::user()->id)->get();
        return view('fake_accounts.create_fake_account', compact('commentPost'));
    }

    /**
     * Store a newly created fake account in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fakeAccountsCount = FakeAccount::where('user_id', Auth::user()->id)->count();
        if ($fakeAccountsCount >= 5) {
            return redirect()->back()->with('error', 'Anda sudah mencapai maksimal fake account');
        }

        $request->validate([
            'username' => 'required'
        ]);

        FakeAccount::create([
            'user_id' => Auth::user()->id,
            'username' => $request->username,
            'social_media' => $request->social_media
        ]);

        return redirect()->back()->with('success', 'Fake account berhasil didaftarkan!');
    }
}
