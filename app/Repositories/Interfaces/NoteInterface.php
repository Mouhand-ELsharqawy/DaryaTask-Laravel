<?php

namespace App\Repositories\Interfaces;

use App\Http\Requests\NoteRequest;
use Illuminate\Http\Request;

interface NoteInterface {
    public function getall(Request $request);
    public function create(NoteRequest $request);
    public function getone(Request $request,string $id);
    public function update(NoteRequest $request, string $id);
    public function delete(Request $request ,string $id);
}