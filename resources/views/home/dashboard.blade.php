@extends('layouts.app')

@section('page_title') Dashboard @endsection

@section('content')
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus aliquam faucibus scelerisque. Aliquam in purus porttitor, rhoncus dui eu, mattis ante. Aliquam vel mi risus. Ut et ligula vitae lorem tempus finibus. Fusce maximus ac risus quis volutpat. Morbi a elit velit. <strong>Phasellus risus est, congue sed cursus id, mollis sit amet est.</strong> In vulputate est ut mi semper tempus. Duis ac ipsum iaculis, venenatis lectus sit amet, rutrum est. Proin purus erat, fermentum eu hendrerit quis, lacinia in ante. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nam at lorem sapien. Curabitur non magna id augue malesuada aliquam. <i>Quisque consectetur placerat velit.</i> Fusce accumsan ac lectus quis varius. In cursus, velit et facilisis gravida, quam velit condimentum quam, tincidunt rutrum tortor lacus nec augue. </p>

    <h3>Second-level content heading</h3>

    <ul class="standard">
        <li>Lorem</li>
        <li>Ipsom</li>
        <li>Dolor</li>
    </ul>

    <div class="row-fluid">
        <div class="span4">
            <p>eyyyy</p>
        </div>
        <div class="span4">
            <p>Cras auctor tincidunt venenatis. Phasellus ac nibh et erat rhoncus consequat a id massa. Quisque a lectus vel libero vehicula elementum ut ac dui. Praesent id ullamcorper eros. Nunc ligula quam, tristique vitae quam sit amet, sollicitudin efficitur nisl. Maecenas mattis cursus erat in porttitor. Curabitur dapibus velit eget accumsan venenatis. Vivamus non tempor dolor. </p>
        </div>
    </div>

    <a href="#modal" role="button" class="btn" data-toggle="modal">Launch demo modal</a>

    <!-- Modal -->
    <div id="modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Modal header</h3>
        </div>
        <div class="modal-body">
            <p>One fine body…</p>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
            <button class="btn btn-cta-red">Save changes</button>
        </div>
    </div>


    @if(Auth::user()->isAdmin)
    <div class="accordion" id="adminPanel">
        <div class="accordion-group">
            <h5 class="accordion-heading">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#adminPanel" href="#panel1">Recently Edited Programs</a>
            </h5>
            <div id="panel1" class="accordion-body collapse in">
                <div class="accordion-inner">
                    <table class="gridder">
                        <thead>
                        <tr>
                            <th>Program</th>
                            <th>Updated</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($programs as $program)
                            <tr>
                                <td><a href="{{ action('ProgramController@show', $program->id) }}">{{ $program->name }}</a></td>
                                <td>{{ $program->updated_at }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            </div>
        <div class="accordion-group"></div>
        <div class="accordion-group"></div>
        <div class="accordion-group"></div>
    </div>
    @endif
@endsection