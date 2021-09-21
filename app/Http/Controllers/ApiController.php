<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use App\Models\Llibre;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(title="API Biblioteca", version="1.0")
 *
 * @OA\Server(url="http://localhost/M7_M14/laravel/pt2a/public")
 */
class ApiController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @OA\Get(
     *   path="/api/llibres",
     *   tags={"llibres"},
     *   summary="Veure tots els llibres.",
     *   @OA\Response(
     *     response=200,
     *     description="Retorna tots els llibres.",
     *   ),
     *   @OA\Response(
     *     response="default",
     *     description="S'ha produit un error.",
     *   )
     * )
     */
    public function getLlibres()
    {
        return Llibre::all();
    }

    /**
     * @OA\Get(
     *   path="/api/autors",
     *   tags={"autors"},
     *   summary="Veure tots els autors.",
     *   @OA\Response(
     *     response=200,
     *     description="Retorna tots els autors.",
     *   ),
     *   @OA\Response(
     *     response="default",
     *     description="S'ha produit un error.",
     *   )
     * )
     */
    public function getAutors()
    {
        return Autor::all();
    }

    /**
     * @OA\Get(
     *   path="/api/llibre/{id}",
     *   tags={"llibres"},
     *   summary="Veure un llibre concret.",
     *   @OA\Parameter(
     *     name="id",
     *     description="id del llibre",
     *     required=true,
     *     in="path",
     *     @OA\Schema(
     *       type="integer"
     *     )
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="Retorna un llibre concret.",
     *   ),
     *   @OA\Response(
     *     response="default",
     *     description="S'ha produit un error.",
     *   )
     * )
     */
    public function getLlibre($id)
    {
        $llibre = Llibre::find($id);

        return $llibre;
    }

    /**
     * @OA\Get(
     *   path="/api/autor/{id}",
     *   tags={"autors"},
     *   summary="Veure un autor concret.",
     *   @OA\Parameter(
     *     name="id",
     *     description="id de l'autor",
     *     required=true,
     *     in="path",
     *     @OA\Schema(
     *       type="integer"
     *     )
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="Retorna un autor concret.",
     *   ),
     *   @OA\Response(
     *     response="default",
     *     description="S'ha produit un error.",
     *   )
     * )
     */
    public function getAutor($id)
    {
        $autor = Autor::find($id);

        return $autor;
    }

    /**
     * @OA\Post(
     *   path="/api/autor",
     *   tags={"autors"},
     *   summary="Inserir un nou autor.",
     *   @OA\Parameter(
     *     name="nom",
     *     description="nom de l'autor",
     *     required=true,
     *     in="query",
     *     @OA\Schema(
     *       type="string"
     *     )
     *   ),
     *   @OA\Parameter(
     *     name="cognoms",
     *     description="cognoms de l'autor",
     *     required=true,
     *     in="query",
     *     @OA\Schema(
     *       type="string"
     *     )
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="Retorna l'autor que hem inserit.",
     *   ),
     *   @OA\Response(
     *     response="default",
     *     description="S'ha produit un error.",
     *   )
     * )
     */
    public function insertAutor(Request $request)
    {
        $autor = new Autor();

        $autor->nom = $request->nom;
        $autor->cognoms = $request->cognoms;

        $autor->save();

        return $autor;
    }

    /**
     * @OA\Post(
     *   path="/api/llibre",
     *   tags={"llibres"},
     *   summary="Inserir un nou llibre.",
     *   @OA\Parameter(
     *     name="titol",
     *     description="titol del llibre",
     *     required=true,
     *     in="query",
     *     @OA\Schema(
     *       type="string"
     *     )
     *   ),
     *   @OA\Parameter(
     *     name="data_public",
     *     description="data de publicació del llibre",
     *     required=true,
     *     in="query",
     *     @OA\Schema(
     *       type="string"
     *     )
     *   ),
     *   @OA\Parameter(
     *     name="autor_id",
     *     description="id de l'autor del llibre",
     *     required=true,
     *     in="query",
     *     @OA\Schema(
     *       type="integer"
     *     )
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="Retorna el llibre que hem inserit.",
     *   ),
     *   @OA\Response(
     *     response="default",
     *     description="S'ha produit un error.",
     *   )
     * )
     */
    public function insertLlibre(Request $request)
    {
        $llibre = new Llibre();

        $llibre->titol = $request->titol;
        $llibre->data_public = $request->data_public;
        $llibre->autor_id = $request->autor_id;

        $llibre->save();

        return $llibre;
    }

    /**
     * @OA\Put(
     *   path="/api/llibre/{id}",
     *   tags={"llibres"},
     *   summary="Editar un llibre concret.",
     *   @OA\Parameter(
     *     name="id",
     *     description="id del llibre a editar",
     *     required=true,
     *     in="path",
     *     @OA\Schema(
     *       type="integer"
     *     )
     *   ),
     *   @OA\Parameter(
     *     name="titol",
     *     description="nou titol del llibre",
     *     required=false,
     *     in="query",
     *     @OA\Schema(
     *       type="string"
     *     )
     *   ),
     *   @OA\Parameter(
     *     name="data_public",
     *     description="nova data de publicació del llibre",
     *     required=false,
     *     in="query",
     *     @OA\Schema(
     *       type="string"
     *     )
     *   ),
     *   @OA\Parameter(
     *     name="autor_id",
     *     description="nou id de l'autor del llibre",
     *     required=false,
     *     in="query",
     *     @OA\Schema(
     *       type="integer"
     *     )
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="Retorna el llibre que hem editat.",
     *   ),
     *   @OA\Response(
     *     response="default",
     *     description="S'ha produit un error.",
     *   )
     * )
     */
    public function updateLlibre(Request $request, $id)
    {
        //cal posar en la peticio PUT el Header field:
        //Content-Type = application/x-www-form-urlencoded
        $llibre = Llibre::find($id);
        $llibre->update($request->all());

        return $llibre;
    }

    /**
     * @OA\Delete(
     *   path="/api/llibre/{id}",
     *   tags={"llibres"},
     *   summary="Eliminar un llibre concret.",
     *   @OA\Parameter(
     *     name="id",
     *     description="id del llibre",
     *     required=true,
     *     in="path",
     *     @OA\Schema(
     *       type="integer"
     *     )
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="S'ha eliminat el llibre correctament.",
     *   ),
     *   @OA\Response(
     *     response="default",
     *     description="S'ha produit un error.",
     *   )
     * )
     */
    public function deleteLlibre($id)
    {
        $llibre = Llibre::find($id);
        $llibre->delete();
    }

}
