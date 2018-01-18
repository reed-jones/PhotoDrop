@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <upload-box></upload-box>
                    <h4><strong>Instructions:</strong></h4>
                    <p>If you're on a computer, you can either drag your pictures and videos onto the 'dropzone' square above, or click on the dropzone to open your file explorer. On your phone/tablet, you should be able to simply press on the square and hopefully your device will ask which files you want to upload. As of yet, the only way to delete a file after it's been uploaded is to ask me :)</p>
                    <p>A note on videos: For faster playback and viewing I am converting all the videos to a more web-friendly format when you upload them. The loading bar you see is only for the upload portion, not the conversion. To help me ensure the video converts properly, please wait untill the grey loadingbar disapears before changing pages. If there is an error, please send me an email with the date and time so I can investigate. The conversion could take some time since I am working with a fairly budget friendly server but please be patient :) If you do leave the page early, the process should still complete, but if something goes wrong I might not know!</p>
                    <p>
                    Thanks!
                    </p>
                    <p>Any questions? reedjones@reedjones.com</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
