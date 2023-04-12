<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Navbar</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Features</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Pricing</a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled">Disabled</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12 text-center ">
                <h2 class="mt-2 mb-2">{{ $singlestory->storytitle }}</h2>
                <h3>{{ $singlestory->storydescription }}</h3>
            </div>
            <div class="col-md-12 col-lg-12 col-sm-12 text-center mt-2 mb-2">
                <p>{{ $singlestory->whereithappened }}</p>
                @if ($singlestory->estimatedattendees > 1)
                    <p class="fw-bolder">About {{ $singlestory->estimatedattendees }} persons were present or around the event</p>
                @elseif ($singlestory->estimatedattendees == 1)
                    <p class="fw-bolder"> {{ $singlestory->estimatedattendees }} other person was present the event</p>
                @else ()

                @endif
                <p class="fw-bolder">About {{ $singlestory->estimatedattendees }} were present or around the event</p>
                <h4 class="text-left">Event Date: {{ $singlestory->dateithappened }}</h4>
            </div>
        </div>
        {{-- begin carousel --}}

        @if ($singlestory->images !== '')

            @if (strpos($singlestory->images,',') !== false)
            {{-- get multiple images --}}


                    @php
                    $individualimage = array();
                    // Initialize an empty array to store the individual items
                    $items = array();
                    $current_item = "";
                    // Loop through each character in the string
                    for ($i = 0; $i < strlen($singlestory->images); $i++) {



                        // If the current character is a comma, add the current item to the array and reset the string variable
                        if ($singlestory->images[$i] == ",") {
                            array_push($items, $current_item);
                            $current_item = "";
                        }

                        // If the current character is not a comma, add it to the current item
                        else {
                            $current_item .= $singlestory->images[$i];
                        }
                        //echo $current_item . 'dee';
                        //echo '<img src="{{ asset('storage/eventstories/$current_item')}}" alt="{{ $singlestory->storytitle }}" class="d-block w-100" >';

                            //echo '</div>';

                    }

                    // Add the last item to the array (since it won't be followed by a comma)
                    array_push($items, $current_item);
                    // print_r($items);

                    @endphp
                <div id="TellStory" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                    @for($image = 0; $image < count($items);$image++)

                        @if ($image == 0)
                            <div class="carousel-item active" data-bs-interval="10000">
                                <img src="{{ asset('storage/eventstories/' . $items[$image]) }}" class="d-block w-100" alt="{{ $singlestory->storytitle }}" >
                            </div>
                        @else
                            <div class="carousel-item">
                                <img src="{{ asset('storage/eventstories/' . $items[$image]) }}"  class="d-block w-100" alt="{{ $singlestory->storytitle }}">
                            </div>
                        @endif

                    @endfor
                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#TellStory" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#TellStory" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>


            </div>

            @else
                <img src="{{ asset('storage/eventstories/'.$singlestory->images)}}" alt="{{ $singlestory->storytitle }}" class="img-fluid object-fit-cover border rounded">
            @endif
        @else
            No image
        @endif

</body>
</html>
