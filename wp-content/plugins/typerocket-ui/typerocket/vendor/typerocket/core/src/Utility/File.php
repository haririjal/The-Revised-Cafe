<?php
namespace TypeRocket\Utility;

use TypeRocket\Utility\Helper;

class File
{
    public $existing = false;
    public $file;

    /**
     * File constructor.
     *
     * @param string $file
     */
    public function __construct( $file )
    {
        $this->file = $file;

        if( file_exists( $file ) ) {
            $this->existing = true;
            $this->file = realpath($file);
        }
    }

    /**
     * @param string $file
     *
     * @return static
     */
    public static function new($file)
    {
        return new static(...func_get_args());
    }

    /**
     * File Exists
     *
     * @return bool
     */
    public function exists()
    {
        return $this->existing;
    }

    /**
     * Create File
     *
     * @param null|string $content
     *
     * @return File
     */
    public function create($content = null)
    {
        if(!$this->existing) {
            fclose(fopen($this->file, 'w'));
        }

        if($content) {
            $name = basename($this->file);
            $dir = substr($this->file, 0, -strlen($name));

            if (!is_dir($dir)) {
                mkdir($dir);
            }

            $this->existing = (bool) file_put_contents($this->file, $content);
        }

        return $this;
    }

    /**
     * Create File
     *
     * @param null|string $content
     *
     * @return File
     */
    public function append($content = null)
    {
        if(!$this->existing) {
            fclose(fopen($this->file, 'w'));
        }

        if($content) {
            file_put_contents($this->file, $content, FILE_APPEND);
        }

        $this->existing = true;

        return $this;
    }

    /**
     * Remove File
     *
     * @return bool
     */
    public function remove()
    {
        if($this->existing) {
            $this->existing = !unlink($this->file);
            return !$this->existing;
        }

        return true;
    }

    /**
     * Replace File
     *
     * @param $content
     *
     * @return File|null
     */
    public function replace($content)
    {
        if(!$this->remove()) {
            return null;
        }

        $this->create($content);

        return $this;
    }

    /**
     * Read File
     *
     * @return false|string|null
     */
    public function read()
    {
        if(!$this->existing) {
            return null;
        }

        return file_get_contents($this->file);
    }

    /**
     * Read First Line of File
     *
     * @return false|string|null
     */
    public function readFirstLine()
    {
        if(!$this->existing) {
            return null;
        }

        return $line = fgets(fopen($this->file, 'r'));
    }

    /**
     * Read First Few Characters
     *
     * This is not Unicode safe because PHP does not support Unicode.
     * This will work only with 256-character set, and will not
     * work correctly with multi-byte characters.
     *
     * @param int $length
     * @param int|null $offset
     *
     * @return false|string|null
     */
    public function readFirstCharactersTo($length = null, $offset = 0)
    {
        if(!$this->existing) {
            return null;
        }

        if(is_null($length)) {
            return file_get_contents($this->file, false, null, $offset);
        }

        return file_get_contents($this->file, false, null, $offset, $length);
    }

    /**
     * Replace
     *
     * @param string $needle
     * @param string $replacement
     *
     * @param bool $regex
     * @return bool
     * @throws \Exception
     */
    public function replaceOnLine( $needle, $replacement, $regex = false)
    {
        $data = file($this->file);
        $fileContent = '';
        $found = false;
        if( $data ) {

            foreach ($data as $line ) {
                if($regex && preg_match($needle, $line)) {
                    $found = true;
                    $fileContent .= rtrim(preg_replace($needle, $replacement, $line)) . PHP_EOL;
                }
                elseif ( !$regex && strpos($line, $needle) !== false ) {
                    $found = true;
                    $fileContent .= rtrim(str_replace($needle, $replacement, $line)) . PHP_EOL;
                }
                else {
                    $fileContent .= rtrim($line) . PHP_EOL;
                }
            }

            if($found) {
                file_put_contents($this->file, $fileContent);
                return true;
            } else {
                return false;
            }
        } else {
            throw new \Exception('File is empty');
        }
    }

    /**
     * Copy Template
     *
     * @param string $new
     * @param array $tags
     * @param array $replacements
     *
     * @return bool|string
     */
    public function copyTemplateFile( $new, $tags = [], $replacements = [] )
    {
        $newContent = str_replace($tags, $replacements, file_get_contents( $this->file ) );

        if( ! file_exists($new) ) {
            $file = fopen($new, "w") or die("Unable to open file!");
            fwrite($file, $newContent);
            fclose($file);
            return realpath( $new );
        } else {
            return false;
        }
    }

    /**
     * Download URL
     *
     * @param string $url
     *
     * @return bool|int
     */
    public function download( $url )
    {
        if( ! $this->existing ) {
            return file_put_contents( $this->file , fopen( $url , 'r') );
        }

        return false;
    }

    /**
     * @return mixed
     */
    public function mimeType()
    {
        return finfo_file(finfo_open(FILEINFO_MIME_TYPE), $this->file);
    }

    /**
     * @return false|int
     */
    public function size()
    {
        return filesize($this->file);
    }

    /**
     * @return false|int
     */
    public function lastModified()
    {
        return filemtime($this->file);
    }

    /**
     * Remove Recursive
     *
     * Delete everything, files and folders.
     *
     * @param null|string $path
     * @param bool $removeSelf
     * @param bool $root
     *
     * @return bool
     * @throws \Throwable
     */
    public function removeRecursiveDirectory($path = null, $removeSelf = true, $root = null )
    {
        $path = realpath($path ? $path : $this->file);
        $project_root = Helper::wordPressRootPath();

        if(!$root) {
            if( !Str::starts($project_root, TYPEROCKET_PATH) ) {
                $project_root = TYPEROCKET_PATH;
            }
        }

        $root = rtrim($root ?? $project_root, '/');

        if( !Str::starts($root, $path) ) {
            throw new \Exception('Nothing deleted. ' . $path . ' file must be within your project scope or ' . $root);
        }

        if( !file_exists($path) ) {
            throw new \Exception('Nothing deleted.' . $path . ' does not exist.');
        }

        $dir = rtrim($path);

        if( ! $root || $dir == $root || ! $path ) {
            throw new \Error('Nothing deleted. You can not delete your entire WordPress project!');
        }

        if( empty($dir) || $dir == '/' || $dir == '\\' ) {
            throw new \Error('Nothing deleted. You can not delete your entire server!');
        }

        if(!is_dir($dir) && is_file($dir)) {
            unlink($dir);
            return true;
        }

        if( file_exists( $dir ) ) {
            $it = new \RecursiveDirectoryIterator( $dir, \RecursiveDirectoryIterator::SKIP_DOTS );
            $files = new \RecursiveIteratorIterator( $it, \RecursiveIteratorIterator::CHILD_FIRST );
            foreach($files as $file) {
                if ($file->isDir()){
                    rmdir($file->getRealPath());
                } else {
                    unlink($file->getRealPath());
                }
            }

            if($removeSelf) {
                rmdir($dir);
            }
        } else {
            return false;
        }

        return true;
    }

    /**
     * Copy Recursive
     *
     * This function replaces all older files. Use with caution.
     *
     * @param string $destination location file/dir will be copied to
     * @param bool $relative prefix destination location relative to the TypeRocket root
     * @param bool $delete delete old files after being copied to new location
     * @param null|array $ignore list of files or folders to ignore whose path name start with a value
     * @param bool|int $verbose output messages
     * @param bool $replace replace file or folder if already existing
     *
     * @throws \Throwable
     */
    public function copyTo($destination, $relative = false, $delete = false, $ignore = null, $verbose = false, $replace = true)
    {
        $path = $this->file;

        if($relative) {
            $destination = TYPEROCKET_PATH . '/' . ltrim($destination, DIRECTORY_SEPARATOR);
        }

        if(!file_exists($destination) && is_dir($path)) {
            if($verbose && $verbose !== 2) {
                echo 'Make dir: ' . $destination . PHP_EOL;
            }

            mkdir($destination, 0755);
        }

        if(!is_dir($path) && is_file($path)) {
            $dont_replace_it = file_exists($destination) && !$replace;

            if(!$dont_replace_it) {
                if($verbose) {
                    echo 'Copy file: ' . $destination . PHP_EOL;
                }

                copy($path, $destination);
            }
            elseif($verbose) {
                echo 'Kept existing file: ' . $destination . PHP_EOL;
                echo 'Wanted to add: ' . $path . PHP_EOL;
            }

            return;
        }

        $no_dots = \RecursiveDirectoryIterator::SKIP_DOTS;
        $self_first = \RecursiveIteratorIterator::SELF_FIRST;
        $iterator = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($path, $no_dots), $self_first);

        foreach ($iterator as $item) {
            /** @var \SplFileInfo $item */
            $name = $iterator->getSubPathName();
            $file = $destination . DIRECTORY_SEPARATOR . $name;
            $skip = false;

            if(is_array($ignore)) {
                foreach ($ignore as $loc) {
                    if(strpos($name, $loc, 0) !== false) {
                        if($verbose && $verbose !== 2) {
                            echo 'Ignoring: ' . $file . PHP_EOL;
                        }

                        $skip = true;
                        break;
                    }
                }
            }

            if (!$skip && $item->isDir() && !file_exists($file) ) {
                if($verbose && $verbose !== 2) {
                    echo 'Make dir: ' . $file . PHP_EOL;
                }
                mkdir($file);
            }
            elseif(!$skip && !$item->isDir() ) {


                $dont_replace_it = file_exists($file) && !$replace;

                if(!$dont_replace_it) {
                    if($verbose) {
                        echo 'Copy file: ' . $file . PHP_EOL;
                    }

                    copy($item, $file);
                }
                elseif($verbose) {
                    echo 'Kept existing file: ' . $destination . PHP_EOL;
                    echo 'Wanted to add: ' . $item . PHP_EOL;
                }
            }
        }

        if($delete) {
            $this->removeRecursiveDirectory();
        }
    }

}