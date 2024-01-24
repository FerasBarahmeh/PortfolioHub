@props([
    'name',
     'namespace'=>'temp',
     'pk',
    'height' => 450,
])

@php
    $model  = strtolower(class_basename(get_class(new $namespace))).'s';
    $namespace = str_replace('\\', '\\\\', $namespace);
@endphp
@push('css')
    <style>
        .ck-editor__editable {
            height: {{ $height }}px !important;
        }
    </style>
@endpush

<textarea id="text-editor" name="{{$name}}">{{ $slot }}</textarea>


@push('js')
    <script src="{{ asset('ckeditor5/ckeditor.js') }}"></script>

    <script>
        class MyUploadAdapter {
            constructor(loader) {
                // The file loader instance to use during the upload. It sounds scary but do not
                // worry — the loader will be passed into the adapter later on in this guide.
                this.loader = loader;
            }

            upload() {
                return this.loader.file
                    .then(file => new Promise((resolve, reject) => {
                        this._initRequest();
                        this._initListeners(resolve, reject, file);
                        this._sendRequest(file);
                    }));
            }

            abort() {
                if (this.xhr) {
                    this.xhr.abort();
                }
            }


            // Initializes the XMLHttpRequest object using the URL passed to the constructor.
            _initRequest() {
                const xhr = this.xhr = new XMLHttpRequest();

                // Note that your request may look different. It is up to you and your editor
                // integration to choose the right communication channel. This example uses
                // a POST request with JSON as a data structure but your configuration
                // could be different.
                xhr.open('POST', '{{ route('ckeditor.upload') }}', true);
                xhr.setRequestHeader('x-csrf-token', '{{ csrf_token() }}');
                xhr.responseType = 'json';
            }


            // Initializes XMLHttpRequest listeners.
            _initListeners(resolve, reject, file) {
                const xhr = this.xhr;
                const loader = this.loader;
                const genericErrorText = `Couldn't upload file: ${file.name}.`;

                xhr.addEventListener('error', () => reject(genericErrorText));
                xhr.addEventListener('abort', () => reject());
                xhr.addEventListener('load', () => {
                    const response = xhr.response;

                    // This example assumes the XHR server's "response" object will come with
                    // an "error" which has its own "message" that can be passed to reject()
                    // in the upload promise.
                    //
                    // Your integration may handle upload errors in a different way so make sure
                    // it is done properly. The reject() function must be called when the upload fails.
                    if (!response || response.error) {
                        return reject(response && response.error ? response.error.message : genericErrorText);
                    }

                    // If the upload is successful, resolve the upload promise with an object containing
                    // at least the "default" URL, pointing to the image on the server.
                    // This URL will be used to display the image in the content. Learn more in the
                    // UploadAdapter#upload documentation.
                    console.log(response.url);
                    resolve({
                        default: response.url
                    });
                });

                // Upload progress when it is supported. The file loader has the #uploadTotal and #uploaded
                // properties which are used e.g. to display the upload progress bar in the editor
                // user interface.
                if (xhr.upload) {
                    xhr.upload.addEventListener('progress', evt => {
                        if (evt.lengthComputable) {
                            loader.uploadTotal = evt.total;
                            loader.uploaded = evt.loaded;
                        }
                    });
                }
            }


            // Prepares the data and sends the request.
            _sendRequest(file) {
                // Prepare the form data.
                const data = new FormData();

                data.append('upload', file);
                data.append('namespace', "{{ $namespace }}");
                data.append('pk', '{{ $pk }}');

                // Important note: This is the right place to implement security mechanisms
                // like authentication and CSRF protection. For instance, you can use
                // XMLHttpRequest.setRequestHeader() to set the request headers containing
                // the CSRF token generated earlier by your application.

                // Send the request.
                this.xhr.send(data);
            }
        }


        function CustomUploadAdapterPlugin(editor) {
            editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
                // Configure the URL to the upload script in your backend here!
                return new MyUploadAdapter(loader);
            };
        }


        function extractImagePaths(content) {
            // Implement logic to extract image paths or identifiers from the content
            // You may use regular expressions or other methods based on your content structure
            // Example: Using a regular expression to extract src attribute values
            let matches = content.match(/<img [^>]*src=["'](.*?)["']/g);
            return matches ? matches.map(match => match.match(/src=["'](.*?)["']/)[1]) : [];
        }


        function findRemovedImages(initialContent, newContent) {
            // Extract image paths or unique identifiers from the content
            let initialPaths = extractImagePaths(initialContent);
            let newPaths = extractImagePaths(newContent);

            // Identify removed images by comparing initial and new paths
            let removedPaths = initialPaths.filter(path => !newPaths.includes(path));

            return removedPaths;
        }

        function deleteImageOnServer(imagePath) {
            let filename = imagePath.split('/').pop();
            console.log(filename)
            let data = {
                path: imagePath,
                filename: filename,
            };

            fetch('{{route('ckeditor.delete')  }}', {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN':  '{{ csrf_token() }}',
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(data),
            })
                .then(response => response.json())
                .then(data => console.log(data))
                .catch(error => console.error('Error deleting image:', error));
        }

        ClassicEditor
            .create(document.querySelector('#text-editor'), {
                extraPlugins: [CustomUploadAdapterPlugin],
                height: 300,
            })
            .then(editor => {
                let initialContent = editor.getData();

                editor.model.document.on('change:data', () => {
                    let newContent = editor.getData();

                    let removedImages = findRemovedImages(initialContent, newContent);

                    removedImages.forEach(imagePath => {
                        deleteImageOnServer(imagePath);
                    });

                    initialContent = newContent;
                });
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush
