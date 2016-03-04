@extends('layouts.app')

@section('content')
    @include('partials._flash')
    @include('partials._errors')
    <h2>Dashboard</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus aliquam faucibus scelerisque. Aliquam in purus porttitor, rhoncus dui eu, mattis ante. Aliquam vel mi risus. Ut et ligula vitae lorem tempus finibus. Fusce maximus ac risus quis volutpat. Morbi a elit velit. <strong>Phasellus risus est, congue sed cursus id, mollis sit amet est.</strong> In vulputate est ut mi semper tempus. Duis ac ipsum iaculis, venenatis lectus sit amet, rutrum est. Proin purus erat, fermentum eu hendrerit quis, lacinia in ante. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nam at lorem sapien. Curabitur non magna id augue malesuada aliquam. <i>Quisque consectetur placerat velit.</i> Fusce accumsan ac lectus quis varius. In cursus, velit et facilisis gravida, quam velit condimentum quam, tincidunt rutrum tortor lacus nec augue. </p>

    <h3>Second-level content heading</h3>

    <ul class="standard">
        <li>Lorem</li>
        <li>Ipsom</li>
        <li>Dolor</li>
    </ul>

    <div class="row-fluid">
        <div class="span8">
            <p>Vivamus quis risus quis tellus dignissim lacinia vitae non eros. Nulla sollicitudin elit vitae nulla porttitor mollis. Sed vitae semper nulla. Nam eget mauris luctus, porta eros eu, maximus velit. Nunc convallis lectus urna. Vivamus at porttitor nulla. Etiam tempor malesuada urna vitae molestie. Quisque finibus nec quam vitae cursus. Aliquam eget magna ante. Donec et hendrerit est. Donec ornare leo a posuere iaculis. Morbi nunc augue, fermentum at libero id, vestibulum condimentum justo. In sagittis varius est, non pulvinar nunc tincidunt eu. Proin sed porta leo, non dapibus diam. Mauris aliquam velit tempor metus dignissim scelerisque. </p>
        </div>
        <div class="span4">
            <p>Cras auctor tincidunt venenatis. Phasellus ac nibh et erat rhoncus consequat a id massa. Quisque a lectus vel libero vehicula elementum ut ac dui. Praesent id ullamcorper eros. Nunc ligula quam, tristique vitae quam sit amet, sollicitudin efficitur nisl. Maecenas mattis cursus erat in porttitor. Curabitur dapibus velit eget accumsan venenatis. Vivamus non tempor dolor. </p>
        </div>
    </div>


    <table class="gridder">
        <thead>
        <tr>
            <th>What a</th>
            <th>Pretty</th>
            <th>Table</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Lorem ipsum dolor</td>
            <td>adipiscing elit. Morbi</td>
            <td>Integer imperdiet ullamcorper</td>
        </tr>
        <tr>
            <td>sit amet, consectetur</td>
            <td>nec efficitur urna.</td>
            <td>mollis. Mauris quis.</td>
        </tr>
        <tr>
            <td>Proin purus erat,</td>
            <td>consectetur placerat velit.</td>
            <td>tincidunt rutrum tortor</td>
        </tr>
        </tbody>
    </table>
@endsection