<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateQrcodeRequest;
use App\Http\Requests\UpdateQrcodeRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\QrcodeRepository;
use Illuminate\Http\Request;
use Flash;

class QrcodeController extends AppBaseController
{
    /** @var QrcodeRepository $qrcodeRepository*/
    private $qrcodeRepository;

    public function __construct(QrcodeRepository $qrcodeRepo)
    {
        $this->qrcodeRepository = $qrcodeRepo;
    }

    /**
     * Display a listing of the Qrcode.
     */
    public function index(Request $request)
    {
        $qrcodes = $this->qrcodeRepository->paginate(10);

        return view('qrcodes.index')
            ->with('qrcodes', $qrcodes);
    }

    /**
     * Show the form for creating a new Qrcode.
     */
    public function create()
    {
        return view('qrcodes.create');
    }

    /**
     * Store a newly created Qrcode in storage.
     */
    public function store(CreateQrcodeRequest $request)
    {
        $input = $request->all();

        // Agregar a nuestra base de datos
        $qrcode = $this->qrcodeRepository->create($input);

        //Incluir la imagen del producto
        $this-> imagenProducto($qrcode,$request);
        
        /*
        GUARDAR CODIGO QR
        */

        //generar qrcode
        //guardar en nuestro folder
        $file = 'generated_qrcodes/'.$qrcode->id.'.png'; 

        //generar y descargar el QR, de momento con el id
        $chs = "150x150";
        $cht="qr";
        $chl= $qrcode->id; // se genera el qr con el id
        $choe="UTF-8";
        $url = "https://chart.googleapis.com/chart?chs={$chs}&cht={$cht}&chl={$chl}";
        if (file_put_contents($file, file_get_contents($url)))
        {
            echo "File downloaded successfully";
        }
        else
        {
            echo "File downloading failed.";
        }
        
        // se llama al metodo nuevo que actualiza la BD

        $qrcode->update(['qrcode_path' =>  $file]);

        Flash::success('Qrcode creado successfully.'  );

        // se muestra la tabla actualizada
        return redirect(route('qrcodes.show', ['qrcode' => $qrcode]));
        
    }

    /**
     * Display the specified Qrcode.
     */
    public function show($id)
    {
        $qrcode = $this->qrcodeRepository->find($id);

        if (empty($qrcode)) {
            Flash::error('Qrcode not found');

            return redirect(route('qrcodes.index'));
        }

        return view('qrcodes.show')->with('qrcode', $qrcode);
    }

    /**
     * Show the form for editing the specified Qrcode.
     */
    public function edit($id)
    {
        $qrcode = $this->qrcodeRepository->find($id);
        

        if (empty($qrcode)) {
            Flash::error('Qrcode not found');

            return redirect(route('qrcodes.index'));
        }

        return view('qrcodes.edit')->with('qrcode', $qrcode);
    }

    /**
     * Update the specified Qrcode in storage.
     */
    public function update($id,UpdateQrcodeRequest $request)
    {
        
        $r = $request;
        $qrcode = $this->qrcodeRepository->find($id);
        
        if (empty($qrcode)) {
            Flash::error('Qrcode not found');

            return redirect(route('qrcodes.index'));
        }

        $qrcode = $this->qrcodeRepository->update($request->all(), $id);

        //Actualizar la imagen del producto
        $this-> imagenProducto($qrcode,$request);
       

        Flash::success('Qrcode updated successfully.');

        return redirect(route('qrcodes.index'));
    }


    public function imagenProducto($qrcode,$request){
        // Obtener el archivo cargado desde el formulario
        if ($request->hasFile('image_path')) {

            $archivo = $request->file('image_path');

            // Generar un nombre único para el archivo
            

            $nombreOriginal =  $archivo->getClientOriginalName();
            $extensionOriginal = $archivo->getClientOriginalExtension();
            $id_usuario= $qrcode->id;
            $id_producto = uniqid() ;
            $fileName = "{$id_usuario}_{$id_producto }_{$nombreOriginal}";

            $archivo->move(public_path('selected_product_Images'), $fileName);

            $qrcode->update(['image_path' => 'selected_product_Images/' . $fileName]);
           
        }
    }

    /**
     * Remove the specified Qrcode from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $qrcode = $this->qrcodeRepository->find($id);

        if (empty($qrcode)) {
            Flash::error('Qrcode not found');

            return redirect(route('qrcodes.index'));
        }

        $this->qrcodeRepository->delete($id);

        Flash::success('Qrcode deleted successfully.');

        return redirect(route('qrcodes.index'));
    }
}
