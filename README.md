# Personal Gallery
 Upload and Display Images


## Requirements and Specifications
 - Endpoint: https://test.rxflodev.com
 - data post: imageData=base64-encoded-image-data
 - Create an API endpoint on the backend to transfer the image to storage service.
 - Images must be stored in the remote image service, not on your web server.
 - The most recent image should be displayed first.
 - Images must be in png format.
 - For simplicity you may use the session for long term storage.
 - JSON FORMAT: {"status":"success","message":"Image saved successfully.","url":"https://test.rxflodev.com/image-store/55c4d2369010c.png"}

## Details 

* composer `^1.10.*`
* laravel `^8.*`


## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects.


## License Laravel

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
