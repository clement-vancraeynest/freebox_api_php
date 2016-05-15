<?php
namespace alphayax\freebox\api\v3\services\FileSystem;
use alphayax\freebox\api\v3\models\FileSystem\FsTask;
use alphayax\freebox\api\v3\Service;


/**
 * Class FileSystemOperation
 * @package alphayax\freebox\api\v3\services\FileSystem
 */
class FileSystemOperation extends Service {

    const API_FS_MV         = '/api/v3/fs/mv/';
    const API_FS_CP         = '/api/v3/fs/cp/';
    const API_FS_RM         = '/api/v3/fs/rm/';
    const API_FS_CAT        = '/api/v3/fs/cat/';
    const API_FS_ARCHIVE    = '/api/v3/fs/archive/';
    const API_FS_EXTRACT    = '/api/v3/fs/extract/';
    const API_FS_REPAIR     = '/api/v3/fs/repair/';
    const API_FS_HASH       = '/api/v3/fs/hash/';
    const API_FS_TASK_HASH  = '/api/v3/fs/tasks/%u/hash';
    const API_FS_MKDIR      = '/api/v3/fs/mkdir/';
    const API_FS_RENAME     = '/api/v3/fs/rename/';
    const API_DOWNLOAD      = '/api/v3/dl/';

    /**
     * Move files
     * @param string[]  $sourceFiles
     * @param string    $destination
     * @param string    $conflictMode
     * @return FsTask
     */
    public function move( array $sourceFiles = [], $destination, $conflictMode = 'recent'){
        /// Convert all paths in base64
        $destination_b64 = base64_encode( $destination);
        $source_b64      = [];
        foreach( $sourceFiles as $sourceFile){
            $source_b64[] = base64_encode( $sourceFile);
        }

        $rest = $this->getAuthService( self::API_FS_MV);
        $rest->POST([
            'files' => $source_b64,
            'dst'   => $destination_b64,
            'mode'  => $conflictMode,
        ]);

        return new FsTask( $rest->getCurlResponse()['result']);
    }

    /**
     * Copy files
     * @param string[]  $sourceFiles
     * @param string    $destination
     * @param string    $conflictMode
     * @return FsTask
     */
    public function copy( array $sourceFiles = [], $destination, $conflictMode = 'recent'){
        /// Convert all paths in base64
        $destination_b64 = base64_encode( $destination);
        $source_b64      = [];
        foreach( $sourceFiles as $sourceFile){
            $source_b64[] = base64_encode( $sourceFile);
        }

        $rest = $this->getAuthService( self::API_FS_CP);
        $rest->POST([
            'files' => $source_b64,
            'dst'   => $destination_b64,
            'mode'  => $conflictMode,
        ]);

        return new FsTask( $rest->getCurlResponse()['result']);
    }

    /**
     * Delete files
     * @param string[]  $RemoveFiles
     * @return FsTask
     */
    public function remove( array $RemoveFiles = []){
        /// Convert all paths in base64
        $removedFiles_b64      = [];
        foreach( $RemoveFiles as $sourceFile){
            $removedFiles_b64[] = base64_encode( $sourceFile);
        }

        $rest = $this->getAuthService( self::API_FS_RM);
        $rest->POST([
            'files' => $removedFiles_b64,
        ]);

        return new FsTask( $rest->getCurlResponse()['result']);
    }

    /**
     * Concatenate files (Miaw ^^)
     * @param string[]  $fileParts      : The list of files to concatenate
     * @param string    $destination    : The destination file
     * @param bool      $isMultiVolumes : Enable multi-volumes mode, it will start at XXX001 and concatenate XXX002, XXX003, ...
     * @param bool      $isToDelete     : Deletes source files
     * @param bool      $isToOverwrite  : Overwrites the destination
     * @param bool      $isToAppend     : Append to the destination
     * @return FsTask
     */
    public function cat( array $fileParts = [], $destination, $isMultiVolumes = false, $isToDelete = false, $isToOverwrite = false, $isToAppend = false){
        /// Convert all paths in base64
        $destination_b64 = base64_encode( $destination);
        $fileParts_b64   = [];
        foreach($fileParts as $FilePart){
            $fileParts_b64[] = base64_encode( $FilePart);
        }

        $rest = $this->getAuthService( self::API_FS_CAT);
        $rest->POST([
            'files'         => $fileParts_b64,
            'dst'           => $destination_b64,
            'multi_volumes' => $isMultiVolumes,
            'delete_files'  => $isToDelete,
            'append'        => $isToAppend,
            'overwrite'     => $isToOverwrite,
        ]);

        return new FsTask( $rest->getCurlResponse()['result']);
    }

    /**
     * Create an archive
     * @param string[]  $fileParts      : The list of files to concatenate
     * @param string    $destination    : The destination file
     * @return FsTask
     */
    public function archive( array $fileParts = [], $destination){
        /// Convert all paths in base64
        $destination_b64 = base64_encode( $destination);
        $fileParts_b64   = [];
        foreach($fileParts as $FilePart){
            $fileParts_b64[] = base64_encode( $FilePart);
        }

        $rest = $this->getAuthService( self::API_FS_ARCHIVE);
        $rest->POST([
            'files'         => $fileParts_b64,
            'dst'           => $destination_b64,
        ]);

        return new FsTask( $rest->getCurlResponse()['result']);
    }

    /**
     * Extract an archive
     * @param string    $source         : The archive file
     * @param string    $destination    : The destination folder
     * @param string    $password       : The archive password
     * @param bool      $isToDelete     : Delete archive after extraction
     * @param bool      $isToOverwrite  : Overwrites the destination
     * @return FsTask
     */
    public function extract( $source, $destination, $password = '', $isToDelete = false, $isToOverwrite = false){
        /// Convert all paths in base64
        $source_b64      = base64_encode( $source);
        $destination_b64 = base64_encode( $destination);

        $rest = $this->getAuthService( self::API_FS_EXTRACT);
        $rest->POST([
            'src'            => $source_b64,
            'dst'            => $destination_b64,
            'password'       => $password,
            'delete_archive' => $isToDelete,
            'overwrite'      => $isToOverwrite,
        ]);

        return new FsTask( $rest->getCurlResponse()['result']);
    }

    /**
     * Repair files from a .par2
     * @param string    $source         : The .par2 file
     * @param bool      $isToDelete     : Delete par2 files after repair
     * @return FsTask
     */
    public function repair( $source, $isToDelete = false){
        /// Convert all paths in base64
        $source_b64      = base64_encode( $source);

        $rest = $this->getAuthService( self::API_FS_REPAIR);
        $rest->POST([
            'src'            => $source_b64,
            'delete_archive' => $isToDelete,
        ]);

        return new FsTask( $rest->getCurlResponse()['result']);
    }

    /**
     * Hash a file. This operation can take some time. To get the hash value,
     * the returned task must have succeed and be in the state “done”.
     * @see
     * @param string    $source   : The file to hash
     * @param string    $hashType : The type of hash (md5, sha1, ...) - Default is md5
     * @return FsTask
     */
    public function computeHash( $source, $hashType = 'md5'){
        /// Convert all paths in base64
        $source_b64      = base64_encode( $source);

        $rest = $this->getAuthService( self::API_FS_HASH);
        $rest->POST([
            'src'       => $source_b64,
            'hash_type' => $hashType,
        ]);

        return new FsTask( $rest->getCurlResponse()['result']);
    }

    /**
     * Get the hash value
     * To get the hash, the task must have succeed and be in the state “done”.
     * @param $fsTaskId
     * @return string
     */
    public function getHashValue( $fsTaskId){
        $service = sprintf( self::API_FS_TASK_HASH, $fsTaskId);
        $rest = $this->getAuthService( $service);
        $rest->GET();

        return $rest->getCurlResponse()['result'];
    }

    /**
     * Create a directory
     * Contrary to other file system tasks, this operation is done synchronously.
     * Instead of a returning a FsTask a call to this API will only return success status
     * @param string $parentDirectory   : The parent directory path
     * @param string $newDirectoryName  : The name of the directory to create
     * @return bool
     */
    public function createDirectory( $parentDirectory, $newDirectoryName){
        $rest = $this->getAuthService( self::API_FS_MKDIR);
        $rest->POST([
            'parent'    => base64_encode( $parentDirectory),
            'dirname'   => $newDirectoryName,
        ]);

        return $rest->getCurlResponse()['success'];
    }

    /**
     * Rename a file/folder
     * Contrary to other file system tasks, this operation is done synchronously.
     * Instead of a returning a FsTask a call to this API will only return success status
     * @param string $sourceFilePath    : The source file path
     * @param string $newFileName       : The new name of the file (clear text, without path)
     * @return bool
     */
    public function rename( $sourceFilePath, $newFileName){
        $rest = $this->getAuthService( self::API_FS_RENAME);
        $rest->POST([
            'src'   => base64_encode( $sourceFilePath),
            'dst'   => $newFileName,
        ]);

        return $rest->getCurlResponse()['success'];
    }

    /**
     * Download a file from the freebox server
     * @param string $sourceFilePath
     * @return mixed
     */
    public function download( $sourceFilePath){
        $rest = $this->getAuthService( self::API_DOWNLOAD . base64_encode( $sourceFilePath), false, false);
        $rest->GET( null, false);

        return $rest->getCurlResponse();
    }

}