@extends('layoutBack')

@section('content')

        <h2>Categorías</h2>

        <div class="Drag-Drop row">
            <table>
                <tr>
                    <td class="droppable">
                        <div class="draggable">Abonos orgánicos</div>
                    </td>
                </tr>
                <tr>
                    <td class="droppable">
                    </td>
                </tr>
                <tr>
                    <td class="droppable">
                        <div class="draggable">Fertilizantes Foliares</div>
                    </td>
                </tr>
            </table>
            <table>
                <tr>
                    <td class="droppable">
                        <div class="draggable">Fertilizantes Edáficos</div>
                    </td>
                </tr>
                <tr>d
                    <td class="droppable">
                    </td>
                </tr>
                <tr>
                    <td class="droppable">
                        <div class="draggable">Fertilizantes Edáficos</div>
                    </td>
                </tr>
            </table>
        </div>
        <!--<input type="image" name="image" src="/files/2917/fxlogo.png" width="50">-->

        <!--<p>Las imagenes no deben exceder los 2MB y una resolución mínima recomendad de 400X400</p>-->
        {{--<table class="Table BackContainer capitalize">
            <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Fecha de creación</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td> {{ $category->id }}</td>
                    <td> {{ $category->name }}</td>
                    <td> {{$category->created_at}}</td>
                    <td><a href="#" data-id="{{ $category->id }}" class="CategoryDelete icon-remove"></a></td>
                </tr>
                <tr class="SubTable">
                    <td colspan="5">
                        <table class="Table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Imagen destacada</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($category->subcategories as $subcategories)
                                    <tr>
                                        <td>{{$subcategories->id}}</td>
                                        <td>{{$subcategories->name}}</td>
                                        <td>
                                            @if($subcategories->url_image != null)
                                                <a href="{{asset('uploads/categories/'.$subcategories->url_image)}}">Ver imagen</a>
                                            @else
                                                No hay imagen
                                            @endif
                                        </td>
                                        <td><a href="#">Actualizar</a><a href="#">Eliminar</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
        <form role="form" method="POST" class="ContentInfo-form" action="{{ route('category') }} "
              enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="text" placeholder="Nueva Categoría" name="nameCategory" value="{{ old('nameCategory') }}">
            <input type="file" name="categoryImage" value="">
            <button type="submit" class="">Añadir</button>
        </form>
        <br>

        <h2>Agregar Subcategorías</h2>

        <form role="form" method="POST" class="ContentInfo-form" action="{{ route('newSubcategory') }} "
              enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="text" placeholder="Nueva Subcategoría" name="subcategory" value="{{ old('subcategory') }}">
            <select name="category">
                <option value="">Selecciona una subcategoría</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <input type="file" name="subcategoryImage" value="">
            <button type="submit" class="">Añadir</button>
        </form>
   
    <form role="form" method="delete" id="FormDeleteCategory" action="{{ route('categoryDelete',':id') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>--}}
@endsection

@section('scripts')
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script>

        var original = {};

        function compress(droppable) {
            var dropIndex = $('td').index(droppable);
            $.each($('td:not(:has(.draggable:visible), .placeholder), td:has(.ui-draggable-dragging)'), function(index, value) {
                if ($('td').index(value) > dropIndex) {
                    moveTop(droppable);
                    return;
                }
            });
            moveDown(droppable);
        };


        function moveTop(droppable) {
            var nextIndex = $('td').index(droppable) + 2;
            if (nextIndex > 3) {
                console.log(nextIndex);
                return;
            }

            $(droppable).children('.draggable:visible:not(.ui-draggable-dragging):last').detach().prependTo($('td').eq(nextIndex));
            if ($('td').eq(nextIndex).children('.draggable:visible:not(.ui-draggable-dragging)').length > 1) {
                moveTop($('td').eq(nextIndex));
            }
        };

        function moveDown(droppable) {
            var nextIndex = $('td').index(droppable) - 2;
            if (nextIndex < 0) {
                console.log(nextIndex);
                return;
            }
            $(droppable).children('.draggable:visible:not(.ui-draggable-dragging):last').detach().prependTo($('td').eq(nextIndex));
            if ($('td').eq(nextIndex).children('.draggable:visible:not(.ui-draggable-dragging)').length > 1) {
                moveDown($('td').eq(nextIndex));
            }
        };

        function revert() {
            $.each(original, function(key, value){
                if($('td').eq(value).children().length === 0  &&
                        !$('td').eq(value).hasClass('placeholder')){
                    $('#'+key).detach().prependTo($('td').eq(value));
                    revert();
                }
            })
        };


        $('.draggable, .droppable li').draggable({
            revert: 'invalid',
            placeholder: 'placeholder',
            zIndex: 1000,
            containment: '.Drag-Drop',
            helper: function(evt) {
                var that = $(this).clone().get(0);
                $(this).hide();
                return that;
            },
            start: function(evt, ui) {
                $.each($('.draggable:not(.ui-draggable-dragging)'), function(index, value) {
                    original[value.id] = $('td').index($(value).parent());
                });
            },
            cursorAt: {
                top: 20,
                left: 20
            }
        });

        $('.droppable').droppable({
            hoverClass: 'placeholder',
            drop: function(evt, ui) {
                var draggable = ui.draggable;
                var droppable = this;

                $(draggable).detach().css({
                    top: 0,
                    left: 0
                }).prependTo($(droppable)).show();
            },
            over: function(evt, ui) {
                var draggable = ui.draggable;
                var droppable = this;
                revert();
                if ($(droppable).children('.draggable:visible:not(.ui-draggable-dragging)').length > 0) {
                   compress(droppable);
                }
            }
        });
    </script>
@endsection

@section('styles')

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <style>

        .Drag-Drop{
            margin-top: 20px;
        }
        table{
            flex-basis: 50%;
            display: block;
        }

        .Drag-Drop table:last-child{
            padding-left: 10px;
        }

        tbody, tr, td{
            display: block;
            width: 100%;
        }

        .droppable {
            //width: 100px;
            height: 50px;
            background: #c9cecf;
            font-size: 15pt;
            color: white;
            line-height: 40px;
            vertical-align: middle;
            text-align: center;
        }

        .droppable li, .draggable {
            flex-basis: 50%;
            height: 50px;
            background: #bfd14d;
        }

        .placeholder {
            background: #27383f;
        }

    </style>

@endsection