<?php 



class Photo extends Db_object {


	protected static $db_table = "photos";
	protected static $db_table_fields = array('id', 'title', 'caption', 'description' ,'filename', 'alternate_text','type','size' );

	public $id;
	public $title;
	public $caption;
	public $description;
	public $filename;
	public $alternate_text;
	public $type;
	public $size;

	public $tmp_path;
	public $upload_directory = "images";
	public $errors = array();
	public $upload_errors_array = array(


	UPLOAD_ERR_OK           => "There is no error",
	UPLOAD_ERR_INI_SIZE		=> "The uploaded file exceeds the upload_max_filesize directive in php.ini",
	UPLOAD_ERR_FORM_SIZE    => "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form",
	UPLOAD_ERR_PARTIAL      => "The uploaded file was only partially uploaded.",
	UPLOAD_ERR_NO_FILE      => "No file was uploaded.",               
	UPLOAD_ERR_NO_TMP_DIR   => "Missing a temporary folder.",
	UPLOAD_ERR_CANT_WRITE   => "Failed to write file to disk.",
	UPLOAD_ERR_EXTENSION    => "A PHP extension stopped the file upload."					
												

);


public function photo_path() {

    return $this->upload_directory.DS.$this->filename;

}

public function photo_path_view() {

    return "admin". DS . $this->upload_directory.DS.$this->filename;

}


	public function picture_path() {

		return $this->upload_directory.DS.$this->filename;
	}





	public function save() {

		if($this->id) {

			$this->update();
			
		} else {

			if(!empty($this->errors)) {

				return false;

			}

			if(empty($this->filename) || empty($this->tmp_path)){
				$this->errors[] = "the file was not available";
				return false;
			}

			$target_path = SITE_ROOT . DS . 'admin' . DS . $this->upload_directory . DS . $this->filename;


			if(file_exists($target_path)) {
				$this->errors[] = "The file {$this->filename} already exists";
				return false;



			}

			if(move_uploaded_file($this->tmp_path, $target_path)) {

				if(	$this->create()) {

					unset($this->tmp_path);
					return true;

				}



			} else {

				$this->errors[] = "the file directory probably does not have permission";
				return false;

			}


	   	}
 


	}





	public function delete_photo() {


		if($this->delete()) {

			$target_path = SITE_ROOT.DS. 'admin' . DS . $this->photo_path();

			return unlink($target_path) ? true : false;


		} else {

			return false;


		}


	}


	public static function ajax_get_photo_info($photo_id) {

		// echo "<h1>" .$this->title ."</h1>";
		// echo "<p>" . $this->caption ."</p>";
		// echo "<p>" . $this->filename ."</p>";
		// echo "<p>" . $this->type ."</p>";
		// echo "<p>" . $this->size/1000 . " KB" ."</p>";

		$photo = Photo::find_by_id($photo_id);

		$output = "<a class='thumbnail' href='#'><img src='{$photo->photo_path()}' alt=''></a>";
		$output .= "<p> {$photo->filename} </p>";
		$output .= "<p> {$photo->type} </p>";
		$output .= "<p>" . $photo->size  / 1000 . " KB" . "</p>" ;

		echo $output;
	}

	// 	public function comments() {


	// 	return Comment::find_the_comments($this->id);


	// }


	// public static function display_sidebar_data($id) {


	// 	$photo = Photo::find_by_id($id);


	// 	$output = "<a class='thumbnail' href='#'><img width='100' src='{$photo->picture_path()}' ></a> ";
	// 	$output .= "<p>{$photo->filename}</p>";
	// 	$output .= "<p>{$photo->type}</p>";
	// 	$output .= "<p>{$photo->size}</p>";

	// 	echo $output;

	// }




} // End of Class 
