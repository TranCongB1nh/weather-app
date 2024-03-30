<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Subscribe</title>
    <script type="application/x-javascript">
    addEventListener("load", function() {
        setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
        window.scrollTo(0, 1);
    }
    </script>
    <!-- Custom Theme files -->
    <link href="{{ asset('assets/css/sub_form.css') }}" rel="stylesheet" type="text/css" media="all" />
</head>

<body>
    <div class="main-w3layouts wrapper">
        <h1>Subscribe Email</h1>
        <div class="main-agileinfo">
            <div class="agileits-top">

                <form action="{{ route('subscribe') }}" method="POST">
                    @csrf
                    @if ($errors->any())
                    <div>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <input class="text email" type="email" id="email" name="email" placeholder="Email" required=""
                        value="{{ old('email') }}">

                    <input type="submit" value="SIGNUP">
                </form>
            </div>
        </div>
    </div>
</body>

</html>