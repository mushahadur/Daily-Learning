<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <div class="row py-5">
            <div class="col-md-8 mx-auto py-5">
                
              <div class="card mb-3" style="max-width: 540px;">
                <div class="card-header py-3"><h3> Mail Notification</h3></div>
                <div class="row g-0">
                  <div class="col-md-4">
                    <img class="pt-3" src="{{asset('storage/Company-logos/'.$data->company->logo)}}" class="img-fluid rounded-start" alt="..." height="100" width="120">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h4 class="card-title">Congratulatons ! Mr. {{ $data->first_name }}  {{ $data->last_name }}</h4>
                      <p class="card-text"><p class="text-justify"> Mr. {{ $data->first_name }}  {{ $data->last_name }} You are assigned {{ $data->company->name }} company </p>
                      <p class="card-text"><small class="text-muted">Think You {{ $data->first_name }}</small></p>
                    </div>
                  </div>
                </div>
              </div>
              
              
              
              
              
              {{--  <div class="card">
                  <div class="card-header py-3"><h2> Mail Notification</h2></div>
                  <img class="px-5" src="{{asset('storage/Company-logos/'.$data->company->logo)}}" alt=" {{ $data->company->name}}" height="100" width="180">
                    
                  <div class="card-body py-5">
                    <h3 class="text-justify py-3">Congratulatons ! Mr. {{ $data->first_name }}  {{ $data->last_name }}</h3> 
                    <p class="text-justify"> Mr. {{ $data->first_name }}  {{ $data->last_name }} You are assigned {{ $data->company->name }} company </p>
                  </div>
                </div>   --}}
            </div>
        </div>
    </div>

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>