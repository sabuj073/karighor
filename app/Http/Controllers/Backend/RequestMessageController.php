<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\RequestMessage;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class RequestMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $activeRequirement = RequestMessage::where('status', 'publish')->paginate(10);

        if (request()->ajax()) {
            $status = $request->input('status');
            $data = RequestMessage::query();
            if ($status === 'trash') {
                $data->onlyTrashed();
            } else {
                $data->where('status', $status);
            }
            return DataTables::of($data)
                ->addColumn('action', function ($data) use ($status) {
                    if ($status === 'publish') {
                        return '<a href="' . route('backend.message.status', $data->id) . '"
                                    class="btn btn-sm btn-warning">Draft</a>
                                    <a href="' . route('backend.message.trash', $data->id) . '"
                                    class="btn btn-sm btn-danger">Trash</a>';
                        // Trashed property, show Restore and Delete buttons
                    } elseif ($status === 'draft') {
                        // Draft property, show Publish and Trash buttons
                        return '<a href="' . route('backend.message.status', $data->id) . '"
                                    class="btn ' . ($data->status == 'publish' ? 'btn-warning' : 'btn-success') . '">' . ($data->status == 'publish' ? 'Draft' : 'Publish') . '</a>
                                    <a href="' . route('backend.message.trash', $data->id) . '"
                                    class="btn btn-sm btn-danger">Trash</a>';
                    } else {

                        return '<a href="' . route('backend.message.reStore', $data->id) . '"
                            class="btn btn-sm btn-success">Restore</a>
                            <form action="' . route('backend.message.delete', $data->id) . '" method="POST" class="delete_form">
                                ' . csrf_field() . '
                                ' . method_field('DELETE') . '
                                <button type="submit" class="btn btn-sm btn-danger"  style="margin-top: 5px;" 
                                    onclick="return confirm(\'Are you Sure to Delete?\')">Delete</button>
                            </form>';
                    }
                })
                // ->orderBy('id', 'desc')
                ->rawColumns(['action'])
                ->make(true);
        }


        return view('backend.message.index', compact('activeRequirement'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(RequestMessage $requestMessage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RequestMessage $requestMessage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function destroy(RequestMessage $requestMessage)
    {
        $requestMessage->status == 'draft';
        $requestMessage->save();
        $requestMessage->delete();
        return back()->with('success', 'requestMessage Trashed');
    }
    public function status(RequestMessage $requestMessage)
    {
        if ($requestMessage->status == 'publish') {
            $requestMessage->status = 'draft';
            $requestMessage->save();
        } else {
            $requestMessage->status = 'publish';
            $requestMessage->save();
        }
        return back()->with('success', $requestMessage->status == 'publish' ? 'requestMessage type Published' : 'requestMessage Drafted');
    }
    public function reStore($id)
    {
        $terms = RequestMessage::onlyTrashed()->find($id);
        $terms->restore();
        return back()->with('success', 'RequestMessage Info Restored');
    }
    public function permDelete($id)
    {
        $terms = RequestMessage::onlyTrashed()->find($id);
        $terms->forceDelete();
        return back()->with('success', 'RequestMessage deleted');
    }
}