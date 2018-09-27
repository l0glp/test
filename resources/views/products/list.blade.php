<div class="titleView">Products list</div>
<div class="optionButton"><a class="js-loadProducts optionButton" href="{{route('products.load')}}"> Load products</a></div>
<div class="productList">
    <table id="productTable" class="js-productTable" data-url="{{route('products.update')}}">
        <thead>
            <tr>
                <th class="code"></th>
                <th class="name"></th>
                <th class="description"></th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
<div class="list">
    @include('shared.backButton')
</div>