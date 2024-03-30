<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Weather App Project</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <h1>Weather Dashboard</h1>
    <div class="container">
        <div class="weather-input">
            <form method="POST" action="{{ route('weather.search') }}">
                @csrf
                <h3>Enter a City Name</h3>
                <input class="city-input" id="city" name="city" type="text" placeholder="E.g., New York, London, Tokyo">
                <button type="submit" class="search-btn">Search</button>
                <div class="separator"></div>
                <button type="submit" class="location-btn">Use Current Location</button>
            </form>
        </div>
        <div class="weather-data">
            @if(isset($weatherData))
            <div class="current-weather">
                <div class="details">

                    <h2>{{ $weatherData['location']['name'] }} ( {{ $weatherData['location']['localtime'] }} )</h2>
                    <h6>Temperature: {{ $weatherData['current']['temp_c'] }}°C</h6>
                    <h6>Wind: {{ $weatherData['current']['wind_mph'] }} M/H</h6>
                    <h6>Humidity: {{ $weatherData['current']['humidity'] }}%</h6>

                </div>
                <div class="icon">
                    <img src="{{ $weatherData['current']['condition']['icon'] }}" alt="">
                    <span>{{ $weatherData['current']['condition']['text'] }}</span>
                </div>

            </div>
            <div class="days-forecast">
                <h2>4-Day Forecast</h2>
                <ul class="weather-cards">


                    @foreach($weatherData['forecast']['forecastday'] as $key => $forecastDay)
                    @if($key > 0)
                    <li class="card">
                        <h3>( {{ $forecastDay['date'] }} )</h3>
                        <img src="{{ $forecastDay['day']['condition']['icon'] }}" alt="icon">
                        <h6>Temp: {{ $forecastDay['day']['avgtemp_c'] }}C</h6>
                        <h6>Wind: {{ $forecastDay['day']['maxwind_mph'] }} M/H</h6>
                        <h6>Humidity: {{ $forecastDay['day']['avghumidity'] }}%</h6>
                    </li>
                    @endif
                    @endforeach
                </ul>
            </div>
            @else
            <div class="current-weather">
                <div class="details">
                    <h2>_______ ( ______ )</h2>
                    <h6>Temperature: __°C</h6>
                    <h6>Wind: __ M/S</h6>
                    <h6>Humidity: __%</h6>
                </div>
            </div>
            <div class="days-forecast">
                <h2>4-Day Forecast</h2>
                <ul class="weather-cards">
                    <li class="card">
                        <h3>( ______ )</h3>
                        <h6>Temp: __C</h6>
                        <h6>Wind: __ M/S</h6>
                        <h6>Humidity: __%</h6>
                    </li>
                    <li class="card">
                        <h3>( ______ )</h3>
                        <h6>Temp: __C</h6>
                        <h6>Wind: __ M/S</h6>
                        <h6>Humidity: __%</h6>
                    </li>
                    <li class="card">
                        <h3>( ______ )</h3>
                        <h6>Temp: __C</h6>
                        <h6>Wind: __ M/S</h6>
                        <h6>Humidity: __%</h6>
                    </li>
                    <li class="card">
                        <h3>( ______ )</h3>
                        <h6>Temp: __C</h6>
                        <h6>Wind: __ M/S</h6>
                        <h6>Humidity: __%</h6>
                    </li>
                </ul>
            </div>
        </div>
        @endif
    </div>
    </div>
</body>

</html>