<?php

namespace App\Jobs;

use App\Media;
use Carbon\Carbon;
use FFMpeg;
use FFMpeg\Coordinate\Dimension;
use FFMpeg\Format\Video\X264;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ConvertVideoForDownloading implements ShouldQueue
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
        // create a video format...
        $lowBitrateFormat = (new X264('libmp3lame', 'libx264'))->setKiloBitrate(500);
        $fileWithoutExt = explode('.', $this->media->path)[0];
        // dd($fileWithoutExt);
        // open the uploaded video from the right disk...
        FFMpeg::fromDisk('public')
            ->open('videos/original/' . $this->media->path)

        // add the 'resize' filter...
            // ->addFilter(function ($filters) {
                // $filters->resize(new Dimension(400, 400));
            // })

        // call the 'export' method...
            ->export()

        // tell the MediaExporter to which disk and in which format we want to export...
            ->toDisk('public')
            ->inFormat($lowBitrateFormat)
  
        // call the 'save' method with a filename...
            ->save('videos/downloads/' . $fileWithoutExt . '.mp4');

        // update the database so we know the convertion is done!
        $this->media->ready = 1;
        $this->media->save();
    }
}
