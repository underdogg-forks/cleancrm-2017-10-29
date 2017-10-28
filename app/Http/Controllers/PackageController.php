<?php
namespace App\Http\Controllers;

use App\Package;
use App\PackageUser;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PackageController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages = Package::orderby('created_at', 'desc')->paginate(10);
        return view('packages.index', compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('packages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Package::create($request->input());
        return redirect()->route('packages.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $package = Package::find($id);
        return view('packages.show', compact('package'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $package = Package::find($id);
        return view('packages.edit', compact('package'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Package::where('id', $id)->update($request->except('_token', '_method', 'submit'));
        return redirect('/packages');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Package::destroy($id);
        return redirect('/packages');
    }

    public function subscribe(Request $request, $id)
    {
        if ($this->subscribeUser($id)) {
            return redirect(config('package.redirect.success'));
        } else {
            return redirect(config('package.redirect.failed'));
        }
    }

    public function subscribeUser($id)
    {
        $package = Package::find($id);
        $subscribed_at = Carbon::now();
        $type = $package->type;
        $packageUser = PackageUser::create([
          'package_id' => $package->id,
          'user_id' => Auth::user()->id,
          'status' => 1,
          'subscribed_at' => Carbon::now(),
          'expired_at' => ($type == 0) ? $subscribed_at->addMonths($package->duration) : $subscribed_at->addYears($package->duration),
        ]);
        return $packageUser;
    }

    public function unsubscribed()
    {
        $packages = Package::where('status', 1)->get();
        return view('packages.unsubscribed', compact('packages'));
    }

    public function expired()
    {
        $packages = Package::where('status', 1)->get();
        return view('packages.expired', compact('packages'));
    }
}
