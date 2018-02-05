<?php

use Illuminate\Database\Seeder;
use App\dosen;
use App\jurusan;
use App\mahasiswa;
use App\matkul;
use App\wali;

class UlanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dosens')->delete();
        DB::table('jurusans')->delete();
        DB::table('mahasiswas')->delete();
        DB::table('walis')->delete();
        DB::table('matkuls')->delete();
        DB::table('matkul_mahasiswas')->delete();

        $dosen1 = dosen::create(array(
        	'nama' => 'DRS.HJ.Rizky Musthafa','nipd'=>'111','alamat'=>'Tol (Deket tukang cai)','mata_kuliah'=>'Fisika'
        ));
        $dosen2 = dosen::create(array(
        	'nama' => 'Yudaku Darmaji','nipd'=>'222','alamat'=>'Radiator Spring (route66)','mata_kuliah'=>'Kimia'
        ));
        $this->command->info('Dosen Telah Diisi !');

        $rpl = jurusan::create(array(
         	'nama_jurusan'=>'Rekayasa Perangkat Lunak'
         ));
        $tkr = jurusan::create(array(
         	'nama_jurusan'=>'Teknik Kendaraan Ringan'
         ));
        $tabut = jurusan::create(array(
         	'nama_jurusan'=>'Tata Busana'
         ));
        $this->command->info('Jurusan Telah Diisi !');

        $utun = mahasiswa::create(array(
        'nama_mahasiswa'=> 'Uwa','nis'=>'00001','id_dosen'=>$dosen1->id,'id_jurusan'=> $tkr->id
        ));

        $wakwaw = mahasiswa::create(array(
        'nama_mahasiswa'=> 'Ibi','nis'=>'00002','id_dosen'=>$dosen1->id,'id_jurusan'=> $rpl->id
        ));
        $romlah = mahasiswa::create(array(
        'nama_mahasiswa'=> 'Roman','nis'=>'00003','id_dosen'=>$dosen2->id,'id_jurusan'=> $tabut->id
        ));

        $this->command->info('Mahasiswa Parantos Diisi!');

        wali::create(array(
        'nama'=>'Bpk. Kandas',
        'alamat'=>'Cilebak',
        'id_mahasiswa'=>$utun->id 
        ));
        wali::create(array(
        'nama'=>'Bpk. Nya siswa',
        'alamat'=>'rencong',
        'id_mahasiswa'=>$wakwaw->id
        ));
        wali::create(array(
        'nama'=>'Ibu. Luai',
        'alamat'=>'baleendah',
        'id_mahasiswa'=>$romlah->id
        ));

		$this->command->info('Wali Telah Diisi !');

		$fisika = matkul::create(array('nama_matkul'=>'Fisika','kkm'=>'80'));
		$kimia = matkul::create(array('nama_matkul'=>'Kimia','kkm'=>'85'));

		$utun->matkul()->attach($fisika->id);
		$utun->matkul()->attach($kimia->id);
		$wakwaw->matkul()->attach($kimia->id);
		$romlah->matkul()->attach($fisika->id);

		$this->command->info('Mahasiswa dan Mata Kuliah Telah Diisi !'); 
    }
}
