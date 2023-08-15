<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class SSLController extends Controller
{
    public function showForm()
    {
        return view('form');
    }

    public function generateSSL(Request $request)
    {
        $domain = $request->input('domain');
        $email = $request->input('email');
        $challengeType = $request->input('challenge_type');

        $batchFilePath = 'C:\Program Files\Certbot\run.bat';
        // $certbotCommand = "certbot certonly --manual --preferred-challenges=$challengeType -d $domain --agree-tos --email $email";
        // $certbotCommand = 'certbot --help';
        // Execute the Certbot command using exec()
        $certbotCommand = 'certbot certonly --manual --preferred-challenges=http -d yourdomain.com --agree-tos --email youremail@example.com 2>&1';

        // exec($certbotCommand, $output, $returnCode);
            exec($certbotCommand, $output, $returnCode);

        // Output and error handling

        dd($output);
        try {
            $message = 'SSL certificate obtained successfully!';
        } catch (ProcessFailedException $exception) {
            $message = 'Error obtaining SSL certificate.';
        }

        return view('result', compact('message'));
    }

}
