<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Uploader extends CI_Controller {

    //-------------------------------------------------------------------------------------------

    public function profileImageDatabase($ok=1,$filename) {
        $upload_result;
        if ($ok == 0) {
            $upload_result = array(
                "status" => "fail"
            );
        } else {
            $url = "http://localhost/resume uploads/profiles/$filename.jpg";
            $upload_result = array(
                "status" => "ok",
                "url" => $url
            );
        }

        echo json_encode($upload_result);
    }

    public function generateFileName() {
        $file_number = rand();
        return $file_number;
    }

    public function uploadProfileImage() {

        $folder_path = "../resume uploads";

        if (!file_exists($folder_path)) {
            if (!mkdir($folder_path,0755,true)) {
                $this->profileImageDatabase(0,"");
                return;
            }
        }

        $folder_path = "../resume uploads/profiles";

        if (!file_exists($folder_path)) {
            if (!mkdir($folder_path,0755,true)) {
                $this->profileImageDatabase(0,"");
                return;
            }
        }

        //$filname = $_POST["profileimg"];   Change this to some other mode of naming
        $filename = $this->generateFileName();
        $file_path = $folder_path.DIRECTORY_SEPARATOR.$filename.".jpg";

        if (file_exists($file_path)) {
            while (true) {
                $filename = $this->generateFileName();
                $file_path = $folder_path.DIRECTORY_SEPARATOR.$filename.".jpg";

                if (!file_exists($file_path)) {
                    break;
                }
            }
        }

        $filePath = $file_path;

        $chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
        $chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 0;
        $out = @fopen("{$filePath}.part", $chunk == 0 ? "wb" : "ab");

        if ($out) {
            $in = @fopen($_FILES['profileimage']['tmp_name'], "rb");
            if ($in) {
                while ($buff = fread($in, 4096)) { fwrite($out, $buff); }
            } else {
                
            }
            @fclose($in);
            @fclose($out);
            @unlink($_FILES['profileimage']['tmp_name']);
        } else {
            $this->profileImageDatabase(0,"");
            return;
        }

        if (!$chunks || $chunk == $chunks - 1) {
            rename("{$filePath}.part", $filePath);
        }

        $this->profileImageDatabase(1,$filename);

    }

    //-----------------------------------------------------------------------------------------

    public function signatureImageDatabase($ok=1,$filename) {
        $upload_result;
        if ($ok == 0) {
            $upload_result = array(
                "status" => "fail"
            );
        } else {
            $url = "http://localhost/resume uploads/signatures/$filename.jpg";
            $upload_result = array(
                "status" => "ok",
                "url" => $url
            );
        }

        echo json_encode($upload_result);
    }

    function uploadSignatureImage() {

        $folder_path = "../resume uploads";

        if (!file_exists($folder_path)) {
            if (!mkdir($folder_path,0755,true)) {
                $this->signatureImageDatabase(0,"");
                return;
            }
        }

        $folder_path = "../resume uploads/signatures";

        if (!file_exists($folder_path)) {
            if (!mkdir($folder_path,0755,true)) {
                $this->signatureImageDatabase(0,"");
                return;
            }
        }

        //$filname = $_POST["profileimg"];   Change this to some other mode of naming
        $filename = $this->generateFileName();
        $file_path = $folder_path.DIRECTORY_SEPARATOR.$filename.".jpg";

        if (file_exists($file_path)) {
            while (true) {
                $filename = $this->generateFileName();
                $file_path = $folder_path.DIRECTORY_SEPARATOR.$filename.".jpg";

                if (!file_exists($file_path)) {
                    break;
                }
            }
        }

        $filePath = $file_path;

        $chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
        $chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 0;
        $out = @fopen("{$filePath}.part", $chunk == 0 ? "wb" : "ab");

        if ($out) {
            $in = @fopen($_FILES['signatureimage']['tmp_name'], "rb");
            if ($in) {
                while ($buff = fread($in, 4096)) { fwrite($out, $buff); }
            } else {
                
            }
            @fclose($in);
            @fclose($out);
            @unlink($_FILES['signatureimage']['tmp_name']);
        } else {
            $this->signatureImageDatabase(0,"");
            return;
        }

        if (!$chunks || $chunk == $chunks - 1) {
            rename("{$filePath}.part", $filePath);
        }

        $this->signatureImageDatabase(1,$filename);

    }

}