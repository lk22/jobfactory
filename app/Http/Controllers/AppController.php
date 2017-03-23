<?php

namespace JobDesk\Http\Controllers;

use Illuminate\Http\Request;

use JobDesk\User;
use JobDesk\Post;
use JobDesk\JobApplication;
use JobDesk\JobPosition;

class AppController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(User $user, Post $post, JobApplication $job, JobPosition $position)
    {
        $this->user = $user;
        $this->post = $post;
        $this->job = $job;
        $this->position = $position;

        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = $this->job->whereUserId( auth()->user()->id )->with('user')->latest()->get();

        $positions = $this->position->all();

        return view('profile', compact('jobs', 'positions'));
    }
}
