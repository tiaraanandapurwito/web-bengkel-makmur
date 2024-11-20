<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $services = Service::all();
        $service = null;

        // Jika ada parameter "service" di URL, ambil data untuk edit
        if ($request->has('service')) {
            $service = Service::findOrFail($request->service);
        }

        return view('admin.servis', compact('services', 'service'));
    }


    public function create()
    {
        return view('services.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'vehicle_type' => 'required|string',
            'service_name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);

        Service::create($request->all());

        return redirect()->route('admin.servis')->with('success', 'Service created successfully.');
    }

    public function edit(Service $service)
    {
        return view('services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'vehicle_type' => 'required|string',
            'service_name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
        ]);

        $service->update($request->all());

        return redirect()->route('admin.servis')->with('success', 'Service updated successfully.');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('admin.servis')->with('success', 'Service deleted successfully.');
    }
}
