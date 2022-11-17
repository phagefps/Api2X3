<!DOCTYPE html>
<html>
    <head>
        <title>API 2x3</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">        
        <!-- Bootsrap 5 CDN -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <!-- JQuery -->
        <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
        <!-- Icons -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>

    <body>
        <div class="container py-5">
            <h1 class="text-center mb-5">API documentation for 2x3</h1>
            <h4 class="text-center mb-5">Enrique Marrero</h1>

            <div class="list-group">
                <a href="{{Request::url()}}/api/documentation" class="list-group-item list-group-item-action bg-success text-light" target="_blank">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">Swagger</h5>
                    </div>
                    <p class="mb-1">Documentation and tests using Swagger, the integration is efficient and fulfills its purpose.</p>
                    <small>Click if you want to test the API with Swagger.</small>
                </a>

                <a href="{{Request::url()}}/docs" class="list-group-item list-group-item-action bg-dark text-light" target="_blank">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">Docs JSON</h5>
                    </div>
                    <p class="mb-1">Plain text documentation formatted in JSON to be reused in other API managers.</p>
                    <small>Click if you want to try the JSON API.</small>
                </a>
            </div>
        </div>
    </body>
</html>
