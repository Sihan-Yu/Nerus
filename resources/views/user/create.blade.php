@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row" style="padding-top: 10px;"><!--vertical margins of the box-->
            <div class="col-md-8 col-md-offset-2"> <!--horizontal margins of the box-->
                <div class="panel panel-default">
                    <div class="panel-heading" style="font-size: x-large">
                        <strong>
                            User Information:
                        </strong>
                    </div>
                    <div class="panel-body">
                        <form action="{{route('user.store')}}" method="post">
                            {{csrf_field()}}
                            <input type="text"
                                   name="name"
                                   placeholder=" First / Last Name"
                                   minlength="2"
                                   maxlength="20"
                                   style="
                                            width: 100%;
                                            height: 50px;
                                            padding-top: 10px;
                                            padding-bottom: 10px;
                                            font-size: x-large;
                                         "
                                   required>
                            <br><br>
                            <input type="email"
                                   name="email"
                                   placeholder=" email&#64;bergjet.com"
                                   minlength="2"
                                   maxlength="20"
                                   style="
                                            width: 100%;
                                            height: 50px;
                                            padding-top: 10px;
                                            padding-bottom: 10px;
                                            font-size: x-large;
                                         "
                                   required>
                            <br><br>

                            <input type="submit"
                                   name="submit"
                                   value="Submit"
                                   style="
                                            display: block;
                                            margin: 20px auto;
                                            width: 30%;
                                            max-width: 300px;
                                            border: 1px solid #008d4c;
                                            box-shadow:0 1px 0 #bac8c1, 0 1px 0px #90fac9 inset;
                                            padding:10px;
                                            color:#fff;
                                            font-weight:bold;
                                            border-radius:3px;
                                            background: #008d4c; /* Old browsers */
                                            background: -moz-linear-gradient(top, #008d4c 0%, #00ca6d 100%); /* FF3.6+ */
                                            background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#008d4c), color-stop(100%,#00ca6d)); /* Chrome,Safari4+ */
                                            background: -webkit-linear-gradient(top, #008d4c 0%,#00ca6d 100%); /* Chrome10+,Safari5.1+ */
                                            background: -o-linear-gradient(top, #008d4c 0%,#00ca6d 100%); /* Opera 11.10+ */
                                            background: -ms-linear-gradient(top, #008d4c 0%,#00ca6d 100%); /* IE10+ */
                                            background: linear-gradient(top, #008d4c 0%,#00ca6d 100%); /* W3C */
                                            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#008d4c', endColorstr='#00ca6d',GradientType=0 ); /* IE6-9 */
                                            ">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection