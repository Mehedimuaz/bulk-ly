<?php

namespace Bulkly\Http\Controllers;

use Bulkly\BufferPosting;
use Bulkly\SocialPostGroups;
use Bulkly\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class BufferPostingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(Auth::id());
//        $bufferPostings = BufferPosting::take(10)->get();
        $bufferPostings = BufferPosting::paginate(10);
        $socialPostGroups = SocialPostGroups::where('user_id', Auth::id())->select('type')->distinct('type')->get();
//        var_dump($bufferPosting);
        return View::make('pages.buffer-posting', compact('user', 'bufferPostings', 'socialPostGroups'));
    }

    public function search()
    {
        return redirect(url('buffer-postings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \Bulkly\BufferPosting  $bufferPosting
     * @return \Illuminate\Http\Response
     */
    public function show(BufferPosting $bufferPosting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Bulkly\BufferPosting  $bufferPosting
     * @return \Illuminate\Http\Response
     */
    public function edit(BufferPosting $bufferPosting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Bulkly\BufferPosting  $bufferPosting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BufferPosting $bufferPosting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Bulkly\BufferPosting  $bufferPosting
     * @return \Illuminate\Http\Response
     */
    public function destroy(BufferPosting $bufferPosting)
    {
        //
    }
}
