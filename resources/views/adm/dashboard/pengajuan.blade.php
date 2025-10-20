 <ul class="nav nav-tabs" id="myTab" role="tablist">
     <li class="nav-item">
         <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
             aria-selected="true">Diproses / Baru</a>
     </li>
     <li class="nav-item">
         <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
             aria-selected="false">Perbaikan</a>
     </li>

 </ul>
 <div class="tab-content" id="myTabContent">
     <br>
     <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
         <table id="example1x" class="table table-sm table-bordered table-striped" style="font-size:13px">
             <thead class="table-primary">
                 <tr>
                     <th width="50">No</th>
                     <th>NIM</th>
                     <th>Nama</th>
                     <th>Prodi</th>
                     <th>No Telp</th>
                     <th>Alamat</th>
                     <th width="150">Proses Bebas Pustaka</th>
                 </tr>
             </thead>

             <tbody>
                 @forelse ($tabeldiproses as $rs)
                     <tr>
                         <td>{{ $loop->iteration }}</td>
                         <td>{{ $rs->nim }}</td>
                         <td>{{ $rs->nama }}</td>
                         <td>{{ $rs->namaprodi }}</td>
                         <td>{{ $rs->notelp }}</td>
                         <td>{{ $rs->alamat }}</td>
                         <td>
                             <a href="{{ route('bebaspustaka.diprosesdetail', ['iddata' => $rs->idbebaspustaka]) }}"
                                 class="btn btn-success btn-xs"><i class="fa fa-edit"></i>
                                 Proses Bebas Pustaka</a>
                         </td>
                     </tr>
                 @empty
                     <tr>
                         <td colspan="7" class="text-center">Belum ada data</td>
                     </tr>
                 @endforelse
             </tbody>
         </table>
     </div>
     <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
         <table id="example1x" class="table table-sm table-bordered table-striped" style="font-size:13px">
             <thead class="table-primary">
                 <tr>
                     <th width="50">No</th>
                     <th>NIM</th>
                     <th>Nama</th>
                     <th>Prodi</th>
                     <th>No Telp</th>
                     <th>Alamat</th>
                     <th width="170">Bebas Pustaka Perbaikan</th>
                 </tr>
             </thead>

             <tbody>
                 @forelse ($tabelperbaikan as $rs)
                     <tr>
                         <td>{{ $loop->iteration }}</td>
                         <td>{{ $rs->nim }}</td>
                         <td>{{ $rs->nama }}</td>
                         <td>{{ $rs->namaprodi }}</td>
                         <td>{{ $rs->notelp }}</td>
                         <td>{{ $rs->alamat }}</td>
                         <td>
                             <a href="{{ route('bebaspustaka.perbaikandetail', ['iddata' => $rs->idbebaspustaka]) }}"
                                 class="btn btn-success btn-xs"><i class="fa fa-edit"></i> Bebas Pustaka Perbaikan</a>
                         </td>
                     </tr>
                 @empty
                     <tr>
                         <td colspan="7" class="text-center">Belum ada data</td>
                     </tr>
                 @endforelse
             </tbody>
         </table>
     </div>

 </div>
