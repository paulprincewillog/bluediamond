<?php     
        
        use MatthiasMullie\Minify;
        require 'minify.php';
        
        function dd_compile($folder, $name, $extension) {

            // First we loop through all the files
            $path    = $folder;
            $single_file = "$path/_$name.$extension";
            // $min_file = "$path/_$name.min.$extension";
            $single_fileName = "_$name.$extension";

            $files = preg_grep('~\.'.$extension.'$~', scandir($path));
            $files = array_diff($files, array($single_fileName)); // Exclude the current single file
            $files = array_values($files); // Rearrange the index to start from zero


            // Get all file contents
            $all_contents = "";
            for ($i=0; $i < count($files); $i++) {

                $content = file_get_contents($path.'/'.$files[$i]);
                $all_contents .= $content;

            }

            // Rewrite to a single file
            $file = fopen($single_file, "w");
            fwrite($file,$all_contents);
            fclose($file);	

            
            // Compress file 
            // It has to wait for all file to compiled first
            // Because this minify requires an extension path
            // For it to be able to convert images attached
            if ($extension == "css") {
                $minifier = new Minify\CSS($single_file);
                $minifier->minify($single_file);
            } else if ($extension == "js") {
                
                $minifier = new Minify\JS($single_file);
                $minifier->minify($single_file);
            }

            return $single_fileName;
        }


        dd_compile(JS.$page_link, 'scripts.dd', 'js');
        // dd_compile('../'.UI.'_general', 'styles.dd', 'css');
        dd_compile(UI.'_general', 'styles.dd', 'css');
        dd_compile(UI.$page_link, 'styles.dd', 'css');

        // Merge all CSS files
        $all_css = file_get_contents(UI.'_general/_styles.dd.css'). file_get_contents(UI.$page_link.'/_styles.dd.css');
        $file = fopen(UI.$page_link.'/_styles.dd.css', "w");
        fwrite($file,$all_css);
        fclose($file);