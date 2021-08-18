<?php

namespace App\Http\Controllers;

use App\model\Penyuluhan;
use Illuminate\Http\Request;

class PenyuluhanController extends Controller
{
    public function index()
    {
        $penyuluhan = Penyuluhan::all();
        return view('admin/content/penyuluhan/index', compact('penyuluhan'));
    }

    public function tambahPenyuluhan(Request $request)
    {
        $messages = [
            'required' => ':attribute wajib diisi !!!',
            'min' => ':attribute harus diisi minimal :min  karakter ya !!!',
            'max' => ':attribute harus diisi maksimal :max karakter ya !!!',
        ];

        $request->validate([
            'kegiatan' => 'required|min:10',
            'tempat' => 'required|min:3',
            'hari' => 'required',
            'tanggal' => 'required',
            'jam' => 'required',
            'pemateri' => 'required|min:3',
            'peserta' => 'required|min:3',
            'komoditas' => 'required',
            'deskripsi' => 'required|min:10',
            'status' => 'required',
            'image' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
        ], $messages);

        // menyimpan data file yang diupload ke variabel $gambar
        $image = $request->file('image');
        $nama_image = time() . "_" . $image->getClientOriginalName();
        $destinationPath = 'berkasPenyuluhan';
        $image->move($destinationPath, $nama_image);
        Penyuluhan::create([
            'kegiatan' => $request->kegiatan,
            'tempat' => $request->tempat,
            'hari' => $request->hari,
            'tanggal' => $request->tanggal,
            'jam' => $request->jam,
            'pemateri' => $request->pemateri,
            'peserta' => $request->peserta,
            'komoditas' => $request->komoditas,
            'deskripsi' => $request->deskripsi,
            'status' => $request->status,
            'image' => $nama_image,
        ]);
        return redirect('admin/showPenyuluhan')->with('alert', 'Data Penyuluhan Berhasil ditambah');
    }

    public function hapusPenyuluhan(Penyuluhan $penyuluhan)
    {
        Penyuluhan::destroy($penyuluhan->id_penyuluhan);
        return redirect('admin/showPenyuluhan')->with('alertF', 'Data Penyuluhan Berhasil dihapus');
    }

    public function showDetailPenyuluhan(Penyuluhan $penyuluhan)
    {
        return view('admin/content/penyuluhan/showDetail', compact('penyuluhan'));
    }

    public function viewDetailPenyuluhan(Penyuluhan $penyuluhan)
    {
        return view('admin/content/penyuluhan/viewDetail', compact('penyuluhan'));
    }

    public function postUpdatePenyuluhan(Request $request, $id_penyuluhan)
    {
        $messages = [
            'required' => ':attribute wajib diisi !!!',
            'min' => ':attribute harus diisi minimal :min  karakter ya !!!',
            'max' => ':attribute harus diisi maksimal :max karakter ya !!!',
        ];

        $request->validate([
            'kegiatan' => 'required|min:10',
            'tempat' => 'required|min:3',
            'hari' => 'required',
            'tanggal' => 'required',
            'jam' => 'required',
            'pemateri' => 'required|min:3',
            'peserta' => 'required|min:3',
            'komoditas' => 'required',
            'deskripsi' => 'required|min:10',
            'status' => 'required',
        ], $messages);

        $update = [
            'kegiatan' => $request->kegiatan,
            'tempat' => $request->tempat,
            'hari' => $request->hari,
            'tanggal' => $request->tanggal,
            'jam' => $request->jam,
            'pemateri' => $request->pemateri,
            'peserta' => $request->peserta,
            'komoditas' => $request->komoditas,
            'deskripsi' => $request->deskripsi,
            'status' => $request->status,
        ];


        if ($imagee = $request->file('image')) {
            $destinationPath = 'berkasPenyuluhan'; // upload path
            $nama_image = date('YmdHis') . "." . $imagee->getClientOriginalExtension();
            $imagee->move($destinationPath, $nama_image);
            $update['image'] = "$nama_image";
        }

        $update['kegiatan'] = $request->get('kegiatan');
        $update['tempat'] = $request->get('tempat');
        $update['hari'] = $request->get('hari');
        $update['tanggal'] = $request->get('tanggal');
        $update['jam'] = $request->get('jam');
        $update['pemateri'] = $request->get('pemateri');
        $update['peserta'] = $request->get('peserta');
        $update['komoditas'] = $request->get('komoditas');
        $update['deskripsi'] = $request->get('deskripsi');
        $update['status'] = $request->get('status');
        Penyuluhan::where('id_penyuluhan', $id_penyuluhan)->update($update);
        return redirect('admin/showPenyuluhan')->with('alert', 'Data Penyuluhan Berhasil diperbarui');
    }
}
