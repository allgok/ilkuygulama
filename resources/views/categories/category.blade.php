<x-admin-layout>
    <h1>{{$category->name}}</h1>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-5 card">
                <div class="card-body">
                    <h4>Alt kategoriler</h4>
                    <form action="{{route('create-category')}}" method="post">
                        @csrf
                        <input type="hidden" name="parent_category_id" value="{{$category->id}}"/>
                        <div class="form-group">
                            <label>Alt kategori adı:</label>
                            <input name="category_name" class="form-control"/>
                            @error('category_name')
                            <div class="alert alert-danger mt-3">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <button class="btn btn-primary">Ekle</button>
                        @if(session('type'))
                            <div class="alert alert-{{session('type')}} mt-3">
                                {{session('title')}}:{{session('text')}}
                            </div>
                        @endif
                    </form>


                    <x-tree :cat="$category->id"/>
                    <script>
                        function selectCategory(id) {
                            window.location.href = "{{route('get-category')}}/" + id;
                        }
                    </script>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-7 card">
                <div class="card-body">
                    <h4>Kategori özellikleri</h4>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#editCategoryPropertiesModal">Yeni</button>
                    <table class="table">
                        <thead>
                        <tr>
                            <td>Cat-id</td>
                            <td>Name</td>
                            <td>Type</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($category->properties as $key=>$property)
                            <tr>
                                <td>{{$property->category_id}}</td>
                                <td>{{$property->name}}</td>
                                <td>{{$property->type}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <!-- The Modal -->
    <div class="modal" id="editCategoryPropertiesModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Özellik Ekle</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form method="post" action="">
                        @csrf
                        <input type="hidden" name="category_id" data-dim>
                        <div class="form-group">
                            <label>Özellik Adı</label>
                            <input name="properties_name" class="form-control">
                        </div>
                            <div class="form-group">
                                <label>Özellik Tipi</label>
                                <select class="form-control" name="property_type">
                                    <option value="text">Metin Kutusu</option>
                                    <option value="radio">Tek Seçim</option>
                                    <option value="checkbox">Onay Kutusu</option>
                                </select>
                        </div>
                        <button type="submit" class="btn btn-primary"></button>
                    </form>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>

</x-admin-layout>
