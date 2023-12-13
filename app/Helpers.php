<?php
namespace App;

use Symfony\Component\Process\Process;

class Helpers
{
    public static function getMp3Info($file)
    {
        $raw = $file->getRealPath();

        $process = Process::fromShellCommandline('ffprobe -i $raw 2>&1| grep Duration');
        $process->run(null, ['raw' => $raw]);

        $res = $process->getOutput();

        $duration=0;
        $bitrate=0;

        $regV = '/^\s*Duration: ([0-9]{2}:[0-9]{2}:[0-9]{2}).[0-9]{2},.*?bitrate:\s([0-9]+)\skb\/s\s*$/mi';

        if (preg_match($regV, $res, $m)) {
            $duration = $m[1];
            $bitrate = $m[2];
        }

        return [
            'duration' => $duration,
            'bitrate' => $bitrate,
        ];
    }
}