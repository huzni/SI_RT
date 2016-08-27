<?php
use Conner\Likeable\LikeableTrait;
class IndustriController extends \BaseController {
	// $s3 = Aws\S3\S3Client::factory();
	// $bucket = getenv('S3_BUCKET')?: die('No "S3_BUCKET" config var in found in env!');

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$provinsis = Provinsi::all();
		
		$industris = DB::table('industri')
		    ->join('kabupaten', 'kabupaten.id', '=', 'industri.kabupaten_id')
		    ->orderBy('nama_kabupaten', 'asc')
		    ->orderBy('industri.id', 'asc')
		    ->get(array('industri.*', 'kabupaten.nama_kabupaten'));

		return View::make('admin.industri.index')
			->withProvinsis($provinsis)
			->withIndustris($industris);
	}

	//get list of industri
	public function getIndustri(){
		// $industri = Industri::where('id', '!=', 0)->with('likeCounter')->get(['id', 'nama_industri', 'alamat', 'foto_url']);
			// ->select('id', 'nama_industri', 'alamat', 'foto_url')->get();
		$industri = DB::table('industri')
					->leftJoin('likeable_like_counters', 'industri.id', '=', 'likeable_like_counters.likable_id')
					->select(DB::raw("industri.id, industri.nama_industri, industri.alamat, industri.foto_url, industri.foto_key, (CASE WHEN (likeable_like_counters.count IS NULL) THEN '0' ELSE likeable_like_counters.count END) as count"))
					->orderBy('count', 'des')
					->get();


		

		return Response::json(array(
			'status' => 'success',
			'industris' => $industri
			), 200);
	}

	//get industri detail
	public function getIndustriDetail(){
		$mahasiswa_id = Input::get('mahasiswa_id');
		$id = Input::get('industri_id');
		$industri = DB::table('industri')
			->join('kabupaten', 'industri.kabupaten_id', '=', 'kabupaten.id')
			->join('provinsi', 'kabupaten.provinsi_id', '=', 'provinsi.id')
			->select('industri.nama_industri', 'industri.deskripsi', 'industri.alamat', 'industri.lat', 'industri.lng', 'industri.jumlah_karyawan', 'industri.foto', 'industri.foto_url', 'industri.foto_key')
			->where('industri.id', $id)
			->first();

		$isLikeIndustri = Industri::find($id);

		$isLiked = $isLikeIndustri->liked($mahasiswa_id);
		

		

		return Response::json(
			array(
				'status' => 'success',
				'industri' => $industri,
				'liked' => $isLiked
				)
			);
	}

	public function getKategoriDetail(){
		$industri_id = Input::get('industri_id');

		$kategori = DB::table('kategori')
			->join('kategori_industri', 'kategori_industri.kategori_id', '=', 'kategori.id')
			->join('industri', 'kategori_industri.industri_id', '=', 'industri.id')
			->select('kategori.nama_kategori')
			->where('industri.id', $industri_id)
			->get();

		return Response::json(
			array(
				'status' => 'success',
				'kategoris' => $kategori
				)
			);	
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$data = [];

		if (Request::hasFile('foto')) {
			$data['result'] = Imageupload::upload(Request::file('foto'));
			$input['foto'] = $data['result']['original_filename'];

			$image = Request::file('foto');
		$imageFileName = time().'.'.$image->getClientOriginalExtension();

		$s3 = AWS::get('s3');
		$uploaded = $s3->putObject(array(
		    'Bucket'     => 'crysdip',
		    'Key'        => $imageFileName,
		    'SourceFile' => $data['result']['original_filepath'],
		    'ACL'		 => 'public-read',
		));

		
		$url = $s3->getObjectUrl('crysdip', $imageFileName);

		$input['foto_url'] = str_replace("'\'", "", $url);
		}

		

		Industri::create($input);

		return Redirect::route('admin.industri.index')
			->with('successMessage', 'Berhasil Menambahkan Data Baru');
	}

	public function like(){
		$industri_id = Input::get('industri_id');
		$mahasiswa_id = Input::get('mahasiswa_id');
		$industri = Industri::find($industri_id);

		if ($industri == null) {
			return Response::json(array('status' => 'failed', 'message' => 'industri not found'));
		}

		
		$like = $industri->like($mahasiswa_id);

		
		return Response::json(array('status' => 'success'));
	}

	public function getFavorite(){
		$mahasiswa_id = Input::get('mahasiswa_id');
		// $industri = Industri::whereLiked($mahasiswa_id)->with('likeCounter')->get(['id', 'nama_industri', 'alamat', 'foto_url']);
		$industri = DB::table('industri')
					->leftJoin('likeable_like_counters', 'industri.id', '=', 'likeable_like_counters.likable_id')
					->join('likeable_likes', 'likeable_likes.likable_id', '=', 'industri.id')
					->select('industri.id', 'industri.nama_industri', 'industri.alamat', 'industri.foto_url', 'industri.foto_key', 'likeable_like_counters.count')
					->where('likeable_likes.user_id', $mahasiswa_id)
					->orderBy('likeable_like_counters.count', 'desc')
					->get();

		
		return Response::json(array(
			'status' => 'success',
			'industris' => $industri
			), 200);
	}

	public function unlike(){
		$industri_id = Input::get('industri_id');
		$mahasiswa_id = Input::get('mahasiswa_id');

		$industri = Industri::find($industri_id);
		if ($industri == null) {
			return Response::json(array('status' => 'failed', 'message' => 'industri not found'));
		}

		$unlike = $industri->unlike($mahasiswa_id);

		return Response::json(array('status' => 'success'));
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$spesifikasis = DB::table('kategori_industri')
		    ->join('industri', 'industri.id', '=', 'kategori_industri.industri_id')
		    ->join('kategori', 'kategori.id', '=', 'kategori_industri.kategori_id')
		    ->where('industri.id',$id)
		    ->get(array('kategori_industri.*', 'kategori.nama_kategori'));

		$industri = Industri::find($id);
		$kabupaten = Kabupaten::find($industri->kabupaten_id);
		$provinsi = Provinsi::find($kabupaten->provinsi_id);

		$jurusans = Jurusan::all();

		return View::make('admin.industri.detail')
			->withKabupaten($kabupaten)
			->withProvinsi($provinsi)
			->withIndustri($industri)
			->withJurusans($jurusans)
			->withSpesifikasis($spesifikasis);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$industri = Industri::find($id);
		$kabupaten = Kabupaten::find($industri->kabupaten_id);

		$provinsis = Provinsi::all();

		$kabupatens = DB::table('kabupaten')
					->where('provinsi_id', $kabupaten->provinsi_id)
					->get(array('kabupaten.*'));

		return View::make('admin.industri.edit')
			->withKabupaten($kabupaten)
			->withProvinsis($provinsis)
			->withKabupatens($kabupatens)
			->withIndustri($industri);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = Input::all();
		$data = [];

		$industri = Industri::find($id);

		

		if (Request::hasFile('foto')) {
			$data['result'] = Imageupload::upload(Request::file('foto'));
			$ipnut['foto'] = $data['result']['original_filename'];

		$image = Request::file('foto');
		$imageFileName = time().'.'.$image->getClientOriginalExtension();

		$s3 = AWS::get('s3');
		if ($industri->foto_key <> null) {
			$result = $s3->deleteObject(array(
			    'Bucket' => 'crysdip',
			    'Key'    => $industri->foto_key
			));
		}

		$uploaded = $s3->putObject(array(
		    'Bucket'     => 'crysdip',
		    'Key'        => $imageFileName,
		    'SourceFile' => $data['result']['original_filepath'],
		    'ACL'		 => 'public-read',
		));

		$input['foto_key'] = $imageFileName;

		
		$url = $s3->getObjectUrl('crysdip', $imageFileName);

		$input['foto_url'] = str_replace("'\'", "", $url);
		}

		

		$industri->update($input);

		return Redirect::route('admin.industri.index')
			->with('successMessage', 'Berhasil Mengubah Data');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$industri = Industri::find($id);
		$filename = public_path().'/uploads/images/'.$industri->foto;

		if (File::exists($filename)) {
			File::delete($filename);
		} 
		
		$industri->delete();

		return Redirect::route('admin.industri.index')
			->with('successMessage', 'Berhasil Menghapus Data');
	}


}
