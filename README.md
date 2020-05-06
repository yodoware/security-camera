# Security Camera for Web Browsers

Turns your tablets or smartphones into security cameras. No need to install apps. Just host the files on your web server and browse the page on your device to capture the video.

## Demo

* [capture/index.html](https://yodoware.github.io/security-camera/capture/)

Uploading data does not work in the demo.

## Supported Environment

* Capture Device
    * Chrome on Android
    * Silk Browser on Amazon Fire
    * or any other environment that supports MediaRecorder API
* Server
    * PHP 7

iOS devices are not supported due to the lack of MediaRecorder API.

## Install

Host files on your web server. Make sure the pages can be accessed with https to enable media capture.

## Capture

Open `capture/index.html` on your device to record the video.

Captured data will be uploaded and appended into a single file every 10 seconds. You can see the files in the `data` directory.

The page will be reloaded in 10 minutes, which is implemented because running the capture for a long time causes unexpected behavior on some device. After reloading, captured data will be uploaded as a new file.

Uploaded files older than 30 days will be deleted automatically when you upload data.

## Browse

Open `index.php` to browse the captured videos.

## License

MIT License.

Copyright (c) 2020 Yodoware Inc.
