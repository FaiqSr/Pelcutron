<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use Illuminate\Http\Request;

class ToolsController extends Controller
{

    public function getToolsId(Request $request)
    {
        $request->only(['serial_id']);

        $toolsId = Alat::select('id')->where('serial_id', $request->serial_id)->first();

        if (!$toolsId) {
            return response()->json([
                'error' => 'Tools ID not found',
            ], 404);
        }

        return response()->json([
            'tools_id' => $toolsId['id'],
        ]);
    }
}
