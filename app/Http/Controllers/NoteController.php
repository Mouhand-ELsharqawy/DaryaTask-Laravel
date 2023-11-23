<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoteRequest;
use App\Repositories\Interfaces\NoteInterface;
use App\Traits\GeneralTrait;
use Exception;
use Illuminate\Http\Request;


/**
 * @OA\Tag(
 *     name="user",
 *     description="User related operations"
 * )
 * @OA\Info(
 *     version="1.0",
 *     title="Example API",
 *     description="Example info",
 *     @OA\Contact(name="Swagger API Team")
 * )
 * @OA\Server(
 *     url="https://example.localhost",
 *     description="API server"
 * )
 */



class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */


     use GeneralTrait;

    private NoteInterface $noteinterface;

    public function __construct(NoteInterface $noteInterface)
    {
        $this->noteinterface = $noteInterface;
    }


    /**
 * @OA\Get(
 *     path="/api/note",
 *     tags={"Note"},
 *     summary="Get all notes",
 *     description="Get all notes from the database",
 *     security={{"bearerAuth": {}}},
 *     @OA\Response(
 *         response=200,
 *         description="Successful operation"
 *     ),
 *     @OA\Response(
 *         response=401,
 *         description="Unauthenticated"
 *     )
 * )
 */



    public function index(Request $request)
    {
        try{


            $notes = $this->noteinterface->getall($request);
            return $this->getData('Notes', $notes);


        }catch(Exception $e){


            $this->getError($e->getCode(), $e->getMessage());


        }
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


     /**
     * @OA\Post(
     *     path="/api/note",
     *     tags={"Note"},
     *     summary="Create a new note",
     *     description="Create a new note in the database",
     *     security={{"bearerAuth": {}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="title", type="string", maxLength=255, description="The title of the note"),
     *             @OA\Property(property="content", type="string", minLength=10, description="The content of the note")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Note created successfully"
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthenticated"
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error"
     *     )
     * )
     */
    public function store(NoteRequest $request)
    {
        try{

            $note = $this->noteinterface->create($request);
            return $this->getData('Note', $note);


        }catch(Exception $e){


            $this->getError($e->getCode(), $e->getMessage());


        }
    }

    /**
     * Display the specified resource.
     */



    /**
     * @OA\Get(
     *     path="/api/note/{id}",
     *     tags={"Note"},
     *     summary="Get a specific note",
     *     description="Get a specific note from the database by ID",
     *     security={{"bearerAuth": {}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID of the note",
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             @OA\Property(property="id", type="integer"),
     *             @OA\Property(property="title", type="string"),
     *             @OA\Property(property="content", type="string")
     *         )
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthenticated"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Note not found"
     *     )
     * )
     */


    public function show(Request $request,string $id)
    {
        try{


            $note = $this->noteinterface->getone($request,$id);
            return $this->getData('Note', $note);

        }catch(Exception $e){

            $this->getError($e->getCode(), $e->getMessage());

        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */




    /**
     * @OA\Put(
     *     path="/api/note/{id}",
     *     tags={"Note"},
     *     summary="Update a specific note",
     *     description="Update a specific note in the database by ID",
     *     security={{"bearerAuth": {}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID of the note",
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="title", type="string", maxLength=255, description="The title of the note"),
     *             @OA\Property(property="content", type="string", minLength=10, description="The content of the note")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Note updated successfully"
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthenticated"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Note not found"
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error"
     *     )
     * )
     */


    public function update(NoteRequest $request, string $id)
    {
        try{

            $note = $this->noteinterface->update($request,$id);
            return $this->getData('Note', $note);


        }catch(Exception $e){

            $this->getError($e->getCode(), $e->getMessage());


        }
    }

    /**
     * Remove the specified resource from storage.
     */



    /**
     * @OA\Delete(
     *     path="/api/note/{id}",
     *     tags={"Note"},
     *     summary="Delete a specific note",
     *     description="Delete a specific note from the database by ID",
     *     security={{"bearerAuth": {}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID of the note",
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Note deleted successfully"
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthenticated"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Note not found"
     *     )
     * )
     */

    public function destroy(Request $request,string $id)
    {
        try{

            $this->noteinterface->delete($request,$id);
            return $this->deleteData();

            
        }catch(Exception $e){

            $this->getError($e->getCode(), $e->getMessage());
            
        }
    }
}
