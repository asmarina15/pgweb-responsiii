<?php

namespace App\Http\Controllers;

use App\Models\Polylines;
use Illuminate\Http\Request;

class PolylineController extends Controller
{
    public function __construct()
    {
        $this->polyline = new Polylines();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $polylines = $this->polyline->polylines();

        foreach ($polylines as $polyline) {
            $feature[] = [
                "type" => "Feature",
                "geometry" => json_decode($polyline->geom),
                "properties" => [
                    "id" => $polyline->id, //id sebagai kunci penghapusan data
                    "name" => $polyline->name,
                    "description" => $polyline->description,
                    "image" => $polyline->image,
                    "created_at" => $polyline->created_at,
                    "updated_at" => $polyline->updated_at
                ]
            ];
        }

        return response()->json([
            "type" => "FeatureCollection",
            "features" => $feature,
        ]);


        //dd($points);

        //return response()->json($points);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) //memasukkan data ke dalam database
    {
        //validate Request
        $request->validate(
            [
                "name" => "required",
                "geom" => "required",
                "image" => "required:jpg,jpeg,png,tiff,gif|max:10000" //10mb
            ],
            [
                "name.required" => "Name is required",
                "geom.required" => "Geometry is required",
                "image.mines" => "Image must be jpg, jpeg, png, tiff, gif and max 10mb",
                "image.max" => "Image must not exceed 10mb"
            ]
        );


        //dd($data); //untuk mengakhiri script setelahnya

        //create folder images
        if (!is_dir('storage/images')) {
            mkdir('storage/images', 0777);
        }

        //upload image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_polyline.' . $image->getClientOriginalExtension();
            $image->move('storage/images', $filename);
        } else {
            $filename = null;
        }

        $data = [
            "name" => $request->name,
            "description" => $request->description,
            "geom" => $request->geom,
            "image" => $filename
        ];

        //create point - ! berfungsi untuk mengembalikan sebagai error jika this->point->create gagal
        if (!$this->polyline->create($data)) {
            return redirect()->back()->with("error", "Failed to update polyline");
        }
        ;

        //redirect to map
        return redirect()->back()->with("success", "Polyline updated successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $polyline = $this->polyline->polyline($id);

        foreach ($polyline as $polyline) {
            $feature[] = [
                "type" => "Feature",
                "geometry" => json_decode($polyline->geom),
                "properties" => [
                    "id" => $polyline->id,
                    "name" => $polyline->name,
                    "description" => $polyline->description,
                    "image" => $polyline->image,
                    "created_at" => $polyline->created_at,
                    "updated_at" => $polyline->updated_at
                ]
            ];
        }

        return response()->json([
            "type" => "FeatureCollection",
            "features" => $feature,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $polyline = $this->polyline->find($id);

        $data = [
            "title" => "Edit Point",
            "polyline" => $polyline,
            "id" => $id,
        ];
        return view('edit-polyline', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //validate request
        $request->validate(
            [
                "name" => "required",
                "geom" => "required",
                "image" => "mimes:jpg,jpeg,png,tif,gif,|max:10000"
            ],
            [
                "name.required" => "Name is required",
                "geom.required" => "Geometry is required",
                "image.mimes" => "Image must be a file of type:jpg,jpeg,png,tif,gif",
                "image.max" => "Image must not exceed 10MB"
            ]
        );


        //create folder image
        if (!is_dir('storage/images')) {
            mkdir('storage/images', 0777);
        }

        //upload image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_polyline.' . $image->getClientOriginalExtension();
            $image->move('storage/images', $filename);

            //delete image
            $image_old = $request->image_old;
            if ($image_old != null) {
                unlink('storage/images/' . $image_old);
            }

        } else {
            $filename = $request->image_old;
        }

        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'geom' => $request->geom,
            'image' => $filename
        ];

        //update point
        if (!$this->polyline->find($id)->update($data)) {
            return redirect()->back()->with('error', 'Failed to update polyline');
        }

        //redirect to map
        return redirect()->back()->with('success', 'Polyline updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //get image
        $image = $this->polyline->find($id)->image;

        //delete image
        if ($image != null) {
            unlink('storage/images/' . $image);
        }

        //delete point
        if (!$this->polyline->destroy($id)) {
            return redirect()->back()->with("error", "Failed to delete polyline");
        }

        //redirect to map
        return redirect()->back()->with("success", "Polyline deleted successfully");
    }
    public function table()
    {
        $polylines = $this->polyline->polylines();

        $data = [
            "title" => "Table Polylines",
            "polylines" => $polylines
        ];

        return view('table-polyline', $data);
    }
}
