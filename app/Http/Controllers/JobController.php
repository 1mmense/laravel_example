<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::with(['employer', 'tags'])->latest()->paginate(4);

        return view('jobs.index', [
            'jobs' => $jobs
        ]);
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function show(Job $job)
    {
        return view('jobs.show', [
            'job' => $job
        ]);
    }

    public function edit(Job $job)
    {
        // Gate::authorize('edit-job', $job);

        // if (Auth::user()->cannot('edit-job', $job)) {
        //     # code...
        // }

        // if (Gate::denies('edit-job', $job)) {
        //     // code...
        // }

        return view('jobs.edit', [
            'job' => $job
        ]);
    }

    public function update(Job $job)
    {
        // authorization
        Gate::authorize('edit-job', $job);

        request()->validate([
            'title'  => ['required', 'min:3'],
            'salary' => ['required']
        ]);

        $job->update([
            'title'  => request('title'),
            'salary' => request('salary'),
            // 'employer_id' => request('employer_id'),
        ]);

        return redirect("/jobs/{$job->id}");
    }

    public function destroy(Job $job)
    {
        // authorization

        $job->delete();

        return redirect('/jobs');
    }

    public function store()
    {
        request()->validate([
            'title'  => ['required', 'min:3'],
            'salary' => ['required']
        ]);

        Job::create([
            'title'       => request('title'),
            'salary'      => request('salary'),
            'employer_id' => 1,
            // 'employer_id' => request('employer_id'),
        ]);

        return redirect('/jobs');
    }
}
