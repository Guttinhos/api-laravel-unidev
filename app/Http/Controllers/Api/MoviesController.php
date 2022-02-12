<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movies;
use Exception;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\JsonResponse as HttpJsonResponse;
use Symfony\Component\HttpFoundation\JsonResponse;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Movies::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'nome' => 'required',
                'diretor' => 'required',
                'estudio' => 'required',
                'ano_de_lancamento' => 'required',
                'categorie_id' => 'required'
            ]);

            $movies = Movies::create($validated);
            return new JsonResponse(['success' => 'Filme registrado com sucesso!'], 201);
        } catch (Exception $e) {
            return new JsonResponse(['error' => $e->getMessage()], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $movie = Movies::find($id);

            if (is_null($movie)) throw new Exception('Filme não encontrado');

            return new JsonResponse($movie, 200);
        } catch(Exception $e) {
            return new JsonResponse(['error' => $e->getMessage()], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $validated = $request->validate([
                'nome' => 'required',
                'diretor' => 'required',
                'estudio' => 'required',
                'ano_de_lancamento' => 'required',
                'categorie_id' => 'required'
            ]);

            $movieExists = Movies::find($id);

            if (is_null($movieExists)) throw new Exception('Filme não encontrado');

            $movieExists->update($validated);

            return new JsonResponse(['success' => 'Filme Editado com Sucesso']);
        } catch (Exception $e) {
            return new JsonResponse(['error' => $e->getMessage()], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            if (!Movies::destroy($id))
                throw new Exception('Falha ao remover o seu filme, por favor tente novamente!');

            return new JsonResponse(['success' => 'Filme removido com sucesso'], 200);
        } catch(Exception $e) {
            return new JsonResponse(['error' => $e->getMessage()], 500);
        }
    }
}
