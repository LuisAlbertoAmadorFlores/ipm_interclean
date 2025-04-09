<?php

use App\Exports\NominaExport;
use App\Http\Controllers\BackupController;
use App\Http\Controllers\ColaboradorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Livewire\Colaborador\Colaboradores;
use App\Http\Controllers\ComprasController;
use App\Http\Livewire\Eliminar\Colaborador;
use App\Http\Livewire\Incidencia\Consultarincidencia;
use App\Http\Livewire\Juridico\Documentos;
use App\Http\Livewire\Colaborador\InsertarColaborador;
use App\Http\Livewire\Prospectos\Prospecto;
use App\Http\Livewire\Prospectos\Allprospect;
use App\Http\Controllers\password;
use App\Http\Controllers\EvaluacionesController;
use App\Http\Controllers\CedisController;
use App\Models\NominaModel;
use App\Http\Controllers\TimbradoController;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\ManageNominaController;
use App\Http\Controllers\PersonalActivoController;
use Illuminate\Auth\Events\Verified;
use Illuminate\Auth\Notifications\VerifyEmail;
use App\Http\Controllers\historialBajaController;
use App\Mail\VerificacionCorreoColaborador;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/shared/{id}', [ColaboradorController::class, 'generatePDF']);

    Route::get('/', [HomeController::class, 'index']);

    //Livewire route
    Route::get('/nuevocolaborator/', InsertarColaborador::class)->name('nuevo-registro');
    Route::get('/colaborador/', Colaboradores::class)->name('consultaColaborador');
    Route::get('/deletePeople/', Colaborador::class)->name('deletePeople');
    Route::get('/incidencias/', Consultarincidencia::class)->name('incidencias');
    Route::get('/documentos/', Documentos::class)->name('revision');
    Route::get('/fichatecnica/{id}', [ColaboradorController::class, 'generatePDF'])->name('ficha');
    Route::get('/prospecto/', Prospecto::class)->name('prospecto');
    Route::get('/allprospect/', Allprospect::class)->name('allprospect');
    Route::get('/uploadfiles/', Documentos::class)->name('upload-files');
    Route::get('/fichatecnica/Incidencia/download/{idColaborador}/{idInicedencia}', [ColaboradorController::class, 'descargarEvidencia']);

    //Rutas de Evaluaciones
    Route::get('evaluaciones', [EvaluacionesController::class, 'index'])->name('evaluaciones');
    Route::get('evaluacionbycolaborador', [EvaluacionesController::class, 'show'])->name('evaluacionColaborador');
    Route::post('createevaluacion', [EvaluacionesController::class, 'create'])->name('createEvaluacion');
    Route::get('editevaluacion', [EvaluacionesController::class, 'edit'])->name('editEvaluacion');
    Route::post('updateevaluacion', [EvaluacionesController::class, 'update'])->name('updateEvaluacion');
    Route::post('deleteEvaluacion', [EvaluacionesController::class, 'delete'])->name('deleteEvaluacion');


    Route::get('asesorias', function () {
        return view('livewire.juridico.asesorias.turnadas');
    })->name('asesorias-juridico');

    Route::get('atencionColaborador', function () {
        return view('livewire.contactcenter.atc.template');
    })->name('atencionAlColaborador');

    Route::get('dashboard', function () {
        return view('livewire.contactcenter.dashboard-reporteador');
    })->name('dashboard_reporteador');

    Route::get('training', function () {
        return view('livewire.contactcenter.capacitacion.template');
    })->name('training');

    Route::get('material', function () {
        return view('livewire.contactcenter.material');
    })->name('material');


    //Administrativos
    Route::get('colaboradoresturnados', function () {
        return view('livewire.juridico.turnadas');
    })->name('turnados');

    Route::get('bajas-historico', [historialBajaController::class, 'index'])->name('historialbajas');
    Route::get('misbajas', function () {
        return view('livewire.juridico.misbajas');
    })->name('misbajas');

    //Administrativos
    Route::get('/pagosExtras', function () {
        return view('livewire.administrativo.pagosextras.extras');
    })->name('pagosExtras');

    Route::get('lista', function () {
        return view('livewire.administrativo.lista');
    })->name('crearlista');

    Route::get('/files/', function () {
        return view('livewire.documentos.viewdocumento');
    })->name('files');

    Route::get('/descuento/', function () {
        return view('livewire.administrativo.agregardescuento');
    })->name('descuentos');

    //Contabilidad
    Route::get('imss', function () {
        return view('livewire.contabilidad.bajas');
    })->name('bajasimss');

    Route::get('prenomina', function () {
        return view('livewire.contabilidad.nomina.prenomina');
    })->name('prenomina');

    Route::get('nomina', function () {
        return view('livewire.contabilidad.nomina.nomina');
    })->name('nomina');

    Route::get('excel/{nombre}', [ManageNominaController::class, 'getExcel']);
    Route::get('/excel/{inicial}/{final}/', function () {
        return Excel::download(new NominaExport, 'nomina.xlsx');
    })->name('excel');

    Route::get('/download/{nombre}', [ManageNominaController::class, 'getComprobante']);

    Route::get('/timbrado/', function () {
        return view('livewire.contabilidad.timbrado.obtenertimbrado');
    })->name('getTimbrado');

    Route::get('/timbrado/{id}', [TimbradoController::class, 'exporttimbrado'])->name('timbradoexcel');
    // Route::get('/sua/{id}', [SuaController::class, 'exportsua'])->name('suaexcel');
    Route::get('/personal/{id}/{tipo}', [PersonalActivoController::class, 'exportPersonal']);

    //Calculo de Nomina con excel
    Route::get('/nomina/{proyecto}/{region}/{cedis}/{nomina}/{fechaini}/{fechafin}', [ManageNominaController::class, 'getSheets']);

    //CEDIS
    //CEDIS
    Route::get('/cedis/', function () {
        return view('livewire.cedis.cedis');
    })->name('cedis');

    Route::get('/cedis/incidencia', function () {
        return view('livewire.cedis.incidencias');
    })->name('cedis-incidencia');

    Route::post('/registro/', [CedisController::class, 'store'])->name('cedis-create');

    //Sistemas
    Route::get('/sistemas/', function () {
        return view('livewire.sistemas.accounts');
    })->name('viewacounts');

    Route::get('/gestioncuentas/', function () {
        return view('livewire.sistemas.allaccounts');
    })->name('allacounts');

    Route::get('/createaccounts/', function () {
        return view('livewire.sistemas.create');
    })->name('createacount');

    Route::post('/update-password/', [password::class, 'update'])->name('update-password');

    Route::get('link', function () {
        Artisan::call('storage:link');
    });

    Route::get('/backup-documents', [BackupController::class, 'index']);

    Route::get('/contratos', function () {
        return view('livewire.contactcenter.contratos.template');
    })->name('nuevosingresos');

    //Correos Envios
    // Route::get('/verificacion-email',function(){
    //     $name= "Bet";
    //     Mail::to('alvertokarlos@gmail.com')->send(new VerificacionCorreoColaborador($name));
    // })->name('validacionCorreo');
    //Compras
    Route::get('/allMyOrder', [ComprasController::class, 'index'])->name('viewallOrder');
    Route::get('/getMyOrder/{id}', [ComprasController::class, 'show'])->name('viewMyOrder');
    Route::post('/createOrder', [ComprasController::class, 'create'])->name('createOrder');
    Route::get('/editOder', [ComprasController::class, 'edit'])->name('editOrder');
    Route::put('/updateOrder', [ComprasController::class, 'update'])->name('updateOrder');
    Route::delete('/deleteOrder', [ComprasController::class, 'destroy'])->name('deleteOrder');
    Route::get('/newOrder', [ComprasController::class, 'newOrder'])->name('newOrder');
    Route::get('/allOrder', [ComprasController::class, 'indexContabilidad'])->name('allOrder');

    Route::get('/generar-estatus/{codigo}', [ComprasController::class, 'generateEstatus']);
});

Route::get('/manual/', function () {
    return response()->download('prosman_intranet.pdf');
})->name('manual');

Route::get('/clear', function () {
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('route:cache');
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('view:cache');
    $exitCode = Artisan::call('optimize:clear');
});
