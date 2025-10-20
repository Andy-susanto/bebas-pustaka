<?php

namespace App\Http\Controllers\Depan;

use App\Http\Controllers\Controller;
use App\Models\Bebaspustaka;
use App\Models\Bebaspustakafile;
use App\Models\Mahasiswa;
use App\Models\Mahasiswafoto;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class MhsController extends Controller
{
    public function index() {}

    public function profilsaya()
    {
        $idmhs = Auth::guard('mahasiswa')->user()->id;
        $mhs = Mahasiswa::find($idmhs);
        $foto = Mahasiswafoto::where('mahasiswa_id', $idmhs)->get()->first();
        $prodi = Prodi::find($mhs->prodi_id);

        $data = [
            'mahasiswa' => $mhs,
            'foto' => $foto,
            'prodi' => $prodi
        ];

        return view('depan.profilsaya.profilsaya', $data);
    }

    public function ubahprofilsaya()
    {
        $idmhs = Auth::guard('mahasiswa')->user()->id;
        $mhs = Mahasiswa::find($idmhs);
        $foto = Mahasiswafoto::where('mahasiswa_id', $idmhs)->get()->first();

        $data = [
            'mahasiswa' => $mhs,
            'foto' => $foto,
            'prodi' => Prodi::pluck('nama', 'id')
        ];

        return view('depan.profilsaya.updateprofil', $data);
    }

    public function ubahprofilsayasave(Request $request)
    {
        $idmhs = Auth::guard('mahasiswa')->user()->id;
        $mhs = Mahasiswa::find($idmhs);
        $mhs->fill($request->all());
        $mhs->save();

        return redirect()->route('mahasiswa.profilsaya')->with('success', "Berhasil ubah data profil saya");
    }

    public function formgantipassword()
    {
        $data = [];

        return view('depan.gantipassword.gantipassword', $data);
    }

    public function gantipasswordproses(Request $request)
    {
        $idmhs = Auth::guard('mahasiswa')->user()->id;
        $plama = $request->plama;
        $pbaru = $request->pbaru;

        $mhs = Mahasiswa::find($idmhs);
        $cek = Hash::check($plama, $mhs->password);
        if ($cek) {
            $mhs->password = Hash::make($pbaru);
            $mhs->save();
            return redirect()
                ->route('mahasiswa.gantipassword.form')
                ->with('success', "Berhasil ganti password");
        } else {
            return redirect()
                ->route('mahasiswa.gantipassword.form')
                ->with('danger', "Gagal ganti password, password lama anda salah");
        }
    }

    public function formbebaspustaka(Request $request)
    {
        $mahasiswa = Auth::guard('mahasiswa')->user();
        $bebaspustaka = new Bebaspustaka();
        $bebaspustakafile = new Bebaspustakafile();

        $cek = Bebaspustaka::where('mahasiswa_id', $mahasiswa->id)->get();
        if ($cek->count()) {
            $idbebaspustaka = $cek->first()->id;
            $bebaspustaka =  Bebaspustaka::find($idbebaspustaka);
            $bebaspustakafile = Bebaspustakafile::where('bebaspustaka_id', $idbebaspustaka)->get()->first();
        }

        $data = [
            'mahasiswa' => $mahasiswa,
            'listsemester' => \Info::listsemester(),
            'bebaspustaka' => $bebaspustaka,
            'ketkartuanggota' => $bebaspustakafile->ketkartuanggota,
            'ketfileskripsi' => $bebaspustakafile->ketfileskripsi,
        ];

        return view('depan.bebaspustaka.form', $data);
    }

    public function prosesbebaspustaka(Request $request)
    {
        $mahasiswa = Auth::guard('mahasiswa')->user();

        $cek = Bebaspustaka::where('mahasiswa_id', $mahasiswa->id)->get();

        if ($cek->count()) {
            $idbebaspustaka = $cek->first()->id;

            $request->validate(
                [
                    'semester' => 'required',
                    'punyakartuperpus' => 'required',
                    'nokartu' => 'required|unique:bebaspustaka,nokartu,' . $idbebaspustaka,
                    'tanggalsurat' => 'required',
                ],
                [
                    'semester.required' => 'Semester harus diisi',
                    'punyakartuperpus.required' => 'Punya Kartu Perpustakaan harus diisi',
                    'nokartu.required' => 'No Kartu harus diisi',
                    'nokartu.unique' => 'No Kartu sudah ada di sistem kami',
                    'tanggalsurat.required' => 'Tanggal Surat harus diisi',
                ]
            );

            if ($request->file('filekartuanggota')) {
                $request->validate(
                    [
                        'filekartuanggota' => 'required|file|mimes:jpeg,jpg,png|max:1024',
                    ],
                    [
                        'filekartuanggota.required' => 'Kartu Anggota Harus diupload',
                        'filekartuanggota.max' => 'Ukuran maksimal 1 Mb',
                        'filekartuanggota.mimes' => 'Tipe yang di izinkan jpeg,jpg,png',
                    ]
                );
            }

            if ($request->file('fileskripsi')) {
                $request->validate(
                    [
                        'fileskripsi' => 'required|file|mimes:pdf|max:5120',
                    ],
                    [

                        'fileskripsi.required' => 'File Skripsi Harus diupload',
                        'fileskripsi.max' => 'Ukuran maksimal 5 Mb',
                        'fileskripsi.mimes' => 'Tipe yang di izinkan pdf',
                    ]
                );
            }

            $semester = $request->semester;
            $punyakartuperpus = $request->punyakartuperpus;
            $nokartu = $request->nokartu;
            $tanggalsurat = $request->tanggalsurat;

            $semester = $request->semester;
            $punyakartuperpus = $request->punyakartuperpus;
            $nokartu = $request->nokartu;
            $tanggalsurat = $request->tanggalsurat;

            Bebaspustaka::find($idbebaspustaka)->update([
                'mahasiswa_id' => $mahasiswa->id,
                'semester' => $semester,
                'punyakartuperpus' => $punyakartuperpus,
                'nokartu' => $nokartu,
                'tanggalsurat' => $tanggalsurat,
            ]);

            $bebaspustakafile = Bebaspustakafile::where('bebaspustaka_id', $idbebaspustaka)->get()->first();

            $updatebebabaspustaka = Bebaspustakafile::find($bebaspustakafile->id);
            if ($request->file('filekartuanggota')) {
                $filekartuanggota = $request->file('filekartuanggota');
                $mhs = time() . '_' . $mahasiswa->nim . '_' . Str::of($mahasiswa->nama)->replace(' ', '_');
                $namakartuanggota = $mhs . '.' . $filekartuanggota->getClientOriginalExtension();
                $kartuanggota = $filekartuanggota->storeAs('kartuanggota', $namakartuanggota, 'public');

                try {
                    Storage::disk('public')->delete($bebaspustakafile->kartuanggota);
                } catch (Exception $e) {
                }

                $updatebebabaspustaka->kartuanggota = $kartuanggota;
            }

            if ($request->file('fileskripsi')) {
                $fileskripsi = $request->file('fileskripsi');
                $mhs = time() . '_' . $mahasiswa->nim . '_' . Str::of($mahasiswa->nama)->replace(' ', '_');
                $namafileskripsi = $mhs . '.' . $fileskripsi->getClientOriginalExtension();
                $linkskripsi = $fileskripsi->storeAs('fileskripsi', $namafileskripsi, 'public');

                try {
                    Storage::disk('public')->delete($bebaspustakafile->fileskripsi);
                } catch (Exception $e) {
                }

                $updatebebabaspustaka->fileskripsi = $linkskripsi;
            }

            $updatebebabaspustaka->save();
        } else {

            $request->validate(
                [
                    'semester' => 'required',
                    'punyakartuperpus' => 'required',
                    'nokartu' => 'required|unique:bebaspustaka',
                    'filekartuanggota' => 'required|file|mimes:jpeg,jpg,png|max:1024',
                    'fileskripsi' => 'required|file|mimes:pdf|max:5120',
                    'tanggalsurat' => 'required',
                ],
                [
                    'semester.required' => 'Semester harus diisi',
                    'punyakartuperpus.required' => 'Punya Kartu Perpustakaan harus diisi',
                    'nokartu.required' => 'No Kartu harus diisi',
                    'nokartu.unique' => 'No Kartu sudah ada di sistem kami',
                    'filekartuanggota.required' => 'Kartu Anggota Harus diupload',
                    'filekartuanggota.max' => 'Ukuran maksimal 1 Mb',
                    'filekartuanggota.mimes' => 'Tipe yang di izinkan jpeg,jpg,png',

                    'fileskripsi.required' => 'File Skripsi Harus diupload',
                    'fileskripsi.max' => 'Ukuran maksimal 5 Mb',
                    'fileskripsi.mimes' => 'Tipe yang di izinkan pdf',

                    'tanggalsurat.required' => 'Tanggal Surat harus diisi',
                ]
            );

            $semester = $request->semester;
            $punyakartuperpus = $request->punyakartuperpus;
            $nokartu = $request->nokartu;
            $tanggalsurat = $request->tanggalsurat;

            $bebaspustaka = Bebaspustaka::create([
                'mahasiswa_id' => $mahasiswa->id,
                'semester' => $semester,
                'punyakartuperpus' => $punyakartuperpus,
                'nokartu' => $nokartu,
                'tanggalsurat' => $tanggalsurat,
                'statuspengajuan' => 'Diproses'
            ]);

            $kartuanggota = '';
            if ($request->file('filekartuanggota')) {
                $filekartuanggota = $request->file('filekartuanggota');
                $mhs = time() . '_' . $mahasiswa->nim . '_' . Str::of($mahasiswa->nama)->replace(' ', '_');
                $namakartuanggota = $mhs . '.' . $filekartuanggota->getClientOriginalExtension();
                $kartuanggota = $filekartuanggota->storeAs('kartuanggota', $namakartuanggota, 'public');
            }

            $linkskripsi = '';
            if ($request->file('fileskripsi')) {
                $fileskripsi = $request->file('fileskripsi');
                $mhs = time() . '_' . $mahasiswa->nim . '_' . Str::of($mahasiswa->nama)->replace(' ', '_');
                $namafileskripsi = $mhs . '.' . $fileskripsi->getClientOriginalExtension();
                $linkskripsi = $fileskripsi->storeAs('fileskripsi', $namafileskripsi, 'public');
            }

            Bebaspustakafile::create([
                'mahasiswa_id' => $mahasiswa->id,
                'bebaspustaka_id' => $bebaspustaka->id,
                'kartuanggota' => $kartuanggota,
                'fileskripsi' => $linkskripsi
            ]);
        }

        return redirect()
            ->route('mahasiswa.form.bebaspustaka')
            ->with('success', "Berhasil kirim data bebas pustaka");
    }

    public function lihatkartuanggota()
    {
        $mahasiswa = Auth::guard('mahasiswa')->user();
        $bebaspustakafile = Bebaspustakafile::where('mahasiswa_id', $mahasiswa->id)->get()->first();
        $file = Storage::disk('public')->path($bebaspustakafile->kartuanggota);
        return response()->download($file);
    }

    public function lihatskripsi()
    {
        $mahasiswa = Auth::guard('mahasiswa')->user();
        $bebaspustakafile = Bebaspustakafile::where('mahasiswa_id', $mahasiswa->id)->get()->first();
        $data = [
            'fileskripsi' => $bebaspustakafile->fileskripsi
        ];
        return view('depan.bebaspustaka.lihatskripsi', $data);
    }

    // cetak bukti upload
    public function cetakbuktiupload(Request $request)
    {
        $mahasiswa = Auth::guard('mahasiswa')->user();
        $prodi = Prodi::find($mahasiswa->prodi_id);
        $idbebaspustaka = $request->iddata;
        $bebaspustaka = Bebaspustaka::where('mahasiswa_id', $mahasiswa->id)->get()->first();

        $data = [
            'title' => 'Cetak Bebas Pustaka ',
            'mahasiswa' => $mahasiswa,
            'prodi' => $prodi,
            'bebaspustaka' => $bebaspustaka
        ];

        $pdf = Pdf::loadView('depan.bebaspustaka.cetakbuktiupload', $data);
        $pdf->setPaper('A4', 'portrait');
        $namafile = $mahasiswa->nama . '_' . $mahasiswa->nim . '_buktiupload.pdf';
        return $pdf->download($namafile);
    }

    // cetak surat bebas pustaka
    public function cetaksuratbebaspustaka(Request $request)
    {
        $mahasiswa = Auth::guard('mahasiswa')->user();
        $prodi = Prodi::find($mahasiswa->prodi_id);
        $idbebaspustaka = $request->iddata;
        $bebaspustaka = Bebaspustaka::where('mahasiswa_id', $mahasiswa->id)->get()->first();


        $data = [
            'title' => 'Cetak Bebas Pustaka ',
            'mahasiswa' => $mahasiswa,
            'prodi' => $prodi,
            'bebaspustaka' => $bebaspustaka
        ];

        $pdf = Pdf::loadView('depan.bebaspustaka.cetaksuratbebaspustaka', $data);
        $pdf->setPaper('A4', 'portrait');
        $namafile = $mahasiswa->nama . '_' . $mahasiswa->nim . '_suratbebaspustaka.pdf';
        return $pdf->download($namafile);
    }
}
