<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blogs;

class adminController extends Controller
{
    //
    function list(Request $perpage) {
        return Blogs::paginate($perpage ?? 10);
    }
    
    function create(Request $data) {
        return Blogs::create();
    }

    
    function update(Request $request, $id) {
        $blog = Blogs::findOrFail($id);

        $blog->update($request->all());

        return $blog;
    }
}
