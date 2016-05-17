@section("navigation")
    <?php use App\Http\Controllers\Auth\Login;?>

    @if(Login::isAdmin())
        <div id="tcard-nav" style="font-size:15px;">

            <ul class="nav nav-tabs">

                <li class="{{ Route::current()->getUri() == ('report') ? 'active' : '' }}">
                    <a href="{{URL::to('/') . '/report'}}">Report</a>

                </li>

                <li class="{{ Route::current()->getUri() == ('forms/{form_id}') ? 'active' : '' }}">
                    <a href="{{URL::to('/') . '/forms/1'}}">Form</a>

                </li>


            </ul>
        </div>
        @endif

        @show
                <!--  END navigation -->
