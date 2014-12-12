<?php

class ImagesController extends BaseController {

	protected $image;
	static private $bucket = 'thelobbi';

	public function __construct(Image $image) {

		$this->beforeFilter('admin', array('only' => array('create', 'show', 'update', 'store', 'edit', 'destroy', 'index')));
		$this->image = $image;
	}

	public function index() {

		$s3 = AWS::get('s3');

		// Use the high-level iterators (returns ALL of your objects).
		$objects = $s3->getIterator('ListObjects', array('Bucket' => self::$bucket));
		
		echo "Keys retrieved!\n";
		foreach ($objects as $object) {
			if(preg_match('/^uploads/', $object['Key'])) {
				echo '<img src="http://static.thelobbi.com/' . $object['Key'] .'" />';
			}	
		}

		// // Use the plain API (returns ONLY up to 1000 of your objects).
		// $result = $s3->listObjects(array('Bucket' => self::$bucket));

		// echo "Keys retrieved!\n";
		// foreach ($result['Contents'] as $object) {
		//     var_dump($object['Key'] . "\n");
		// }


	}

	// Save new image to S3
	public function store() {

		foreach (Input::file() as $file) {

			$imagename = $file->getClientOriginalName();
			$mime = $file->getMimeType();

			//TODO: resize and format image

			//$uploadFlag = $file->move('public/uploads', $imagename); //local method

			$s3 = AWS::get('s3');

			$uploadFlag = $s3->putObject(array(
			    'Bucket'     	=> self::$bucket,
			    'Key'       	=> 'uploads/'.$imagename,
			    'SourceFile' 	=> $file->getRealPath(),
			    'ACL'         	=> 'public-read',
    			'StorageClass'	=> 'REDUCED_REDUNDANCY',
    			'ContentType'  	=> $mime,
			));

			if($uploadFlag) {
				$uploadedImages[] = $imagename;

				return Response::json(['success' => true, 'message' => 'Images uploaded', 'images' => $uploadedImages ]);
			}

		}

	}


	public function destroy() {

	}

	
}