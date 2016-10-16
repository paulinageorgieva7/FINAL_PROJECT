@include('layouts.app')
@section('content')

<?php  
$mainCategory = Session::get('mainCategory');
$category = Session::get('category');
?> 


@endsection

</body>
</html>

