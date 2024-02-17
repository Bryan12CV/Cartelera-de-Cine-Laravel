<?php

namespace App\Http\Controllers;

use App\Models\Tbl_ope_pelicula;
use Illuminate\Http\Request;

class TblOpePeliculaController extends Controller
{

    public function index()
    {
        //pagina de inicio
        //$ejm = "autodidacta";
        //$datos = Tbl_ope_peliculas::all();
        //return view('welcome',compact('datos'));
        
        return view('welcome');
    }

    public function create()
    {
        // formulario
    }

    public function store(Request $request)
    {
        //srive para guradar datos en la bd
        //print_r($_POST);
        $movieName = $request->post('movieName');
        $moviePrecio = $request->post('moviePrecio');
        $cantidad = $request->post('cantidad');
        $pago = $request->post('pago');
        $activo = $request->post('activo');

        $pelicula = new Tbl_ope_pelicula(); // Reemplaza 'NombreDelModelo' con el nombre real de tu modelo
    
    // Asignar los valores de la solicitud a los atributos del modelo
    $pelicula->Pelicula_Nombre = $movieName;
    $pelicula->Pelicula_Precio = $moviePrecio;
    $pelicula->Pelicula_Entradas = $cantidad;
    $pelicula->Pelicula_Total = $pago;
    $pelicula->Pelicula_Activo = $activo;
    
    // Guardar la instancia en la base de datos
    $pelicula->save();

        return redirect()->route('pelicula.index')->with('success','¡Agregado con exito!');
    }

    public function show(Tbl_ope_pelicula $tbl_ope_pelicula)
    {
        //registro de la tabla
    }

    public function edit(Tbl_ope_pelicula $tbl_ope_pelicula)
    {
        //trae la info a un formulario
    }

    public function update(Request $request, Tbl_ope_pelicula $tbl_ope_pelicula)
    {
        //actualiza los datos en la bd
    }

    public function destroy(Tbl_ope_pelicula $tbl_ope_pelicula)
    {
        //elimina un registro
    }
}
