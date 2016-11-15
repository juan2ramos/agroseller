<section class="Step Step-1">
    <article class="row center">
        <label for="categoriesList">CATEGORÍAS</label>
        <label for="subcategory_id">SUBCATEGORÍAS</label>
    </article>
    <article class="row center stretch">
    
        @if(isset($productEdit))
            <input type="hidden" id="categoryId" value="{{$productEdit->product->subcategory->categories_id}}">
            <input type="hidden" id="subcategoryId" value="{{$productEdit->product->subcategory->id}}">
        @endif

        <select data-token="{{ csrf_token() }}" data-route="{{route('subcategoriesQuery')}}" id="categories">
        @foreach( $categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
        </select>

        <select name="subcategory_id" class="Product-select" data-route="{{route('featuresQuery')}}" id="subcategories"></select>
        <ul id="categoriesList"></ul>
        <ul id="subcategoriesList"></ul>
    </article>

    <div class="Button invalid Next" id="stepOneButton">SIGUIENTE</div>
</section>
