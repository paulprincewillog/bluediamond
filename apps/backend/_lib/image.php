<?php
	class img {

		public $image;
		public $pendingImage;
		public $error;
		public $fullpath;
		public $file_link;
		public $file_extension;
		public $custom_error = "";
		public $max_size = "8000000";
		public $min_width = "200";
		public $min_height = "100";
		public $image_size;

		public function __construct($image, $prefix = 'picture') {
			$this->image = $image;
			$this->prefix = $prefix;
			$this->imageName = $this->prefix.basename($_FILES[$this->image]["name"]);
			$this->file_extension = pathinfo($this->imageName,PATHINFO_EXTENSION);
			$this->pendingImage = $_FILES[$this->image]["tmp_name"];
			$this->image_size = $_FILES[$this->image]["size"];

			// return image name to be used outside
			return $this->imageName;
		}

		public function preparePath($path) {
			$this->fullpath = $path.'/'.$this->imageName;
		}

		// Function for uploading images
		public function checkImage() {
			
			
			// Do all the checks on the image if the image size is correct
			if ($this->checkImageSize()) {
				$this->checkImageDimension();
				$this->checkImageFormat();
				$this->checkFakeImage();
			}

			// Preprare error message
			if ($this->error !="") {
				$this->error = $this->custom_error.$this->error;
			}
		}
		
		// Check image if it is valid
		protected function checkFakeImage() {

			if (!empty($this->pendingImage)) {
				
				// Check if image file is a actual image or fake image
				$check = getimagesize($this->pendingImage);
				
				if($check == false) {
					$this->error = "Not an image.";
				}
			}
		}

		protected function checkImageSize() {
		
			if ($this->image_size > $this->max_size || $this->image_size == 0) {
				$this->error = "Too big - ". $this->max_size/1000000 ."mb max" ;
				return false;
			}  else {
				return true;
			}
			
		}

		protected function checkImageFormat() {
			// Allow certain file formats
			if($this->file_extension != "jpg" && $this->file_extension != "png" && $this->file_extension != "jpeg"
			&& $this->file_extension != "gif" ) {
				$this->error = "Unsupported format";
			}
		}

		protected function checkImageDimension() {
			list($width, $height) = getimagesize($this->pendingImage);
			if ($width < $this->min_width || $height < $this->min_height) {
				$this->error = "Too small - 500x500 min";
			}
		}

		public function upload() {
			move_uploaded_file($this->pendingImage, $this->fullpath);
		}

		// Function for cropping image 
		public function crop($width, $height) {

			// include ImageManipulator class
			require_once('ImageManipulator.php');
			$manipulator = new ImageManipulator();

			$manipulator->loadImage($this->pendingImage);
			
			$w  = $manipulator->getWidth();
	        $h = $manipulator->getHeight();


	        // This decides if we crop to width or height
	      	if ($w > $h) {
	        	$x = $h;
	        } else {
	        	$x = $w;
	        }
	        $x = $x/2;

	        $centerX = round($w / 2);
	        $centerY = round($h / 2);
			

	        // These will move the cropping to the center of the image
	        $x1 = $centerX - $x;
	        $y1 = $centerY - $x;
	 
	        $x2 = $centerX + $x;
	        $y2 = $centerY + $x;
	 		
	        // Finally, image is center cropped
	        $newImage = $manipulator->crop($x1, $y1, $x2, $y2);
			
	        // saving file to uploads folder
	        $manipulator->save($this->fullpath);

	        $manipulator->loadImage($this->fullpath);
			$newImage = $manipulator->resample($width,$height);
	  		$manipulator->save($this->fullpath);
			
		}


	}
	