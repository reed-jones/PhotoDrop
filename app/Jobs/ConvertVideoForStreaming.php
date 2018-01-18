<?php

namespace App\Jobs;

use App\Media;
use Carbon\Carbon;
use FFMpeg;
use FFMpeg\Format\Video\X264;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ConvertVideoForStreaming implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $media;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Media $media)
    {
        $this->media = $media;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
                // create some video formats...
        $lowBitrateFormat  = (new X264('libmp3lame', 'libx264'))->setKiloBitrate(500);
        $midBitrateFormat  = (new X264('libmp3lame', 'libx264'))->setKiloBitrate(1500);
        $highBitrateFormat = (new X264('libmp3lame', 'libx264'))->setKiloBitrate(3000);

        $fileName = explode('/', $this->media->path)[2];
        $fileWithoutExt = explode('.', $fileName)[0];

        // open the uploaded video from the right disk...
        FFMpeg::fromDisk('public')
            ->open($this->media->path)

        // call the 'exportForHLS' method and specify the disk to which we want to export...
            ->exportForHLS()
            ->toDisk('public')

        // we'll add different formats so the stream will play smoothly
        // with all kinds of internet connections...
            ->addFormat($lowBitrateFormat)
            ->addFormat($midBitrateFormat)
            ->addFormat($highBitrateFormat)

        // call the 'save' method with a filename.
            ->save('videos/streams/' . $fileWithoutExt . '.m3u8');

        // update the database so we know the convertion is done!
        // $this->video->update([
        //     'converted_for_streaming_at' => Carbon::now(),
        // ]);
    }
}
